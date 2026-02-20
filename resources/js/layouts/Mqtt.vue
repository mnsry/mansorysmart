<template>
    <div class="container mt-4">
        <h3>MQTT Live Panel</h3>

        <div class="mt-3">
            <!-- انتخاب Topic -->
            <label>انتخاب برای ارسال دیتا </label>
            <select v-model="selectedPublishTopic" class="form-select mb-2">
                <option disabled value="">-- Select Topic --</option>
                <option v-for="topic in publishTopics" :key="topic" :value="topic">
                    {{ topic }}
                </option>
            </select>

            <!-- انتخاب مقدار -->
            <label v-if="selectedPublishTopic">انتخاب مقدار </label>
            <select v-model="selectedValue" class="form-select mb-2">
                <option value="1">ON (1)</option>
                <option value="0">OFF (0)</option>
            </select>

            <!-- دکمه ارسال -->
            <button
                @click="publishMessage"
                class="btn btn-primary"
                :disabled="!canSend || !selectedPublishTopic || !mqttConnected"
            >
                {{ canSend ? 'ارسال' : 'درحال ارسال ...' }}
            </button>

            <!-- وضعیت -->
            <div v-if="statusMessage" class="mt-2">
                <small :style="{ color: statusColor }">{{ statusMessage }}</small>
            </div>
        </div>

        <h4 class="mt-4">نمایش وضعیت</h4>
        <div v-for="(value, key) in messages" :key="key">
            <span :style="{ color: value === '1' ? 'green' : 'red' }">{{ key }} : {{ value }}</span>
        </div>
    </div>
</template>

<script setup lang="ts">
import { reactive, ref, onMounted, onBeforeUnmount } from 'vue'
import { io } from 'socket.io-client'

const messages = reactive<Record<string, string>>({})
const publishTopics = ref<string[]>([])
const selectedPublishTopic = ref<string>('')
const selectedValue = ref<string>('1')

const statusMessage = ref<string>('')
const statusColor = ref<string>('green')

const canSend = ref<boolean>(true)
const mqttConnected = ref<boolean>(false)

const Home = window.routes
let socket: any = null
let sendTimeout: any = null
let forcedDelayTimeout: any = null

/* ---------------- INIT ---------------- */
onMounted(() => {
    // socket = io('http://localhost:3000', { auth: { token: Home.socket } })
    socket = io('https://socket.sskh.ir', { auth: { token: Home.socket } })
    /* ---------------- SOCKET ---------------- */
    socket.on('connect', () => {
        statusMessage.value = '✅ Connected to Socket Server'
        statusColor.value = 'green'
    })
    socket.on('disconnect', () => {
        statusMessage.value = '⚠️ Disconnected from Socket Server'
        statusColor.value = 'red'
        mqttConnected.value = false
    })
    socket.on('connect_error', (err: any) => {
        statusMessage.value = `❌ Socket Error: ${err.message}`
        statusColor.value = 'red'
        mqttConnected.value = false
    })

    /* ---------------- MQTT STATUS ---------------- */
    socket.on('mqtt_status', (data: any) => {
        statusMessage.value = `📡 ${data.message}`
        switch (data.status) {
            case 'connected':
                mqttConnected.value = true
                statusColor.value = 'green'
                break
            case 'disconnected':
                mqttConnected.value = false
                statusColor.value = 'red'
                break
            case 'reconnecting':
                mqttConnected.value = false
                statusColor.value = 'orange'
                break
            case 'error':
                mqttConnected.value = false
                statusColor.value = 'red'
                break
        }
    })

    /* ---------------- TOPICS ---------------- */
    socket.on('allowed_publish_topics', (topics: string[]) => {
        publishTopics.value = topics
        if (topics.length && !selectedPublishTopic.value) selectedPublishTopic.value = topics[0]
    })

    /* ---------------- MESSAGES ---------------- */
    socket.on('mqtt_message', (msg: { topic: string; payload: any }) => {
        const topicName = msg.topic
        const parsedPayload = typeof msg.payload === 'string' ? JSON.parse(msg.payload) : msg.payload
        const value = parsedPayload?.d?.[topicName]
        if (value !== undefined) messages[topicName] = value
    })

    /* ---------------- PUBLISH SUCCESS ---------------- */
    socket.on('publish_success', (data: any) => {
        statusMessage.value = `✅ Published to ${data.topic}`
        statusColor.value = 'green'

        clearTimeout(sendTimeout)
        clearTimeout(forcedDelayTimeout)

        // 3 ثانیه اجباری قبل فعال شدن مجدد دکمه
        forcedDelayTimeout = setTimeout(() => {
            canSend.value = true
        }, 3000)
    })

    /* ---------------- PUBLISH ERROR ---------------- */
    socket.on('publish_error', (errMsg: string) => {
        statusMessage.value = `❌ ${errMsg}`
        statusColor.value = 'red'

        clearTimeout(sendTimeout)
        clearTimeout(forcedDelayTimeout)

        canSend.value = true
    })

    /* ---------------- SUBSCRIBE ---------------- */
    socket.on('subscribe_success', (data: any) => {
        statusMessage.value = `📡 Subscribed: ${data.topic}`
        statusColor.value = 'green'
    })
    socket.on('subscribe_error', (data: any) => {
        statusMessage.value = `❌ Subscribe failed: ${data.topic}`
        statusColor.value = 'red'
    })
})

/* ---------------- CLEANUP ---------------- */
onBeforeUnmount(() => {
    if (socket) socket.disconnect()
    clearTimeout(sendTimeout)
    clearTimeout(forcedDelayTimeout)
})

/* ---------------- PUBLISH FUNCTION ---------------- */
const publishMessage = () => {
    if (!socket || !selectedPublishTopic.value || !canSend.value || !mqttConnected.value) {
        statusMessage.value = mqttConnected.value
            ? '⚠️ Cannot send yet'
            : '⚠️ MQTT not connected'
        statusColor.value = 'orange'
        return
    }

    canSend.value = false

    const payload = {
        d: { [selectedPublishTopic.value]: selectedValue.value, type: 'UINT16' }
    }

    socket.emit('publish_mqtt', { topic: selectedPublishTopic.value, message: JSON.stringify(payload) })

    statusMessage.value = `⏳ Sending ${selectedPublishTopic.value}...`
    statusColor.value = 'blue'

    // اگر پاسخی نیامد بعد 4 ثانیه آزاد کن
    sendTimeout = setTimeout(() => {
        canSend.value = true
        statusMessage.value = '⚠️ No response from server'
        statusColor.value = 'orange'
    }, 4000)
}
</script>

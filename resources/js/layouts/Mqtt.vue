<template>
    <div class="container mt-4">
        <h3>MQTT Live Panel</h3>
        <a :href="Home.welcome">Home</a>
        <div class="mt-3">
            <input v-model="newMsg" placeholder="پیام برای ارسال" class="form-control mb-2" />
            <button @click="publishMessage" class="btn btn-primary">Send</button>
        </div>

        <div v-for="(value, key) in messages" :key="key">
            <span :style="{ color: value === '1' ? 'green' : 'red' }">{{ key }} : {{ value }}</span>
        </div>
    </div>
</template>

<script setup lang="ts">
import { reactive, ref, onMounted } from 'vue'
import { io } from 'socket.io-client'

const messages = reactive<Record<string, string>>({})
const newMsg = ref('')
const Home = window.routes

let socket: any = null

onMounted(() => {
    //socket = io('http://localhost:3000')

    const socket = io("wss://sskh.ir", {
        path: "/socket.io",
        transports: ["websocket"]
    });

    socket.on('connect', () => {
        console.log('Connected to Node.js Socket.io')
    })
    socket.on('mqtt_message', (msg: { topic: string; payload: any }) => {
        const topicName = msg.topic

        const parsedPayload =
            typeof msg.payload === 'string'
                ? JSON.parse(msg.payload)
                : msg.payload

        const value = parsedPayload?.d?.[topicName]
        if (value !== undefined) {
            messages[topicName] = value
        }
    })
})
const publishMessage = () => {
    if (socket && newMsg.value.trim() !== '') {
        socket.emit('publish_mqtt', newMsg.value)
        newMsg.value = ''
    }
}
</script>

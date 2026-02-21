<template>
    <div class="container py-4">

    </div>
</template>


<script>
export default {
    name: "Home",
    data() {
        return {
            time: ''
        };
    },
    mounted() {
        this.updateTime();
        setInterval(this.updateTime, 1000);
    },
    methods: {
        updateTime() {
            const now = new Date();
            this.time = now.toLocaleTimeString('fa-IR', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            });
        }
    }
};
</script>

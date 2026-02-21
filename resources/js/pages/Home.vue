<template>
    <div class="vcard-wrapper">
        <img :src="assets.profile" class="rounded-5 mb-3 vcard-photo" alt="mansory">
        <h4 class="fw-bold farsi2">منصوری</h4>
        <p class="text-secondary mt-3">مهندس نرم افزار | برق صنعتی و اتوماسیون</p>
        <div class="row mt-2 justify-content-center text-center">
            <div class="col-auto">
                <a href="https://youtube.com/@mansorysmart"
                   class="btn btn-outline-danger rounded-circle d-flex align-items-center justify-content-center"
                   style="width:45px; height:45px;"
                   target="_blank">
                    <i class="bi bi-youtube fs-4"></i>
                </a>
            </div>
            <div class="col-auto">
                <a href="https://t.me/+989153903097"
                   class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center"
                   style="width:45px; height:45px;"
                   target="_blank">
                    <i class="bi bi-telegram fs-4"></i>
                </a>
            </div>
            <div class="col-auto">
                <a href="tel:09153903097"
                   class="btn btn-outline-success rounded-circle d-flex align-items-center justify-content-center"
                   style="width:45px; height:45px;">
                    <i class="bi bi-telephone fs-4"></i>
                </a>
            </div>
        </div>
        <div class="vcard-about mt-2">
            راهکارهای هوشمند صنعتی ، اتصال و مدیریت دستگاه‌ها ، جمع آوری و تحلیل داده ها بهینه‌سازی زیرساخت‌ها با فناوری نوین
        </div>
        <div class="small mt-2">{{ time }}</div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            assets: window.assets,
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

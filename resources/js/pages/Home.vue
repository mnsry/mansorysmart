<template>
    <div class="vcard-wrapper">

        <!-- عکس -->
        <img :src="assets.profile"
             class="rounded-4 mb-3 vcard-photo"
             alt="mansory">

        <!-- نام -->
        <h4 class="fw-bold farsi2">منصوری</h4>

        <!-- تخصص -->
        <p class="text-secondary small mt-3">
            مهندس نرم افزار | برق صنعتی و اتوماسیون | <span class="english fw-bold">IOT</span> صنعتی
        </p>

        <!-- شبکه‌ها -->
        <div class="row g-2 mt-3">
            <div class="col-4">
                <a href="https://youtube.com/@mansorysmart" class="btn btn-outline-danger w-100 rounded-3 d-flex justify-content-center align-items-center" style="height:50px;" target="_blank">
                    <i class="bi bi-youtube fs-4"></i>
                </a>
            </div>
            <div class="col-4">
                <a href="https://t.me/+989153903097" class="btn btn-outline-primary w-100 rounded-3 d-flex justify-content-center align-items-center" style="height:50px;" target="_blank">
                    <i class="bi bi-telegram fs-4"></i>
                </a>
            </div>
            <div class="col-4">

                <a href="tel:09153903097" class="btn btn-outline-success w-100 rounded-3 d-flex justify-content-center align-items-center" style="height:50px;">
                    <i class="bi bi-telephone fs-4"></i>
                </a>
            </div>
        </div>

        <!-- توضیح کوتاه -->
        <div class="vcard-about mt-4">
            راهکارهای هوشمند صنعتی ، اتصال و مدیریت دستگاه‌ها ، جمع آوری و تحلیل داده ها بهینه‌سازی زیرساخت‌ها با فناوری نوین
        </div>

    </div>
</template>

<script>
export default {
    name: "Home",
    data() {
        return {
            assets: window.assets,
            routes: window.routes,
        };
    }
};
</script>

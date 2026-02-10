<template>
    <body class="d-flex flex-column justify-content-center align-items-center">
        <!-- لوگو -->
        <img :src="assets.profile" alt="لوگو" class="mb-3 rounded-circle" style="width:120px; height:120px; object-fit:cover;">

        <!-- نام و عنوان -->
        <h2 class="mb-1">مسعود</h2>
        <a class="english" :href="routes.login">click</a>
        <p class="text-muted mb-3">مهندس نرم‌افزار | طراح وب | مشاور فناوری</p>

        <!-- شبکه‌های اجتماعی -->
        <div class="d-flex justify-content-center gap-3">
            <a href="#" class="btn btn-outline-primary btn-sm" target="_blank">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="#" class="btn btn-outline-info btn-sm" target="_blank">
                <i class="bi bi-twitter"></i>
            </a>
            <a href="#" class="btn btn-outline-primary btn-sm" target="_blank">
                <i class="bi bi-linkedin"></i>
            </a>
            <a href="#" class="btn btn-outline-danger btn-sm" target="_blank">
                <i class="bi bi-youtube"></i>
            </a>
        </div>

        <!-- توضیح کوتاه یا شعار -->
        <p class="mt-3 text-secondary text-center">ارائه تخصص و خدمات با کیفیت برای شما</p>

    </body>
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

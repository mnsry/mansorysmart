<template>
    <div class="container">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body text-center">
                <div class="mb-3">
                    <i class="bi bi-person-plus fs-1 text-success"></i>
                </div>
                <h4 class="fw-bold mb-3">ایجاد حساب کاربری</h4>
                <p class="text-muted mb-4">
                    ساخت حساب جدید و شروع مانیتورینگ
                </p>
                <a :href="routes.register" class="btn btn-success w-100">
                    ثبت‌نام
                </a>
            </div>
        </div>

        <div class="card shadow-sm border-0 h-100">
            <div class="card-body text-center ">
                <div class="mb-3">
                    <i class="bi bi-box-arrow-in-right fs-1 text-primary"></i>
                </div>
                <h4 class="fw-bold mb-3">ورود به پنل</h4>
                <p class="text-muted mb-4">
                    دسترسی به داشبورد، مانیتورینگ لحظه‌ای سیستم
                </p>
                <a :href="routes.login" class="btn btn-primary w-100">
                    ورود
                </a>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'Features',
    data() {
        return {
            assets: window.assets,
            routes: window.routes,
        }
    }
}
</script>

<template>
    <div class="container py-4">
        <h2 class="mb-4">فروشگاه</h2>

        <!-- آیکن‌های دایره‌ای با Bootstrap row/col -->
        <div class="row justify-content-start">
            <div
                v-for="(feature, index) in features"
                :key="index"
                class="col-3 text-center mb-3"
                @click="activeFeature = index"
            >
                <div
                    class="feature-circle mx-auto mb-1 d-flex justify-content-center align-items-center"
                    :class="{'border-primary': activeFeature === index, 'text-primary': activeFeature === index}"
                >
                    <i :class="feature.icon" style="font-size:1.5rem;"></i>
                </div>
                <div class="small">{{ feature.name }}</div>
            </div>
        </div>

        <!-- جزئیات پایین صفحه -->
        <div class="border rounded p-3">
            <h5>{{ features[activeFeature].name }}</h5>
            <p>{{ features[activeFeature].description }}</p>
            <a :href="routes.login" class="btn btn-primary btn-sm">رفتن به صفحه</a>
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
            activeFeature: 0,
            features: [
                { name: 'ورود', icon: 'bi bi-box-arrow-in-right', description: 'ورود به پنل کاربری برای استفاده از امکانات سایت.', link: '#' },
                { name: 'ثبت‌نام', icon: 'bi bi-person-plus', description: 'ثبت‌نام کاربران جدید برای استفاده از خدمات.', link: '#' },
                { name: 'تماس سریع', icon: 'bi bi-telephone', description: 'تماس مستقیم با تیم پشتیبانی و مشاوره.', link: '#' },
                { name: 'پنل مشتری', icon: 'bi bi-person-circle', description: 'مشاهده سفارش‌ها و اطلاعات حساب کاربری.', link: '#' },
                { name: 'اخذ نمایندگی', icon: 'bi bi-award', description: 'ثبت‌نام برای اخذ نمایندگی و همکاری با ما.', link: '#' },
                { name: 'آموزش', icon: 'bi bi-journal-bookmark', description: 'دوره‌های آموزشی و راهنمای استفاده از خدمات.', link: '#' }
            ]
        }
    }
}
</script>

<style scoped>
.feature-circle {
    width: 60px;
    height: 60px;
    border: 2px solid #ccc;
    border-radius: 50%;
    cursor: pointer;
}
.feature-circle.border-primary {
    border-color: #0d6efd !important;
}
.feature-circle.text-primary i {
    color: #0d6efd;
}
</style>

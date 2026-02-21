<template>
    <div class="container">
        <h4 class="fw-bold mb-3">امکانات و ابزارها</h4>

        <div class="row g-3">
            <div class="col-md-3" v-for="feature in features" :key="feature.id">
                <div class="card text-center h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3 fs-1 text-primary">
                            <i :class="feature.icon"></i>
                        </div>
                        <h6 class="card-title">{{ feature.title }}</h6>
                        <p class="card-text small text-muted flex-grow-1">
                            {{ feature.description }}
                        </p>
                        <a class="btn btn-sm btn-outline-primary mt-auto" :href="routes.mqtt">
                            ورود
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            routes: window.routes,
            features: [
                { id: 1, title: 'پنل MQTT', description: 'مدیریت سخت افزار پروژه', icon: 'bi bi-server' },
                { id: 2, title: 'مدیریت پروفایل', description: 'ویرایش اطلاعات کاربری و رمز عبور', icon: 'bi bi-person-circle' },
                { id: 3, title: 'ثبت پروژه جدید', description: 'ارسال پروژه برای بررسی و اجرا', icon: 'bi bi-plus-circle' },
                { id: 4, title: 'پیگیری وضعیت', description: 'مشاهده وضعیت پروژه‌ها', icon: 'bi bi-bar-chart-line' },
                { id: 5, title: 'پشتیبانی', description: 'ارسال تیکت و پیام به پشتیبانی', icon: 'bi bi-headset' }
            ]
        };
    }
};

</script>

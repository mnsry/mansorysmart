<template>
    <div class="container-fluid instagram-profile">

        <div class="profile-header">
            <img class="avatar" :src="assets.story" alt="Masoud">
            <div class="profile-info">
                <h2>MANSORY SMART</h2>
                <p class="title">Industrial IoT | PLC & Automation</p>
                <div class="stats">
                    <div><strong>15+</strong><span>سابقه</span></div>
                    <div><strong>50+</strong><span>پروژه</span></div>
                    <div><strong>Industrial</strong><span>کارشناس</span></div>
                </div>
                <div class="buttons">
                    <a href="tel:09153903097" class="btn2 primary2">تماس</a>
                    <a href="https://t.me/+989153903097" class="btn2 secondary2">تلگرام</a>
                </div>
            </div>
        </div>

        <div class="bio-section mt-3">
            <h6 class="mb-1">مسعود منصوری | فناوری در خدمت صنعت</h6>
            <p class="small text-muted mb-2">
                📍<span> برق صنعتی • </span>
                <span> طراحی مدار • </span>
                <span> برنامه نویس صنعتی • </span>
                <span> اتوماسیون سازی و IOT • </span>
                <span>اجرای پروژه‌های صنعتی از ۱۳۸۹</span>
            </p>
        </div>

        <h6 class="small mb-1">📍  تخصص</h6>
        <div class="highlights d-flex overflow-auto">
            <div class="highlight-item d-flex flex-column align-items-center"
                 v-for="(skill, index) in skills" :key="skill.name">
                <img :src="skill.icon" alt="mansory"/>
                <small class="text-center">{{ skill.name }}</small>
            </div>
        </div>

        <div class="post-tabs">
            <div class="tabs-wrapper">
                <button :class="{ active: activeTab === 'texts' }" @click="activeTab = 'texts'">
                    <i class="bi bi-list"></i>
                </button>
                <button :class="{ active: activeTab === 'media' }" @click="activeTab = 'media'">
                    <i class="bi bi-view-list"></i>

                </button>
            </div>
        </div>
        <div class="posts">
            <template v-for="project in filteredProjects" :key="project.id">
                <div v-if="project.category === 'texts'" class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ project.title }}</h5>
                        <p class="card-text">{{ project.desc }}</p>
                    </div>
                </div>
                <!-- اگر ویدیو بود -->
                <div v-else class="video-wrapper">
<!--                    <img :src="project.image" alt="mansory">-->
<!--                    <div class="overlay">-->
<!--                        <h5>{{ project.title }}</h5>-->
<!--                    </div>-->
                    <div class="card video-card">
                        <video controls preload="metadata" class="card-img-top">
                            <source :src="project.video" type="video/mp4">
                        </video>
                        <div class="card-body">
                            <h6 class="card-title">{{ project.title }}</h6>
                            <p class="card-text small">{{ project.desc }}</p>
                        </div>
                    </div>
                </div>
            </template>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        const assets = window.assets;
        return {
            assets,
            skills: [
                { name: "IOT", icon: assets.iot },
                { name: "PLC", icon: assets.plc },
                { name: "HMI", icon: assets.hmi },
                { name: "INVERTER", icon: assets.inverter },
                { name: "CNC", icon: assets.cnc },
                { name: "SERVO", icon: assets.servo },
                { name: "LARAVEL", icon: assets.laravel },
                { name: "NODE", icon: assets.node },
                { name: "GITHUB", icon: assets.github },
                { name: "MQTT", icon: assets.mqtt },

            ],
            activeTab: 'texts',
            projects: [
                { id: 1, category: 'texts', title: "🎯 هدف سیستم", desc: 'ساخت پلتفرم مانیتورینگ و تحلیل داده مبتنی بر MQTT برای سیستم‌های صنعتی، BMS.' },
                { id: 2, category: 'texts', title: "🧠 معماری کلان سیستم", desc: '' },
                { id: 3, category: 'texts', title: "1️⃣ Laravel (Core Service)", desc: '' },
                { id: 4, category: 'texts', title: "مسئولیت", desc: 'مالک دیتابیس اصلی احراز هویت - مدیریت کاربران و نقش‌ها - مدیریت پروژه‌ها - مدیریت دستگاه‌ها - مدیریت Topic Permissions Admin Panel API مرکزی - AI Gateway (ارتباط با سرویس Python)' },
                { id: 5, category: 'texts', title: "🔐 مالکیت داده", desc: 'Users, Projects, Devices, Permissions, Topic, Access Rules, Business Logic' },
                { id: 6, category: 'texts', title: "2️⃣ Node.js (MQTT Gateway Service)", desc: '' },
                { id: 7, category: 'texts', title: "مسئولیت", desc: 'اتصال دائم به MQTT Broker Subscribe به Topicها - دریافت پیام‌ها ذخیره لاگ (فقط CREATE، بدون UPDATE) - Publish کنترل‌ها به دستگاه‌ها WebSocket Server برای Nuxt فیلتر Topic بر اساس دسترسی کاربر' },
                { id: 8, category: 'texts', title: "⚠️ مهم", desc: 'Node هیچ مالکیتی روی Business Logic ندارد. فقط Gateway + Realtime Layer است.' },
                { id: 9, category: 'texts', title: "3️⃣ Python (Analytics Service)", desc: '' },
                { id: 10, category: 'texts', title: "مسئولیت", desc: 'پردازش لاگ‌ها تولید جدول log_summary آماده‌سازی داده برای AI تحلیل مصرف، رفتار، هشدار پردازش Batch این سرویس فقط Read از لاگ و Write به جداول تحلیلی دارد.' },
                { id: 11, category: 'texts', title: "4️⃣ Nuxt.js (Frontend)", desc: '' },
                { id: 12, category: 'texts', title: "مسئولیت", desc: 'داشبورد مانیتورینگ دریافت Topicهای مجاز از Laravel اتصال WebSocket به Node نمایش Real-time Data نمودارها و گزارش‌ها' },
                { id: 13, category: 'texts', title: "5️⃣ MQTT Broker (اختصاصی)", desc: '' },
                { id: 14, category: 'texts', title: "مسئولیت", desc: 'مدیریت Connection دستگاه‌ها مدیریت Publish/Subscribe احراز هویت سطح Broker' },
                { id: 15, category: 'texts', title: "6️⃣ Database مرکزی", desc: 'PostgreSQL (اصلی) Redis (Realtime / Cache) InfluxDB (در صورت نیاز Time-Series در آینده)' },
                // media
                { id: 16, category: 'media', title: "معماری سیستم", video: assets.vid1, desc: "مرجع اصلی معماری پروژه IoT/BMS" },
                { id: 17, category: 'media', title: "کنترل MQTT", video: assets.vid2, desc: "تحلیل داده ها و آنالیزینگ" },
            ]
        };
    },

    computed: {
        filteredProjects() {
            return this.projects.filter(
                p => p.category === this.activeTab
            );
        }
    }
}
</script>

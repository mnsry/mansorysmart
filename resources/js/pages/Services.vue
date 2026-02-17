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
                    <a href="tel:09153903097" class="btn primary">تماس</a>
                    <a href="https://t.me/+989153903097" class="btn secondary">تلگرام</a>
                </div>
            </div>
        </div>

        <div class="bio-section mt-2">
            <h6 class="mb-1">مسعود منصوری | فناوری در خدمت صنعت</h6>
            <p class="small text-muted mb-2">
                <span> برق صنعتی • </span>
                <span> طراحی مدار • </span>
                <span> برنامه نویس صنعتی • </span>
                <span> هوشمند سازی و IOT • </span>
                <span>اجرای پروژه‌های صنعتی از ۱۳۸۹</span>
            </p>
            <p class="small">📍 مشهد | همکاری پروژه‌ای و فاکتوری</p>
        </div>

        <!-- Skills as Stories -->
        <div class="highlights d-flex overflow-auto">
            <div class="highlight-item d-flex flex-column align-items-center"
                 v-for="(skill, index) in skills" :key="skill.name">
                <img :src="skill.icon" alt="mansory"/>
                <small class="text-center">{{ skill.name }}</small>
            </div>
        </div>

        <div class="post-tabs">
            <div class="tabs-wrapper">
                <button :class="{ active: activeTab === 'images' }" @click="activeTab = 'images'">
                    <i class="bi bi-image"></i>
                </button>
                <button :class="{ active: activeTab === 'videos' }" @click="activeTab = 'videos'">
                    <i class="bi bi-camera-video"></i>
                </button>
            </div>
        </div>
        <div class="posts">
            <template v-for="project in filteredProjects" :key="project.id">
                <!-- اگر عکس بود -->
                <div v-if="project.category === 'images'" class="post">
                    <img :src="project.image" alt="mansory">
                    <div class="overlay">
                        <h5>{{ project.title }}</h5>
                    </div>
                </div>
                <!-- اگر ویدیو بود -->
                <div v-else class="video-wrapper">
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
                { name: "PLC", icon: assets.plc },
                { name: "HMI", icon: assets.hmi },
                { name: "IOT", icon: assets.iot },
                { name: "SERVO", icon: assets.servo },
                { name: "INVERTER", icon: assets.inverter },
                { name: "CNC", icon: assets.cnc },
                { name: "LARAVEL", icon: assets.laravel },
                { name: "NODE", icon: assets.node },
                { name: "GITHUB", icon: assets.github },
                { name: "MQTT", icon: assets.mqtt },

            ],
            activeTab: 'images',
            projects: [
                { id: 1, category: 'images', title: "تابلو برق صنعتی", image: assets.post1 },
                { id: 2, category: 'images', title: "اتوماسیون دستگاه", image: assets.post2 },
                { id: 3, category: 'images', title: "خط لوله پلی اتیلن", image: assets.post3 },
                { id: 4, category: 'images', title: "سیستم BMS", image: assets.post4 },
                { id: 5, category: 'images', title: "کنترل از راه دور MQTT", image: assets.post5 },
                { id: 6, category: 'images', title: "هوشمندسازی موتورخانه", image: assets.post6 },
                // video
                { id: 7, category: 'videos', title: "سیستم BMS", video: assets.vid1, desc: "اجرای کامل سیستم هوشمند سازی ساختمان" },
                { id: 8, category: 'videos', title: "کنترل MQTT", video: assets.vid2, desc: "کنترل از راه دور با بروکر MQTT" },
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

<style scoped>
.instagram-profile {
    max-width: 600px;
    margin: auto;
    padding: 10px 2px 2px;
    font-family: sans-serif;
}
.profile-header {
    display: flex;
    gap: 20px;
    align-items: center;
}
.avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: contain ;
    border: 3px solid  #6366f1;
    margin-right: 5px;
}
.profile-info h2 {
    margin: 0;
}
.title {
    color: #aaa;
    font-size: 13px;
}
.stats {
    display: flex;
    gap: 30px;
    margin: 15px 5px;
}
.stats div {
    text-align: center;
    font-size: 13px;
}
.stats span {
    display: block;
    font-size: 11px;
    color: #aaa;
}
.buttons {
    display: flex;
    gap: 10px;
}
.btn {
    padding: 6px 14px;
    border-radius: 8px;
    font-size: 13px;
    text-decoration: none;
}
.primary {
    background: #6366f1;
    color: #fff;
}
.secondary {
    background: #2a2a30;
    color: #fff;
}
.bio-section {
    margin-bottom: 15px;
    margin-right: 10px;
}
.highlights {
    gap: 15px;
}
.highlights::-webkit-scrollbar {
    display: none;             /* Chrome, Safari, Opera */
}
.highlight-item {
    min-width: 80px;          /* عرض ثابت برای هر هایلایت */
    flex: 0 0 auto;
    text-align: center;
}
.highlight-item img {
    width: 65px;
    height: 65px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #0c26ca;
}
.post-tabs {
    justify-content: center;
    margin-top: 20px;
}
.tabs-wrapper {
    display: flex;
    border-radius: 12px;
}
.tabs-wrapper button {
    flex: 1;
    border: none;
    background: transparent;
    color: #0c26ca;
    transition: .15s ease;
}
.post-tabs button.active {
    border-bottom: 2px solid #6366f1;
}
.post-tabs button i {
    font-size: 20px;
}
.posts {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 5px;
    margin-top: 10px;
}
.post {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
}
.post img {
    width: 100%;
    height: 250px;
    object-fit: fill;
}
.overlay {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 6px;
    background: linear-gradient(to top, rgba(0,0,0,.7), transparent);
    font-size: 12px;
    color: silver;
}
.video-wrapper {
    grid-column: 1 / -1;
}
.video-card {
    border-radius: 12px;
    overflow: hidden;
}
.video-card video {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 10px;
}
</style>


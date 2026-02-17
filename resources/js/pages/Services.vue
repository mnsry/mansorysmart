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
            <div class="highlight-item d-flex flex-column align-items-center" v-for="(skill, index) in skills" :key="index">
                <img :src="skill.icon" alt="mansory"/>
                <small class="text-center">{{ skill.name }}</small>
            </div>
        </div>

        <!-- Projects Grid -->
        <div class="posts">
            <div class="post" v-for="project in projects" :key="project.title">
                <img class="" :src="project.image" alt="mansory">
                <div class="overlay">
                    <h5>{{ project.title }}</h5>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            assets: window.assets,
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
            projects: [
                { id: 1, title: "تابلو برق صنعتی", image: assets.test },
                { id: 2, title: "اتوماسیون خط تولید", image: assets.test },
                { id: 3, title: "کنترل CNC", image: assets.test },
                { id: 4, title: "سیستم مانیتورینگ صنعتی", image: assets.test }
            ]
        };
    }
};
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

/* خط جداکننده عمودی */
.divider {
    width: 1px;
    height: 35px;
    background: linear-gradient(to bottom, transparent, #444, transparent);
    opacity: 0.4;
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
.bio {
    margin: 20px 0;
    font-size: 14px;
    line-height: 1.6;
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
    border: 2px solid #0c26ca;
}
.about-box {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 12px;
    font-size: 14px;
}
.posts-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2px;
}
.post img {
    width: 100%;
    height: 120px;
    object-fit: cover;
}

/* Posts */
.posts {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 8px;
    margin-top: 20px;
}

.post {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
}

.post img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.overlay {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 6px;
    background: linear-gradient(to top, rgba(0,0,0,.7), transparent);
    font-size: 12px;
}
</style>


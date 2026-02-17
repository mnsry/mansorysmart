<template>
    <div class="instagram-profile">

                <div class="profile-header">
                    <img class="avatar" :src="assets.story" alt="Masoud">
                    <div class="profile-info">
                        <h2>Masoud Mansouri</h2>
                        <p class="title">Electrical Engineer | PLC & Automation</p>
                        <div class="stats">
                            <div><strong>15+</strong><span>Years</span></div>
                            <div><strong>50+</strong><span>Projects</span></div>
                            <div><strong>IOT</strong><span>Support</span></div>
                        </div>
                        <div class="buttons">
                            <a href="tel:09153903097" class="btn primary">تماس</a>
                            <a href="https://t.me/+989153903097" class="btn secondary">تلگرام</a>
                        </div>
                    </div>
                </div>


<!--                <div class="bio">-->
<!--                    متخصص برق صنعتی، PLC و HMI Programming-->
<!--                    اجرای BMS و IoT با MQTT-->
<!--                    طراحی مدار، مونتاژ تابلو، راه‌اندازی CNC-->
<!--                </div>-->

        <!-- Header -->
<!--        <div class="profile-header d-flex align-items-center">-->
<!--            <img :src="assets.profile" class="avatar" />-->
<!--            <div class="stats d-flex flex-fill justify-content-around">-->
<!--                <div>-->
<!--                    <strong>50+</strong>-->
<!--                    <div class="small">پروژه</div>-->
<!--                </div>-->
<!--                <div>-->
<!--                    <strong>17+</strong>-->
<!--                    <div class="small">سال تجربه</div>-->
<!--                </div>-->
<!--                <div>-->
<!--                    <strong>Industrial</strong>-->
<!--                    <div class="small">Tech</div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <div class="bio-section mt-2">
<!--            <h6 class="mb-1">مسعود منصوری | مهندس برق</h6>-->

            <p class="small text-muted mb-2">
                برق صنعتی • اتوماسیون • اینترنت صنعتی
                PLC & HMI Programming
                اجرای پروژه‌های صنعتی از ۱۳۸۹
            </p>

            <p class="small">📍 مشهد | همکاری پروژه‌ای و فاکتوری</p>

<!--            <div class="d-grid gap-2">-->
<!--                <a href="tel:09153903097" class="btn btn primary">-->
<!--                    📞 تماس مستقیم-->
<!--                </a>-->

<!--                <a href="mailto:mansory.php@gmail.com" class="btn btn secondary">-->
<!--                    ✉ ارسال ایمیل-->
<!--                </a>-->
<!--            </div>-->
        </div>

        <!-- Skills as Stories -->
        <div class="highlights d-flex overflow-auto mt-4">
            <div class="highlight-item" v-for="(skill, index) in skills" :key="index">
                <img :src="assets.icon" alt="mansory"/>
                <small>{{ skill.name }}</small>
            </div>
        </div>

        <!-- About Section -->
        <!--        <div class="about-box">-->
        <!--            <h6>درباره من</h6>-->
        <!--            <p>-->
        <!--                از سال ۱۳۸۹ وارد صنعت شدم و در حوزه برق صنعتی، اتوماسیون و هوشمندسازی فعالیت دارم.-->
        <!--                همکاری با دستگاه‌سازان و شرکت‌های مختلف به‌صورت پروژه‌ای و فاکتوری.-->
        <!--            </p>-->

        <!--            <h6 class="mt-3">تحصیلات</h6>-->
        <!--            <p>-->
        <!--                کاردانی برق الکترونیک-->
        <!--                شهید محمد منتظری مشهد (دانشگاه ملی مهارت)-->
        <!--                معدل ۱۵-->
        <!--            </p>-->

        <!--            <h6 class="mt-3">مهارت‌ها</h6>-->
        <!--            <ul>-->
        <!--                <li>PLC & HMI Programming</li>-->
        <!--                <li>برق صنعتی و مونتاژ تابلو</li>-->
        <!--                <li>راه‌اندازی سروو درایو و اینورتر</li>-->
        <!--                <li>کنترل CNC (برند GSK)</li>-->
        <!--                <li>PHP & Laravel</li>-->
        <!--                <li>Internet of Things (IoT)</li>-->
        <!--            </ul>-->
        <!--        </div>-->

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
                { name: "PLC", icon: "bi bi-cpu" },
                { name: "HMI", icon: "bi bi-display" },
                { name: "برق صنعتی", icon: "bi bi-lightning-charge" },
                { name: "اتوماسیون", icon: "bi bi-gear" },
                { name: "IoT صنعتی", icon: "bi bi-wifi" },
                { name: "Laravel", icon: "bi bi-code-slash" }
            ],
            projects: [
                { id: 1, title: "تابلو برق صنعتی", image: assets.banner },
                { id: 2, title: "اتوماسیون خط تولید", image: assets.banner },
                { id: 3, title: "کنترل CNC", image: assets.banner },
                { id: 4, title: "سیستم مانیتورینگ صنعتی", image: assets.banner }
            ]
        };
    }
};
</script>

<style scoped>
.instagram-profile {
    max-width: 430px;
    margin: auto;
    padding: 15px;
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
    gap: 18px;
    margin: 8px 0;
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
.bio {
    margin: 20px 0;
    font-size: 14px;
    line-height: 1.6;
}
.bio-section {
    margin-bottom: 15px;
}
.highlights {
    gap: 15px;
}
.highlights::-webkit-scrollbar {
    display: none;             /* Chrome, Safari, Opera */
}
.highlight-item {
    text-align: center;
}
.highlight-item img {
    width: 65px;
    height: 65px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #ccc;
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


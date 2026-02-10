<template>
    <div class="d-flex flex-column vh-100">
        <!-- محتوا -->
        <div class="flex-fill" style="padding-bottom: 70px;"> <!-- فضای پایین برای ناوبری -->
            <component :is="currentTabComponent" />
        </div>

        <!-- ناوبری پایین صفحه -->
        <nav class="navbar navbar-light bg-light fixed-bottom">
            <div class="d-flex justify-content-around w-100">
                <div class="text-center" @click="currentTab = 'Home'">
                    <i class="bi bi-house-gear-fill" :class="{'text-primary': currentTab==='Home'}" style="font-size:1.3rem;"></i>
                    <div class="small mt-1">پنل</div>
                </div>
                <div class="text-center" @click="currentTab = 'Projects'">
                    <i class="bi bi-person-workspace" :class="{'text-primary': currentTab==='Projects'}" style="font-size:1.3rem;"></i>
                    <div class="small mt-1">پروژه ها</div>
                </div>
                <div class="text-center" @click="currentTab = 'Downloads'">
                    <i class="bi bi-download" :class="{'text-primary': currentTab==='Downloads'}" style="font-size:1.3rem;"></i>
                    <div class="small mt-1">دانلود ها</div>
                </div>
                <div class="text-center" @click="currentTab = 'Features'">
                    <i class="bi bi-grid-fill" :class="{'text-primary': currentTab==='Features'}" style="font-size:1.3rem;"></i>
                    <div class="small mt-1">امکانات</div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
import Home from '../pages/panel/Home.vue'
import Projects from '../pages/panel/Projects.vue'
import Downloads from '../pages/panel/Downloads.vue'
import Features from '../pages/panel/Features.vue'

export default {
    name: 'AppPanel',
    components: { Home, Projects, Downloads, Features },
    data() {
        return {
            currentTab: 'Home',
        }
    },
    computed: {
        currentTabComponent() {
            return this.currentTab;
        }
    }
}
</script>

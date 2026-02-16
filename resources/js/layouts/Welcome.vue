<template>
    <div class="d-flex flex-column min-vh-100">

        <!-- محتوا -->
        <div class="flex-fill d-flex justify-content-center align-items-center"
             style="padding-bottom: 70px;">
            <component :is="currentTabComponent" />
        </div>

        <!-- ناوبری پایین -->
        <nav class="navbar navbar-light bg-light fixed-bottom">
            <div class="d-flex justify-content-around w-100">
                <div class="text-center" @click="currentTab = 'Home'">
                    <i class="bi bi-house-fill"
                       :class="{'text-primary': currentTab==='Home'}"
                       style="font-size:1.3rem;"></i>
                    <div class="small mt-1">خانه</div>
                </div>

                <div class="text-center" @click="currentTab = 'Services'">
                    <i class="bi bi-briefcase-fill"
                       :class="{'text-primary': currentTab==='Services'}"
                       style="font-size:1.3rem;"></i>
                    <div class="small mt-1">خدمات</div>
                </div>

                <div class="text-center" @click="currentTab = 'Store'">
                    <i class="bi bi-cart-fill"
                       :class="{'text-primary': currentTab==='Store'}"
                       style="font-size:1.3rem;"></i>
                    <div class="small mt-1">فروشگاه</div>
                </div>

                <div class="text-center" @click="currentTab = 'Features'">
                    <i class="bi bi-grid-fill"
                       :class="{'text-primary': currentTab==='Features'}"
                       style="font-size:1.3rem;"></i>
                    <div class="small mt-1">امکانات</div>
                </div>
            </div>
        </nav>

    </div>
</template>


<script>
import Home from '../pages/Home.vue'
import Services from '../pages/Services.vue'
import Store from '../pages/Store.vue'
import Features from '../pages/Features.vue'

export default {
    components: { Home, Services, Store, Features },
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

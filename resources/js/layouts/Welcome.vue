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

                <div class="text-center" @click="currentTab = 'Order'">
                    <i class="bi bi-clipboard-plus-fill"
                       :class="{'text-primary': currentTab==='Order'}"
                       style="font-size:1.3rem;"></i>
                    <div class="small mt-1">سفارش</div>
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
import Order from '../pages/Order.vue'
import Features from '../pages/Features.vue'

export default {
    components: { Home, Services, Order, Features },
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

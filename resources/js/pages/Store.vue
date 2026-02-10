<template>
    <div class="container py-4">
        <h2 class="mb-4">فروشگاه</h2>

        <!-- پلن‌ها / پک‌ها -->
        <div class="mb-4">
            <h5>پلن‌ها / پک‌ها</h5>
            <div class="d-flex flex-column gap-2">
                <div class="border rounded p-3">پلن طلایی: دسترسی کامل به خدمات</div>
                <div class="border rounded p-3">پلن نقره‌ای: خدمات متوسط</div>
                <div class="border rounded p-3">پلن برنزی: خدمات پایه</div>
            </div>
        </div>

        <!-- قطعات صنعتی -->
        <div class="mb-4">
            <h5>قطعات صنعتی</h5>
            <div class="d-flex flex-column gap-2">
                <div class="border rounded p-3">قطعه A: توضیح کوتاه</div>
                <div class="border rounded p-3">قطعه B: توضیح کوتاه</div>
                <div class="border rounded p-3">قطعه C: توضیح کوتاه</div>
            </div>
        </div>

        <!-- کار مونتاژ -->
        <div class="mb-4">
            <h5>کار مونتاژ</h5>
            <div class="d-flex flex-column gap-2">
                <div class="border rounded p-3">مونتاژ دستگاه X</div>
                <div class="border rounded p-3">مونتاژ سیستم Y</div>
            </div>
        </div>

        <!-- تعمیرات و آموزش -->
        <div class="mb-4">
            <h5>تعمیرات و آموزش</h5>
            <div class="d-flex flex-column gap-2">
                <div class="border rounded p-3">آموزش استفاده از تجهیزات</div>
                <div class="border rounded p-3">تعمیر و نگهداری دستگاه‌ها</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Store',
    data() {
        return {
            assets: window.assets,
            routes: window.routes,
        };
    }
}
</script>

<style scoped>
.container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
h5 {
    margin-bottom: 0.75rem;
}
</style>

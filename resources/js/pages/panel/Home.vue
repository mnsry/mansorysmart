<template>
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title text-muted">کل پروژه‌ها</h6>
                        <h3 class="fw-bold">12</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title text-muted">پروژه‌های فعال</h6>
                        <h3 class="fw-bold text-success">5</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title text-muted">درآمد کل</h6>
                        <h3 class="fw-bold text-primary">125,000,000 تومان</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title text-muted">پیام‌ها</h6>
                        <h3 class="fw-bold text-warning">3</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold">آخرین پروژه‌ها</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" v-for="p in recentProjects" :key="p.id">
                            {{ p.title }} — <span class="text-muted">{{ p.status }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header fw-bold">اعلان‌ها</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" v-for="n in notifications" :key="n.id">
                            {{ n.text }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const recentProjects = [
    { id: 1, title: 'پروژه باغ ویلایی', status: 'در حال اجرا' },
    { id: 2, title: 'سیستم روشنایی بانک', status: 'تکمیل شده' },
    { id: 3, title: 'نمای ساختمان اداری', status: 'در انتظار تایید' },
]

const notifications = [
    { id: 1, text: 'پروژه جدیدی برای شما ثبت شد.' },
    { id: 2, text: 'مدارک پروژه شماره 124 تایید شد.' },
    { id: 3, text: 'پرداخت جدید انجام شد.' },
]
</script>

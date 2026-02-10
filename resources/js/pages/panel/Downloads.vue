<template>
    <div class="container py-4">
        <h4 class="fw-bold mb-3">دانلودها</h4>

        <div class="row g-3">
            <div class="col-md-4" v-for="file in files" :key="file.id">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">{{ file.title }}</h6>
                        <p class="card-text text-muted small flex-grow-1">
                            {{ file.description }}
                        </p>
                        <a :href="file.url" class="btn btn-outline-primary mt-auto">
                            دانلود فایل
                        </a>
                    </div>
                    <div class="card-footer text-muted small">
                        {{ file.size }} — {{ file.date }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const files = [
    { id: 1, title: 'کاتالوگ محصولات', description: 'نسخه PDF کاتالوگ کامل', size: '3.2MB', date: '1402/11/02', url: '#' },
    { id: 2, title: 'قرارداد نمونه', description: 'فایل Word قرارداد پروژه', size: '1.1MB', date: '1402/10/20', url: '#' },
    { id: 3, title: 'راهنمای نصب', description: 'راهنمای نصب سیستم روشنایی', size: '4.5MB', date: '1402/11/01', url: '#' },
]
</script>

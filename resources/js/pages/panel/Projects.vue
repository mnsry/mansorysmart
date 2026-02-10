<template>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0">پروژه‌ها</h4>
            <button class="btn btn-primary">افزودن پروژه جدید</button>
        </div>

        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>عنوان</th>
                        <th>مشتری</th>
                        <th>وضعیت</th>
                        <th>تاریخ ثبت</th>
                        <th class="text-end">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(project, index) in projects" :key="project.id">
                        <td>{{ index + 1 }}</td>
                        <td>{{ project.title }}</td>
                        <td>{{ project.client }}</td>
                        <td>
                <span class="badge" :class="statusClass(project.status)">
                  {{ project.status }}
                </span>
                        </td>
                        <td>{{ project.date }}</td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary me-1">مشاهده</button>
                            <button class="btn btn-sm btn-outline-secondary me-1">ویرایش</button>
                            <button class="btn btn-sm btn-outline-danger">حذف</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script setup>
const projects = [
    { id: 1, title: 'پروژه باغ ویلایی', client: 'آقای احمدی', status: 'فعال', date: '1402/11/01' },
    { id: 2, title: 'سیستم روشنایی بانک', client: 'بانک ملت', status: 'تکمیل شده', date: '1402/10/15' },
    { id: 3, title: 'نمای ساختمان اداری', client: 'شرکت پارس', status: 'در انتظار', date: '1402/11/05' },
]

function statusClass(status) {
    switch (status) {
        case 'فعال': return 'bg-success'
        case 'تکمیل شده': return 'bg-primary'
        case 'در انتظار': return 'bg-warning text-dark'
        default: return 'bg-secondary'
    }
}
</script>

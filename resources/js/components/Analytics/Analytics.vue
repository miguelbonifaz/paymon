<script setup>
import VueApexCharts from 'vue3-apexcharts'
import axios from 'axios'
import { onMounted, ref } from 'vue'

let filters = ref({})
let report = ref({})
let handleSubmit = async () => {
    await axios.get('/api/video-analytics', {
        params: {
            fromDate: filters.value.fromDate,
            toDate: filters.value.toDate
        }
    }).then(res => {
        report.value = res.data.data.report
    })
}

let fetchVideoAnalytics = async () => {
    await axios.get(`/api/video-analytics`)
        .then(res => {
            filters.value = res.data.data.filters
            report.value = res.data.data.report
        })
}

onMounted(() => {
    fetchVideoAnalytics()
})

</script>

<template>
    <form @submit.prevent="handleSubmit" class="mb-10">
        <div class="grid grid-cols-2 gap-4 bg-gray-50 rounded-lg p-6 shadow">
            <div>
                <label for="fromDate" class="block text-sm font-medium leading-6 text-gray-900"
                    >From Date</label
                >
                <div class="mt-2">
                    <input
                        type="date"
                        name="fromDate"
                        id="fromDate"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        v-model="filters.fromDate"
                    />
                </div>
            </div>
            <div>
                <label for="toDate" class="block text-sm font-medium leading-6 text-gray-900"
                    >To Date</label
                >
                <div class="mt-2">
                    <input
                        type="date"
                        name="toDate"
                        id="toDate"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        v-model="filters.toDate"
                    />
                </div>
            </div>
            <div class="col-span-2">
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a
                        href="{{ route('admin.analytics.index') }}"
                        class="text-sm font-semibold leading-6 text-gray-900"
                        >Reset filters</a
                    >
                    <button
                        type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        Filter
                    </button>
                </div>
            </div>
        </div>
    </form>

    <div class="pt-4"></div>
    <h3 class="text-xl font-medium text-gray-700">Videos with more views</h3>
    <VueApexCharts
        width="100%"
        height="300px"
        :series="report.series"
        :options="report.options"
        type="line"
    />
</template>

<style scoped></style>

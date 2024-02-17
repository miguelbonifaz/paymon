<script setup>
import axios from 'axios'
import { onMounted, ref, watch } from 'vue'
import { throttle } from 'lodash'

let videos = ref([])
let search = ref('')

let fetchVideos = async (value) => {
    await axios
        .get(`/api/videos`, {
            params: {
                'filter[title]': value,
            },
        })
        .then((res) => (videos.value = res.data))
}

let throttledFetchVideos = throttle(fetchVideos, 1000)

watch(search, (value) => {
    throttledFetchVideos(value)
})

onMounted(() => {
    fetchVideos()
})
</script>

<template>
    <div class="mb-8">
        <div class="mt-2">
            <input
                type="text"
                name="search"
                v-model="search"
                id="search"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="Search a video...."
            />
        </div>
    </div>
    <div class="grid grid-cols-3 gap-8">
        <template v-for="video in videos.data">
            <a :href="`/videos/${video.id}`">
                <div>
                    <video width="100%" height="240">
                        <source :src="video.url" type="video/mp4" />
                    </video>
                    <div class="flex justify-between mt-1 text-gray-700">
                        <p class="text-sm" v-text="video.title"></p>
                        <span class="text-sm w-[150px] text-right font-bold">
                            {{ video.views }} {{ video.views === 1 ? 'view' : 'views' }}
                        </span>
                    </div>
                </div>
            </a>
        </template>
    </div>
</template>

<style scoped></style>

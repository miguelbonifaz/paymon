<div>
    <div class="mb-8">
        <div class="mt-2">
            <input
                    type="text"
                    wire:model.live="search"
                    name="search"
                    id="search"
                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                   placeholder="Search a video...."
            />
        </div>
    </div>
    <div class="grid grid-cols-3 gap-8">
        @foreach($videos as $video)
            <a href="{{ route('videos.show', $video) }}">
                <div>
                    <video width="100%" height="240">
                        <source src="{{ asset($video->url) }}" type="video/mp4">
                    </video>
                    <div class="flex justify-between mt-1 text-gray-700">
                        <p class="text-sm">{{ $video->title }}</p>
                        <span class="text-sm w-[150px] text-right font-bold">
                            {{ $video->views }} {{ $video->views === 1 ? 'view' : 'views' }}
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

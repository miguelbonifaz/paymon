<div x-data>
    <div class="video-container">
        <video
            width="100%"
            height="240"
            controls
            x-on:play="$dispatch('video-played')"
        >
            <source src="{{ asset($video->url) }}" type="video/mp4">
            Tu navegador no soporta la etiqueta de video.
        </video>
        <div class="flex justify-between mt-1 text-gray-700">
            <p>{{ $video->title }}</p>
            <span>
                {{ $video->views }} {{ $video->views === '1' ? 'view' : 'views' }}
            </span>
        </div>
    </div>
</div>
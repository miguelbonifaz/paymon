<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="grid gap-4 lg:grid-cols-2">
            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                    <input
                        type="text"
                        wire:model="title"
                        name="title"
                        id="title"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                </div>
                <p class="text-red-600 font-medium text-sm mt-1">@error('title') {{ $message }} @enderror</p>
            </div>
            <div>
                <label for="url" class="block text-sm font-medium leading-6 text-gray-900">Url</label>
                <div class="mt-2">
                    <input
                        type="file"
                        wire:model="video"
                        name="video"
                        id="video"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                </div>
                <p class="text-red-600 font-medium text-sm mt-1">@error('video') {{ $message }} @enderror</p>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ route('admin.videos.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</div>
@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="bg-gray-700 px-6 py-4">
        <div class="font-semibold text-lg border-b   text-white text-center">
            {{ $title }}
        </div>

    </div>
        <div class="font-semibold mt-4 text-sm text-gray-900">
            {{ $content }}
        </div>

    <div class="flex flex-row justify-end px-6 py-4 border-t  bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-modal>

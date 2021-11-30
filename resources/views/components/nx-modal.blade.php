@props(['isOpenData' => 'isOpenData', 'isOpenEarlyData' => 'isOpenEarlyData'])

<template x-if="{{ $isOpenEarlyData }}">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="fixed z-10 inset-0 overflow-y-auto" x-show="{{ $isOpenData }}">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay, show/hide based on modal state. -->
            <div
                x-show="{{ $isOpenData }}"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity"
                aria-hidden="true"
            >
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!-- Modal panel, show/hide based on modal state. -->
            <div
                x-show="{{ $isOpenData }}"
                @click.away="{{ $isOpenData }} = false"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full"
                role="dialog"
                aria-modal="true"
                aria-labelledby="modal-headline"
            >
                {{ $slot }}
            </div>
        </div>
    </div>
</template>

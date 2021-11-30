<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Words') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="data()" x-init="init()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3 flex flex-row-reverse">
            <x-nx-button bg="indigo" @click="openModalImport()">Import</x-nx-button>
            <x-nx-button bg="red" class="mr-3" @click="openModalDeleteAll()">Delete All</x-nx-button>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-nx-table>
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Rude
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Middle
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Polite
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if (($words ?? false) && $words->count() > 0)
                        @foreach ($words as $word)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $word->number }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $word->rude }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $word->middle }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $word->polite }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-2" @click.prevent="openModalEdit({{ $word->id }}, {{ $word->number }}, '{{ $word->rude }}', '{{ $word->middle }}', '{{ $word->polite }}')">Edit</a>
                                    {{-- <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-2" @click.prevent="openModalImport()">Edit</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No records</td>
                        </tr>
                    @endif
                </tbody>
            </x-nx-table>

            <x-nx-modal isOpenData="isOpenModalImport" isOpenEarlyData="isOpenEarlyModal">
                <form method="POST" enctype="multipart/form-data" action="{{ route('words.store') }}">
                    @csrf

                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Excel File
                            </label>
                            <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    {{-- <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> --}}

                                    <svg class="mx-auto h-12 w-12" version="1.1" viewBox="0 0 49.515 49.515" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m5.6694 0c-3.141 0-5.6694 2.5284-5.6694 5.6694v38.176c0 3.141 2.5284 5.6694 5.6694 5.6694h38.175c3.141 0 5.6699-2.5284 5.6699-5.6694v-38.176c0-3.141-2.529-5.6694-5.6699-5.6694zm8.6052 12.313 6.1293 0.14882 2.28 4.4256c1.254 2.434 2.3415 4.4283 2.4169 4.4318s1.2268-1.9881 2.5585-4.4256l2.4216-4.4318 2.7993-0.07493c1.5396-0.04131 2.7993-0.02427 2.7993 0.03772 0 0.062-1.6669 2.8299-3.7042 6.151-2.0373 3.3211-3.7042 6.1116-3.7042 6.2012s1.6425 2.7726 3.6499 5.9624c2.0074 3.1898 3.7407 5.9485 3.852 6.1304 0.15722 0.25702-0.46472 0.33094-2.79 0.33073l-2.9921-5.15e-4 -2.5135-4.7542c-1.3824-2.6149-2.573-4.7555-2.6458-4.7568-0.0728-0.0012-1.2634 2.1382-2.6458 4.7542l-2.5135 4.7563-2.9766 5.16e-4c-1.6371 3.06e-4 -2.9766-0.04867-2.9766-0.10904 0-0.06037 1.7264-2.8194 3.8365-6.1309 2.1101-3.3115 3.8365-6.1315 3.8365-6.2673s-1.6016-2.9769-3.559-6.3133z" fill="#0c7238" stroke-linejoin="bevel" stroke-width="1.0583"/>
                                    </svg>


                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        XLS, XLSX up to 10MB
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        {{-- <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Upload
                        </button> --}}

                        <x-nx-button2 type="submit" bg="indigo">Upload</x-nx-button2>

                        {{-- <button
                            @click="isOpenModalImport = false"
                            type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                        >
                            Cancel
                        </button> --}}

                        <x-nx-button2 type="button" class="mt-3 sm:mt-0" bg="white" @click="isOpenModalImport = false">Cancel</x-nx-button2>
                    </div>
                </form>
            </x-nx-modal>

            <x-nx-modal isOpenData="isOpenModalDeleteAll" isOpenEarlyData="isOpenEarlyModal">
                <form method="POST" action="{{ route('words.destroyAll') }}">
                    @method('DELETE')
                    @csrf

                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <!-- Heroicon name: exclamation -->
                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                    Delete All Records
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Are you sure you want to delete all records? All of your data will be permanently removed. This action cannot be undone.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <x-nx-button2 type="submit" bg="red">Delete All</x-nx-button2>
                        <x-nx-button2 type="button" class="mt-3 sm:mt-0" bg="white" @click="isOpenModalDeleteAll = false">Cancel</x-nx-button2>
                    </div>
                </form>
            </x-nx-modal>

            <x-nx-modal isOpenData="isOpenModalEdit" isOpenEarlyData="isOpenEarlyModal">
                <form method="POST" :action="modalEditData.action">
                    @method('PUT')
                    @csrf

                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="grid gap-6">
                            {{-- <div>
                                <label for="number" class="block text-sm font-medium text-gray-700">Number</label>
                                <input type="number" name="number" id="number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" :value="modalEditData.number">
                            </div> --}}

                            <x-nx-labelinput id="number" type="number" name="number" valueData="modalEditData.number">Number</x-nx-labelinput>

                            {{-- <div>
                                <label for="rude" class="block text-sm font-medium text-gray-700">Rude</label>
                                <input type="text" name="rude" id="rude" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" :value="modalEditData.rude">
                            </div> --}}

                            <x-nx-labelinput id="rude" type="text" name="rude" valueData="modalEditData.rude">Rude</x-nx-labelinput>

                            {{-- <div>
                                <label for="middle" class="block text-sm font-medium text-gray-700">Middle</label>
                                <input type="text" name="middle" id="middle" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" :value="modalEditData.middle">
                            </div> --}}

                            <x-nx-labelinput id="middle" type="text" name="middle" valueData="modalEditData.middle">Middle</x-nx-labelinput>

                            {{-- <div>
                                <label for="polite" class="block text-sm font-medium text-gray-700">Polite</label>
                                <input type="text" name="polite" id="polite" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" :value="modalEditData.polite">
                            </div> --}}

                            <x-nx-labelinput id="polite" type="text" name="polite" valueData="modalEditData.polite">Polite</x-nx-labelinput>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <x-nx-button2 type="submit" bg="blue">Update</x-nx-button2>
                        <x-nx-button2 type="button" class="mt-3 sm:mt-0" bg="white" @click="isOpenModalEdit = false">Cancel</x-nx-button2>
                    </div>
                </form>
            </x-nx-modal>
        </div>
    </div>

    <script>
        function data() {
            return {
                isOpenEarlyModal: false,
                isOpenModalImport: false,
                isOpenModalDeleteAll: false,
                isOpenModalEdit: false,
                modalEditData: {
                    number: 0,
                    rude: '',
                    middle: '',
                    polite: '',
                    action: "{{ route('words.update', ['word' => ':word']) }}"
                },
                init() {
                    this.isOpenEarlyModal = true;
                },
                openModalImport() {
                    this.isOpenModalImport = true;
                },
                openModalDeleteAll() {
                    this.isOpenModalDeleteAll = true;
                },
                openModalEdit(id, number, rude, middle, polite) {
                    this.modalEditData.number = number;
                    this.modalEditData.rude = rude;
                    this.modalEditData.middle = middle;
                    this.modalEditData.polite = polite;

                    var url = this.modalEditData.action.replace(':word', id);
                    this.modalEditData.action = url;

                    this.isOpenModalEdit = true;
                }
            };
        }
    </script>
</x-app-layout>

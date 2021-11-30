<x-guest-layout>
    <div class="py-12" x-data="data()" x-init="init()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3 flex items-center">
            {{-- <x-nx-input id="search" type="text" name="search" valueData="modalEditData.simpleRude" />
            <x-nx-button2 type="button" bg="indigo">Search</x-nx-button2> --}}

            <div class="flex rounded-md shadow-sm">
                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                    Search
                </span>
                <input type="text" name="search" id="search" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Search for words..." autofocus x-model="search" @keyup="searchWords()">
            </div>
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
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                            Middle
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                            Polite
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Examples</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" x-ref="tbody">
                    @if (($words ?? false) && $words->count() > 0)
                        @foreach ($words as $word)
                            <tr>
                                <td class="px-6 py-4">
                                    {{ $word->number }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $word->rude }}
                                </td>
                                <td class="px-6 py-4 hidden sm:table-cell">
                                    {{ $word->middle }}
                                </td>
                                <td class="px-6 py-4 hidden sm:table-cell">
                                    {{ $word->polite }}
                                </td>
                                <td class="px-6 py-4 text-right text-sm font-medium">
                                    <a href="{{ route('home.examples', ['id' => $word->id]) }}" class="text-blue-600 hover:text-blue-900 mr-2">
                                        Examples
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">No records</td>
                        </tr>
                    @endif
                </tbody>
            </x-nx-table>
        </div>
    </div>

    <script>
        function data() {
            return {
                search: '',
                words: [],
                init() {
                    var rows = this.$refs.tbody.children;

                    for (var row of rows) {
                        this.words.push({
                            ref: row,
                            rude: row.children[1].innerText.toLowerCase(),
                            middle: row.children[2].innerText.toLowerCase(),
                            polite: row.children[3].innerText.toLowerCase(),
                        });
                    }
                },
                searchWords() {
                    for (var word of this.words) {
                        if (word.rude.indexOf(this.search.toLowerCase()) > -1) {
                            word.ref.style.display = '';
                            continue;
                        }

                        if (word.middle.indexOf(this.search.toLowerCase()) > -1) {
                            word.ref.style.display = '';
                            continue;
                        }

                        if (word.polite.indexOf(this.search.toLowerCase()) > -1) {
                            word.ref.style.display = '';
                            continue;
                        }

                        word.ref.style.display = 'none';
                    }
                },
            };
        }
    </script>
</x-guest-layout>

<x-guest-layout>
    <div class="py-12" x-data="data()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3 flex items-center">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Examples of '{{ $rude }}'</h1>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-nx-table>
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Simple Rude
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Soft Rude
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Simple Polite
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Soft Polite
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if (($examples ?? false) && $examples->count() > 0)
                        @foreach ($examples as $example)
                            <tr x-ref="example{{ $example->id }}">
                                <td class="px-6 py-4">
                                    {{ $example->number }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $example->simple_rude }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $example->soft_rude }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $example->simple_polite }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $example->soft_polite }}
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

            };
        }
    </script>
</x-guest-layout>

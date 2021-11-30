@props(['id' => 'id', 'type' => 'text', 'name' => 'name', 'value' => '', 'valueData' => false])

<div>
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $slot }}</label>

    @if ($valueData)
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" :value="{{ $valueData }}">
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $value }}">
    @endif
</div>

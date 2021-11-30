@props(['id' => 'id', 'type' => 'text', 'name' => 'name', 'value' => '', 'valueData' => false])

<div>
    @if ($valueData)
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" :value="{{ $valueData }}">
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $value }}">
    @endif
</div>

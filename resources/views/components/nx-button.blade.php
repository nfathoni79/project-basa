@props(['bg' => 'gray', 'text' => 'white'])

<button {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-'.$bg.'-800 border border-transparent rounded-md font-semibold text-xs text-'.$text.' uppercase tracking-widest hover:bg-'.$bg.'-700 active:bg-'.$bg.'-900 focus:outline-none focus:border-'.$bg.'-900 focus:ring ring-'.$bg.'-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-2 py-2 bg-blue-500 border border-transparent rounded-lg font-semibold text-xs text-white tracking-widest hover:bg-blue-550 active:bg-blue-550 focus:outline-none focus:border-blue-500 focus:ring ring-blue-500 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

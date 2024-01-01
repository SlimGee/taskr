<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2.5 bg-blue-accent-700 border border-transparent rounded-sm font-medium text-sm text-white text-center tracking-wide hover:bg-deep-purple-700 active:bg-deep-purple-900 focus:outline-none focus:border-deep-purple-900 focus:shadow-outline-deep-purple transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

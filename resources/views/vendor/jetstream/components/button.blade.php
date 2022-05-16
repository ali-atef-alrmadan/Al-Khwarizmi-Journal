<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full p-2 bg-indigo-500 rounded-md text-xl text-white text-center cursor-pointer hover:bg-indigo-600 active:bg-indigo-600']) }}>
    {{ $slot }}
</button>

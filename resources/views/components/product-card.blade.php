@props(['product'])

<x-panel>
    <div class="flex-1 flex flex-col">
        <a href="#" class="self-start text-sm text-gray-400 transition-colors duration-300">{{ $product->subject }}</a>

        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-600 transition-colors duration-300 ml-28">
            <a>
                {{ $product->title }}
            </a>
        </h3>
        
        <p class="text-sm text-gray-400 mt-auto ml-28">{{ $product->pages }} pagine - €{{ $product->price }}</p>
    </div>

    <div>
        <x-tag>{{ $product->type }}</x-tag>
    </div>
</x-panel>
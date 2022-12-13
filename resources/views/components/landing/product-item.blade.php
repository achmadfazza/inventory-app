@props(['product'])

@if ($product->quantity > 0)
<div class="relative bg-white p-4 rounded-lg border shadow-md">
    <a href="{{ route('product.show', $product->slug) }}" class="text-gray-700 text-md hover:text-red-400">
        <img src="{{ $product->image }}" class="rounded-lg object-contain mx-auto h-48 w-96" />
    </a>
    {{--
    <div
        class="font-mono absolute -top-3 -right-3 p-2 {{ $product->quantity > 0 ? 'bg-green-700' : 'bg-rose-700' }} rounded-lg text-gray-50">
        {{ $product->quantity }}
    </div>
    --}}
    <div class="flex flex-col gap-2 py-2">
        <div class="flex justify-between">
            <a href="{{ route('product.show', $product->slug) }}" class="text-gray-700 text-md hover:text-red-400">{{
                $product->name }}</a>
            <div class="text-gray-500 text-sm">
                {{ $product->category->name }}
            </div>
        </div>
        <div class="text-md text-gray-500">
            {{ Str::limit($product->description, 50) }}
        </div>
        <!-- @if ($product->quantity > 0) -->
        <form action="{{ route('cart.store', $product->id) }}" method="POST">
            @csrf
            <button class="text-black-600 bg-green-200 p-2 rounded-lg text-sm text-center hover:bg-green-300 w-full"
                type="submit">
                Tambah ke keranjang
            </button>
        </form>
        <!-- @else
        <button
            class="text-gray-700 bg-gray-200 p-2 rounded-lg text-sm text-center hover:bg-gray-300 w-full cursor-not-allowed">
            Pengadaan Belum Dibuka
        </button>
        @endif -->
    </div>
</div>
@endif
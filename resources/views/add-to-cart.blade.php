<x-app-layout>
    <div class="container mx-auto mt-6 max-w-3xl">
        <h1 class="text-3xl font-bold mb-4">Your Cart</h1>

        @if ($addedProducts->isEmpty())
            <p class="bg-blue-100 text-blue-800 p-4 rounded-md">Your cart is empty.</p>
        @else
            <div class="flex flex-col space-y-6"> 
                @foreach ($addedProducts as $item)
                    <div class="flex bg-white rounded-lg shadow-lg p-4 relative "> 
                        <img src="{{ asset('storage/images/' . $item->image) }}" alt="{{ $item->name }}" class="w-48 h-48 object-cover rounded-lg"> <!-- Larger image size -->
                        <div class="ml-4 flex flex-col justify-between"> 
                            <div>
                                <h5 class="text-xl font-semibold">{{ $item->name }}</h5>
                                <p class="text-gray-600">Price: ${{ $item->price }}</p>
                                <p class="text-gray-600">Quantity: {{ $item->pivot->quantity }}</p>
                            </div>
                            <form action="/products/added-products/destroy/{{ $item->id }}" method="POST" class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 absolute top-3 right-3 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-200">Remove</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>

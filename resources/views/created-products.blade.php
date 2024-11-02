{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head> --}}

{{-- <body> --}}

<x-app-layout class="relative">
    <a href="/products/added-products" class="w-full flex justify-end pr-32 items-center absolute top-5 ">
        <div class="relative "><x-bi-cart-fill class="relative" /></div>
        <div class="text-xs absolute top-[-5px]  right-[125px] bg-red-500 rounded-[11111px]">{{ $addedProductsCount }}</div>
    </a>
    <div
        class="border border-black w-[80%] relative m-auto mt-[100px] rounded-xl py-10 flex justify-center items-center flex-wrap gap-[50px]">
        <div class="text-4xl px-3 absolute top-[-20px] bg-[#f3f4f6]">Availble Products</div>
        @forelse ($products as $product)
            <div class=" bg-[#eeeeef] border relative  h-[370px] w-[300px] rounded-lg">
                <img class="h-[300px] w-full rounded-t-lg" src="{{ asset('storage/images/' . $product->image) }}"
                    alt="">
                <div class=" pl-3 pt-1 flex gap-[43px]">
                    <div class="text-[#636262] w-[200px]">{{ $product->name }}</div>
                    <div class="">{{ $product->price }}$</div>
                </div>
                <form action="/products/added-products/store" method="post">
                    @csrf
                    <input value="{{ Auth::user()->id }}" name="user_id" type="hidden">
                    <input value="{{ $product->id }}" name="product_id" type="hidden">

                    <div class="form-group">
                        <label for="quantity" class="sr-only">Quantity</label>
                        <input class="w-[60px] rounded-xl" type="number" name="quantity" min="1" value="1"  >
                            
                    </div>

                    <button
                        class="bg-[#221e31] text-white px-3 text-xs top-2 right-2 absolute py-2 rounded-full hover:opacity-75 hover:duration-200">
                        Add To Cart
                    </button>
                </form>






            </div>



        @empty
            <div>no products been added yet</div>
        @endforelse
    </div>
    <div class="h-[100px]"></div>
</x-app-layout>


{{-- 
</body>

</html> --}}

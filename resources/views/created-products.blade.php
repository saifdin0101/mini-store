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

<x-app-layout>
    <div class="border border-black w-[80%] relative m-auto mt-[100px] rounded-xl py-10 flex justify-center items-center flex-wrap gap-[50px]">
        <div class="text-4xl px-3 absolute top-[-20px] bg-[#f3f4f6]">Availble Products</div>
        @forelse ($products as $product)
            <div class=" bg-[#eeeeef] border  h-[370px] w-[300px] rounded-lg">
                <img class="h-[300px] w-full rounded-t-lg" src="{{ asset('storage/images/' . $product->image) }}"
                    alt="">
                <div class=" pl-3 pt-1 flex gap-[43px]">
                    <div class="text-[#636262] w-[200px]">{{ $product->name }}</div>
                    <div class="">{{ $product->price }}$</div>
                </div>




            </div>



        @empty
        <div>no products been added yet</div>
        @endforelse
    </div>
</x-app-layout>


{{-- 
</body>

</html> --}}

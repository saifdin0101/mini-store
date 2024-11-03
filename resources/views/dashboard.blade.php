<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center items-center font-semibold underline">
            <a class="hover:opacity-[0.7] hover:duration-200" href="/products">Created Products</a>
        </div>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if (session('success'))
        <div
            class="success-message flex justify-center relative items-center pt-10 hoho  w-[400px] overflow-hidden m-auto">
            <div class="w-[400px] bg-green-500 p-3 shadow-md gap-2 flex items-center">
                <div class="testingtheline w-[400px]"></div>
                <i class="bi text-4xl bi-check-circle text-white"></i>
                <div class="text-white font-semibold">{{ session('success') }}</div>
                <button type="button" class="btn-close ms-auto closee cursor-pointer" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-2xl">Hi {{ Auth::user()->name }}</div>

                </div>
                <form enctype="multipart/form-data"
                    class="h-[500px]   w-[500px] flex flex-col gap-5  border justify-center items-center relative rounded-lg border-black m-auto"
                    action="user/product" method="post">
                    @csrf
                    <button
                        class="flex justify-center items-center  px-5 h-[40px] rounded-full absolute top-3 border border-black right-3 ">Create
                        Product <span class="text-2xl text-red-500 pl-2">+</span></button>
                    <input name="name" class="w-[80%] border border-black rounded-full h-[50px] mt-5"
                        placeholder="Product Name" type="text">
                    <input name="price" class="w-[80%] border border-black rounded-full h-[50px]"
                        placeholder="Product Price" type="number">
                    <div
                        class="w-[80%] flex justify-center items-center h-[250px]  border border-black relative rounded-xl">
                        <input name="image" class="w-full h-full opacity-0 absolute " type="file">
                        <div class="text-9xl">+</div>
                    </div>
                    <input name="user_id" value="{{ Auth::user()->id }}" type="hidden">
                </form>
                <div class="h-[100px]"></div>
            </div>
        </div>

    </div>
    @role('admin')
        <div>hello</div>
    @endrole()

</x-app-layout>

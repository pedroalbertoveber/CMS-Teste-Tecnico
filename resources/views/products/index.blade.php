<x-layout>
  <div class="bg-transparent w-full max-w-[1000px] mx-auto mt-12">
    <h1 class="text-center text-6xl font-semibold">Todos os Produtos</h1>
  </div>

  <div 
    class="grid grid-cols-3 max-w-[1000px] mx-auto py-16 gap-8"
  >
    @foreach($products as $product)

    <a 
      href="{{ route('products.edit', $product->id)}}" 
      class="h-[200px] flex flex-col justify-between py-4 rounded-lg shadow-sm bg-gradient-to-br from-rose-500 to-yellow-300 items-center group hover:scale-105 duration-150 cursor-pointer"
    >

      <ul class="flex gap-2 justify-start w-full px-8 text-gray-300 font-bold">
        @foreach($product->categories as $category)
        <li class="text-sm">#{{ $category->name }}</li>
        @endforeach
      </ul>

      <h4 class="font-bold text-3xl uppercase text-gray-200 group-hover:text-gray-100 duration-150">
        {{ $product->name }}
      </h4>
    </a>

    @endforeach
  </div>

  <footer class="w-full max-w-[1000px] mx-auto pb-12">
    <p class="text-zinc-800">Deseja cadastrar um novo produto?
      <a href="{{ route('products.create')}}" class="text-rose-500 hover:text-rose-600 font-bold">Clique aqui</a>
    </p>
  </footer>
</x-layout>
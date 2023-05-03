<x-layout>
  <div class="flex items-center w-full bg-transparent max-w-[1000px] mx-auto">
    <svg id="sw-js-blob-svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="max-w-[400px] -mr-28">
      <defs>
        <linearGradient id="sw-gradient" x1="0" x2="1" y1="1" y2="0">
          <stop id="stop1" stop-color="rgba(244, 63, 94, 1)" offset="0%"></stop>
          <stop id="stop2" stop-color="rgba(250, 204, 21, 1)" offset="100%"></stop>
        </linearGradient>
      </defs>
      <path fill="url(#sw-gradient)" d="M27.2,-25.9C33.3,-21.2,34.9,-10.6,35.2,0.3C35.5,11.1,34.4,22.3,28.3,29.5C22.3,36.8,11.1,40.2,1.2,39C-8.7,37.8,-17.4,32,-25.5,24.7C-33.6,17.4,-41,8.7,-42.1,-1.1C-43.1,-10.9,-37.9,-21.7,-29.8,-26.5C-21.7,-31.2,-10.9,-29.8,-0.1,-29.7C10.6,-29.5,21.2,-30.6,27.2,-25.9Z" width="100%" height="100%" transform="translate(50 50)" stroke-width="0" style="transition: all 0.3s ease 0s;" stroke="url(#sw-gradient)"></path>
    </svg>

    <h2 class="text-6xl text-zinc-800 font-bold leading-tight -ml-28 uppercase">
      {{ $product->name }}
    </h2>
  </div>

  <form class="w-full max-w-[1000px] mx-auto min-h-[40vh]" method="POST" action="{{ route('products.store') }}">
    @csrf

    <!-- Form Inputs -->
    <div class="grid grid-cols-3 gap-4">
      <div class="flex flex-col gap-2 w-full">
        <label for="name">Nome</label>

        <input 
          name="name"
          type="text"
          id="name"
          value="{{ $product->name }}"
          placeholder="Digite o nome do produto"
          class="w-full py-2 px-8 rounded-full placeholder:text-gray-600 outline-none"
        />
      </div>

      <div class="flex flex-col gap-2 w-full">
        <label for="brand">Marca</label>

        <input 
          name="brand"
          type="text"
          id="brand"
          value="{{ $product->brand }}"
          placeholder="Digite a marca do produto"
          class="w-full py-2 px-8 rounded-full placeholder:text-gray-600 outline-none"
        />
      </div>

      <div class="flex flex-col gap-2 w-full">
        <label for="price">Preço</label>

        <input 
          name="price"
          type="number"
          value="{{ $product->price }}"
          id="price"
          placeholder="R$ 00,00"
          class="w-full py-2 px-8 rounded-full placeholder:text-gray-600 outline-none"
        />
      </div>
    </div>

    <!-- Categories and Description -->
    <div class="mt-8 flex items-start gap-2 w-full">
      <div class="w-full">
        <span class="text-md text-zinc-800">Categorias relacionadas</span>
        <div class="w-full grid grid-cols-3 py-2">
          
          @foreach($categories as $category)

            <div class="flex gap-2 items-center">
              <input 
                type="checkbox" 
                name="categories[]" 
                id="{{ $category->id }}" 
                value="{{ $category->id }}"
                
                @if (in_array($category->name, $productCategories))
                  checked
                @endif
              >

              <label for="{{ $category->id }}">{{ $category->name }}</label>
            </div>
          
            @endforeach

        </div>
      </div>

      <div class="flex flex-col items-start gap-2 w-full">
        <label for="description">Descrição</label>
        <textarea 
          class="rounded-md shadow-sm w-full py-2 px-4" 
          rows="4" 
          name="description" 
          id="description">
          {{ $product->description }}
        </textarea>
      </div>
    </div>

    <!-- Submit Button -->
    <div class="w-full flex justify-end items-center py-8">
      <button type="submit" class="flex items-center gap-2 bg-rose-500 py-2 px-8 rounded-full text-gray-200 font-bold hover:bg-rose-600 hover:text-gray-100 duration-150">
        Editar Produto
        <i class="bi bi-pencil-square text-gray-100"></i>
      </button>
    </div>
  </form>

  <footer class="w-full max-w-[1000px] mx-auto pb-12">
    <p class="text-zinc-800">Deseja voltar para todos produtos?
      <a href="{{ route('products.index')}}" class="text-rose-500 hover:text-rose-600 font-bold">Clique aqui</a>
    </p>
  </footer>
</x-layout>
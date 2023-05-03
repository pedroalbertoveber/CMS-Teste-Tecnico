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

    <h2 class="text-6xl text-zinc-800 font-bold leading-tight -ml-28">
      Adicione uma nova categoria de produtos
    </h2>
  </div>

  <form 
    class="flex items-start gap-4 max-w-[800px] mx-auto mt-8 min-h-[20vh] "
    method="POST"
    action="{{ route('categories.store')}}"
  >
      @csrf
      <label for="name" class="text-lg cursor-pointer">Nome</label>

      <div 
        class="flex flex-1 bg-slate-50 border rounded-full px-8 py-2 border-zinc-200 shadow-sm items-center justify-between"
      >
        <input 
          type="text"
          name="name"
          id="name"
          placeholder="Digite o nome da nova categoria"
          class="bg-transparent flex-1 outline-none placeholder:text-zinc-400"
        />

        <button type="submit" title="Enviar">
          <i class="bi bi-plus-lg text-rose-600"></i>
        </button>
      </div>
  </form>

  <footer class="w-full max-w-[1000px] mx-auto pb-12">
    <p class="text-zinc-800">Deseja cadastrar voltar para categorias?
      <a href="{{ route('categories.index')}}" class="text-rose-500 hover:text-rose-600 font-bold">Clique aqui</a>
    </p>
  </footer>
</x-layout>
<x-layout>
  <div class="bg-transparent w-full max-w-[1000px] mx-auto mt-12">
    <h1 class="text-center text-6xl font-semibold">Todas as categorias</h1>
  </div>

  @if(count($categories) === 0)
    <x-empty />
  @endif

  <div class="grid grid-cols-3 py-16 gap-8 w-full max-w-[1000px] mx-auto">
    @foreach($categories as $category)
      <div 
        class="w-9/12 relative mx-auto flex flex-col items-center justify-end h-[200px] bg-gradient-to-br from-rose-500 to-yellow-300 rounded-lg shadow-sm py-4 group hover:scale-105 duration-150 cursor-pointer hover:border hover:border-zinc-200"
      >
        <a href="{{ route('categories.edit', $category->id)}}" class="absolute hidden group-hover:flex top-4 left-4 duration-150 items-center justify-center w-[25px] h-[25px] bg-slate-50/50 rounded-full">
          <i class="bi bi-pencil-square text-sm text-slate-50 hover:text-gray-200"></i>
        </a>
        <h4 class="text-3xl duration-150 text-gray-200 uppercase font-bold group-hover:text-gray-100">{{ $category->name }}</h4>
      </div>
    @endforeach
  </div>

  <footer class="w-full max-w-[1000px] mx-auto pb-12">
    <p class="text-zinc-800">Deseja cadastrar uma nova categoria?
      <a href="{{ route('categories.create')}}" class="text-rose-500 hover:text-rose-600 font-bold">Clique aqui</a>
    </p>
  </footer>
</x-layout>
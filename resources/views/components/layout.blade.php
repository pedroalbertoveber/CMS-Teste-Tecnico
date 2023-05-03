<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

  <!-- BOOTSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- TAILWIND CONFIG -->
  @vite('resources/css/app.css')

  <title>CMS</title>
</head>
<body class="flex items-start">
  <aside class="w-[15%] flex flex-col items-start p-4 border-r h-[100vh] shadow-md fixed top-0 bottom-0 z-10 bg-slate-50">
    <div class="flex w-full justify-start items-center gap-2 mb-8">
      <div class="w-[12px] h-[12px] border rounded-full bg-red-600"></div>
      <div class="w-[12px] h-[12px] border rounded-full bg-yellow-500"></div>
      <div class="w-[12px] h-[12px] border rounded-full bg-green-500"></div>
    </div>

    <nav class="w-full">
      <ul class="w-full flex flex-col gap-4">
          <li class="w-full">
            <a href="#"  class="w-full flex items-center gap-4 group">
              <i class="bi bi-house group-hover:text-rose-600 duration-150"></i>
              <span class="text-zinc-900 group-hover:text-rose-600 text-md duration-150 font-semibold">
                Home
              </span>
            </a>
          </li>

          <li>
            <a href="{{ route('categories.index') }}" class="w-full flex items-center gap-4 group" >
              <i class="bi bi-hash group-hover:text-rose-600 duration-150"></i>
              <span class="text-zinc-900 group-hover:text-rose-600 text-md duration-150 font-semibold">
                Categorias
              </span>
            </a>
          </li>

          <li>
            <a href="{{ route('products.index') }}" class="w-full flex items-center gap-4 group" >
              <i class="bi bi-upc group-hover:text-rose-600 duration-150"></i>
              <span class="text-zinc-900 group-hover:text-rose-600 text-md duration-150 font-semibold">
                Produtos
              </span>
            </a>
          </li>
      </ul>
    </nav>
  </aside>

  <main class="w-full">
    <header class="w-full border-b border-b-zinc-200 bg-transparent backdrop-blur-sm shadow-sm h-[80px] px-8 flex items-center fixed top-0 left-[15%]">
      <div class="flex items-center justify-start py-2 px-4 min-w-[25rem] rounded-full gap-4 bg-slate-50">
        <i class="bi bi-search text-rose-600"></i>

        <input 
          type="text" 
          placeholder="Procure por algum produto" 
          required 
          class="placeholder:text-zinc-500 text-sm outline-none text-zinc-700 bg-transparent flex-1"
        />
      </div>
    </header>

    <section class="pt-[80px] w-full min-h-[100vh] pl-[15%] bg-gradient-to-b from-slate-100 to-rose-100">
      {{ $slot }}
    </section>
  </main>

</body>
</html>
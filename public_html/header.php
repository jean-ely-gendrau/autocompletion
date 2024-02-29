<section class="flex flex-col gap-y-2 drop-shadow-2xl items-center mt-[150px]">
  <h2 class="text-5xl md:text-8xl font-bold capitalize mb-8">NutriKa Go</h2>


  <form class="max-w-xs w-full sm:lg:max-w-sm md:lg:max-w-md lg:max-w-xl">

    <label for="picpik-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Recherche</label>
    <div id="picpik-box" class="relative">
      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
      </div>
      <input type="search" id="picpik-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Recherche, nom de produit, categories, marque" autocomplete="off" required />
      <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Chercher</button>
    </div>
  </form>

</section>
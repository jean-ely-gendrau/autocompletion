<?php

use App\Autocompletion\Components\Constant;
?>
<section class="flex flex-col gap-y-2 drop-shadow-2xl items-center mt-[150px] z-50">
  <h2 class="text-5xl md:text-8xl font-bold capitalize mb-8"><?= Constant::NAME_SITE; ?></h2>


  <form class="max-w-xs w-full sm:lg:max-w-sm md:lg:max-w-md lg:max-w-xl">

    <label for="picpik-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Recherche</label>
    <div id="picpik-box" class="relative z-1000">
      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-auto group">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
        </svg>
        <div class="text-xs md:text-sm lg:text-base group-hover:opacity-100 transition-opacity bg-gray-800 w-72 md:w-96 px-1 text-gray-100 rounded-md absolute translate-y-20 opacity-0 m-4 mx-auto">
          <p>Pour faire une recherche exemple:</p>
          <ul>
            <li>nom de produit</li>
            <li>:a:nom de produit (pour les produit nutriscore a)</li>
            <li>:brand:nom de marque</li>
          </ul>
        </div>
      </div>
      <input type="search" id="picpik-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nom du produit, :a:nom du produit :cat:categories, :brand:marque" autocomplete="off" required />
      <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Chercher</button>
    </div>
  </form>

</section>
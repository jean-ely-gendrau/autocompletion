<?php

use App\Autocompletion\Components\FoodsOpens;
use App\Autocompletion\Components\CrudManager;
use App\Autocompletion\Templates\NutrikaFoodLab;

$urlApiID = "https://{$_SERVER['HTTP_HOST']}/element.php/?id=";
$imgNutri = "https://{$_SERVER['HTTP_HOST']}/assets/images/";
$path = $_SERVER["HTTP_HOST"];
require_once(__DIR__ . DIRECTORY_SEPARATOR . "../vendor/autoload.php");
$id = $_GET['id'] ?? false;
$crudManager = new CrudManager('foodsopens', FoodsOpens::class);
$req = $id === "0" || $id ? $crudManager->getById($id) : false;
$jsonFood = $req ? json_decode($req->jsonFood, true) : json_encode([]);
//var_dump($jsonFood);
$nutikaTemplate = new NutrikaFoodLab($jsonFood);


/*
image_url
countries
stores
ingredients_text
ingredients_tags
food_groups_tags

allergens
additives

quantity
energy-kcal_100g
fat_100g
iron_100g
calcium_100g
vitamin-a_100g
vitamin-c_100g
potassium_100g
proteins_100g
carbohydrates_100g
fiber_100g
sugars_100g
sodium_100g
cholesterol_100g
trans-fat_100g
saturated-fat_100g
unsaturated-fat_100g
energy-kcal_100g
cholesterol_100g
capric-acid_100g
bicarbonate_100g
beta-glucan_100g
added-salt_100g

erucic-acid_100g

*/
$selectedParams = [
  'quantity',
  'additives',
  'allergens',
  'brands_tags',
  'food_groups',
  'labels_tags',
  'food_groups_en',
  'packaging_text',
  'categories_tags',
  'purchase_places',
  'nutriscore_grade',
];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nutrika Go - <?= $req ? $req->product_name : "Ooops le produit est introuvable."; ?></title>
  <link rel="stylesheet" href="https://<?= $path; ?>/assets/styles/theme.css">
</head>

<body class="text-sm md:text-base lg:text-lg text-white border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white -z-20">
  <main>
    <?php include_once(__DIR__ . DIRECTORY_SEPARATOR . "header.php"); ?>

    <section class="mx-auto flex flex-col max-w-2xl space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8 border-2 border-gray-300 rounded-lg dark:border-gray-600 -z-20 mt-12">
      <article>
        <h1 class="text-lg md:text-4xl lg:text-6xl mt-8"><?= $req ? $req->product_name : "Ooops le produit est introuvable."; ?></h1>

        <div>
          <div class="pt-6">
            <nav aria-label="Breadcrumb">
              <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <li>
                  <div class="flex items-center">
                    <a href="/" class="mr-2 text-sm md:text-base lg:text-lg font-medium text-white">Home</a>
                    <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                      <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                    </svg>
                  </div>
                </li>

                <li class="text-sm md:text-base lg:text-lg">
                  <a href="<?php $urlApiID . $id; ?>" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600"><?= $req->product_name; ?></a>
                </li>
              </ol>
            </nav>

            <!-- Image gallery -->
            <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8 -z-10">
              <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-lg lg:block -z-10">
                <img src="<?= $nutikaTemplate->image_url; ?>" alt="<?= $nutikaTemplate->product_name ?>" class="h-full w-full  object-center -z-10">
              </div>
              <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-lg lg:block -z-10">
                <img src="<?= $nutikaTemplate->image_nutrition_url; ?>" alt="<?= $nutikaTemplate->ingredients_text ?>" class="h-full w-full object-cover object-center -z-10">
              </div>
              <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8 -z-10">
                <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg -z-10">
                  <img src="<?= $nutikaTemplate->image_ingredients_url; ?>" alt="<?= $nutikaTemplate->brand; ?>" class="h-full w-full object-cover object-center -z-10">
                </div>
                <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg -z-10">
                  <img src="<?= $nutikaTemplate->image_small_url; ?>" alt="<?= $nutikaTemplate->generic_name; ?>" class="h-full w-full object-cover object-center -z-10">
                </div>
              </div>
            </div>
          </div>

          <!-- Product info -->
          <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
              <h2 class="text-2xl font-bold tracking-tight text-white sm:text-3xl"><?= $req->product_name; ?></h2>
            </div>
            <?php /*
      <!-- Options -->
      <div class="mt-4 lg:row-span-3 lg:mt-0">
        <h2 class="sr-only">Product information</h2>
        <p class="text-3xl tracking-tight text-white">$192</p>

        <!-- Reviews -->
        <div class="mt-6">
          <h3 class="sr-only">Reviews</h3>
          <div class="flex items-center">
            <div class="flex items-center">
              <!-- Active: "text-white", Default: "text-gray-200" -->
              <svg class="text-white h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>
              <svg class="text-white h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>
              <svg class="text-white h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>
              <svg class="text-white h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>
              <svg class="text-gray-200 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>
            </div>
            <p class="sr-only">4 out of 5 stars</p>
            <a href="#" class="ml-3 text-sm md:text-base lg:text-lg font-medium text-indigo-600 hover:text-indigo-500">117 reviews</a>
          </div>
        </div>

        <form class="mt-10">
          <!-- Colors -->
          <div>
            <h3 class="text-sm md:text-base lg:text-lg font-medium text-white">Color</h3>

            <fieldset class="mt-4">
              <legend class="sr-only">Choose a color</legend>
              <div class="flex items-center space-x-3">
                <!--
                  Active and Checked: "ring ring-offset-1"
                  Not Active and Checked: "ring-2"
                -->
                <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-400">
                  <input type="radio" name="color-choice" value="White" class="sr-only" aria-labelledby="color-choice-0-label">
                  <span id="color-choice-0-label" class="sr-only">White</span>
                  <span aria-hidden="true" class="h-8 w-8 bg-white rounded-full border border-black border-opacity-10"></span>
                </label>
                <!--
                  Active and Checked: "ring ring-offset-1"
                  Not Active and Checked: "ring-2"
                -->
                <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-400">
                  <input type="radio" name="color-choice" value="Gray" class="sr-only" aria-labelledby="color-choice-1-label">
                  <span id="color-choice-1-label" class="sr-only">Gray</span>
                  <span aria-hidden="true" class="h-8 w-8 bg-gray-200 rounded-full border border-black border-opacity-10"></span>
                </label>
                <!--
                  Active and Checked: "ring ring-offset-1"
                  Not Active and Checked: "ring-2"
                -->
                <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-900">
                  <input type="radio" name="color-choice" value="Black" class="sr-only" aria-labelledby="color-choice-2-label">
                  <span id="color-choice-2-label" class="sr-only">Black</span>
                  <span aria-hidden="true" class="h-8 w-8 bg-gray-900 rounded-full border border-black border-opacity-10"></span>
                </label>
              </div>
            </fieldset>
          </div>

          <!-- Sizes -->
          <div class="mt-10">
            <div class="flex items-center justify-between">
              <h3 class="text-sm md:text-base lg:text-lg font-medium text-white">Size</h3>
              <a href="#" class="text-sm md:text-base lg:text-lg font-medium text-indigo-600 hover:text-indigo-500">Size guide</a>
            </div>

            <fieldset class="mt-4">
              <legend class="sr-only">Choose a size</legend>
              <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                <!-- Active: "ring-2 ring-indigo-500" -->
                <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm md:text-base lg:text-lg font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-not-allowed bg-gray-50 text-gray-200">
                  <input type="radio" name="size-choice" value="XXS" disabled class="sr-only" aria-labelledby="size-choice-0-label">
                  <span id="size-choice-0-label">XXS</span>
                  <span aria-hidden="true" class="pointer-events-none absolute -inset-px rounded-md border-2 border-gray-200">
                    <svg class="absolute inset-0 h-full w-full stroke-2 text-gray-200" viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                      <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                    </svg>
                  </span>
                </label>
                <!-- Active: "ring-2 ring-indigo-500" -->
                <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm md:text-base lg:text-lg font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-white shadow-sm">
                  <input type="radio" name="size-choice" value="XS" class="sr-only" aria-labelledby="size-choice-1-label">
                  <span id="size-choice-1-label">XS</span>
                  <!--
                    Active: "border", Not Active: "border-2"
                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                  -->
                  <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                </label>
                <!-- Active: "ring-2 ring-indigo-500" -->
                <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm md:text-base lg:text-lg font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-white shadow-sm">
                  <input type="radio" name="size-choice" value="S" class="sr-only" aria-labelledby="size-choice-2-label">
                  <span id="size-choice-2-label">S</span>
                  <!--
                    Active: "border", Not Active: "border-2"
                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                  -->
                  <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                </label>
                <!-- Active: "ring-2 ring-indigo-500" -->
                <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm md:text-base lg:text-lg font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-white shadow-sm">
                  <input type="radio" name="size-choice" value="M" class="sr-only" aria-labelledby="size-choice-3-label">
                  <span id="size-choice-3-label">M</span>
                  <!--
                    Active: "border", Not Active: "border-2"
                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                  -->
                  <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                </label>
                <!-- Active: "ring-2 ring-indigo-500" -->
                <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm md:text-base lg:text-lg font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-white shadow-sm">
                  <input type="radio" name="size-choice" value="L" class="sr-only" aria-labelledby="size-choice-4-label">
                  <span id="size-choice-4-label">L</span>
                  <!--
                    Active: "border", Not Active: "border-2"
                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                  -->
                  <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                </label>
                <!-- Active: "ring-2 ring-indigo-500" -->
                <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm md:text-base lg:text-lg font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-white shadow-sm">
                  <input type="radio" name="size-choice" value="XL" class="sr-only" aria-labelledby="size-choice-5-label">
                  <span id="size-choice-5-label">XL</span>
                  <!--
                    Active: "border", Not Active: "border-2"
                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                  -->
                  <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                </label>
                <!-- Active: "ring-2 ring-indigo-500" -->
                <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm md:text-base lg:text-lg font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-white shadow-sm">
                  <input type="radio" name="size-choice" value="2XL" class="sr-only" aria-labelledby="size-choice-6-label">
                  <span id="size-choice-6-label">2XL</span>
                  <!--
                    Active: "border", Not Active: "border-2"
                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                  -->
                  <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                </label>
                <!-- Active: "ring-2 ring-indigo-500" -->
                <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm md:text-base lg:text-lg font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-white shadow-sm">
                  <input type="radio" name="size-choice" value="3XL" class="sr-only" aria-labelledby="size-choice-7-label">
                  <span id="size-choice-7-label">3XL</span>
                  <!--
                    Active: "border", Not Active: "border-2"
                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                  -->
                  <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                </label>
              </div>
            </fieldset>
          </div>

          <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base md:text-lg lg:text-xl font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add to bag</button>
        </form>
      </div>
      */
            ?>
            <div class="mx-auto mt-4 lg:row-span-3 lg:mt-0">
              <h2 class="sr-only">information produit</h2>
              <p class="text-3xl tracking-tight text-white"><?= $nutikaTemplate->generic_name; ?></p>
              <p class="text-1xl tracking-tight text-white"><?= $nutikaTemplate->countries; ?></p>

              <!-- Reviews -->
              <div class="mt-6">
                <h3 class="sr-only">Valeur Nutition</h3>
                <div class="flex items-center">
                  <div class="flex items-center">
                    <?= $nutikaTemplate->render(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
              <!-- Description and details -->
              <div>
                <h3 class="sr-only">Ingedients</h3>

                <div class="space-y-6">
                  <p class="text-base md:text-lg lg:text-xl text-white"><?= $nutikaTemplate->ingredients_text; ?></p>
                </div>

                <h3 class="sr-only">Packaging</h3>

                <div class="space-y-6">
                  <p class="text-base md:text-lg lg:text-xl text-white"><?= $nutikaTemplate->packaging; ?></p>
                </div>

              </div>

              <div class="mt-10">
                <h3 class="text-sm md:text-base lg:text-lg font-medium text-white">Highlights</h3>

                <div class="mt-4">
                  <ul role="list" class="list-disc space-y-2 pl-4 text-sm md:text-base lg:text-lg">

                    <?php foreach ($selectedParams as $values) :
                      $li = $nutikaTemplate->$values !== "" ?  '<li class="text-gray-200">(' . $values . ') :<span class="text-gray-400">' . $nutikaTemplate->$values . '</span></li>' : "";
                      echo $li;
                    endforeach;
                    ?>
                  </ul>
                </div>
              </div>

              <img class="drop-shadow-2xl mx-auto my-8" src="<?= $imgNutri . "nutri-score-{$nutikaTemplate->nutriscore_grade}.svg"; ?>" alt="nutriscore <?= $nutikaTemplate->nutriscore_grade; ?>" />

              <div class="mt-10">
                <h2 class="text-sm md:text-base lg:text-lg font-medium text-white">Details</h2>

                <div class="mt-4 space-y-6">
                  <p class="text-sm md:text-base lg:text-lg text-gray-300"><?= $nutikaTemplate->states_en; ?></p>
                  <p class="text-sm md:text-base lg:text-lg text-gray-400"><?= $nutikaTemplate->labels_en; ?></p>
                </div>
              </div>

            </div>
          </div>
        </div>
        </div>
        <?php
        /*
          foreach ($req as $key => $element) :
            echo "<pre>",
            var_dump($element, $key), "<pre>";
            if ($key === "jsonFood") :
              foreach (json_decode($element) as $key => $val) {
                echo $key . '  ->  ' . $val . "</br>";
              }
            endif;
          endforeach;
*/
        ?>
      </article>
    </section>
  </main>

  <!-- ADD SCRIPT -->
  <script src="../script.js"></script>
</body>

</html>
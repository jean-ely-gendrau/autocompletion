<?php

namespace App\Autocompletion\Templates;

use App\Autocompletion\Components\Constant;

class NutrikaFoodLab
{
    /*
    public $image_url;
    public $countries;
    public $stores;
    public $ingredients_text;
    public $ingredients_tags;
    public $food_groups_tags;
    public $allergens;
    public $additives;
    public $quantity;
    public $fat_100g;
    public $iron_100g;
    public $calcium_100g;
    public $vitamin_a_100g;
    public $vitamin_c_100g;
    public $vitamin_d_100g;
    public $potassium_100g;
    public $proteins_100g;
    public $carbohydrates_100g;
    public $fiber_100g;
    public $sugars_100g;
    public $sodium_100g;
    public $trans_fat_100g;
    public $saturated_fat_100g;
    public $unsaturated_fat_100g;
    public $energy_kcal_100g;
    public $cholesterol_100g;
    public $capric_acid_100g;
    public $bicarbonate_100g;
    public $beta_glucan_100g;
    public $added_salt_100g;
    public $added_sugar_100g;
    public $erucic_acid_100g;
*/

    public $url;
    public $code;
    public $owner;
    public $brands;
    public $cities;
    public $labels;
    public $states;
    public $stores;
    public $traces;
    public $creator;
    public $origins;
    public $ph_100g;
    public $fat_100g;
    public $quantity;
    public $additives;
    public $allergens;
    public $countries;
    public $created_t;
    public $emb_codes;
    public $image_url;
    public $iron_100g;
    public $labels_en;
    public $packaging;
    public $salt_100g;
    public $states_en;
    public $traces_en;
    public $zinc_100g;
    public $categories;
    public $cocoa_100g;
    public $fiber_100g;
    public $nova_group;
    public $origins_en;
    public $additives_n;
    public $biotin_100g;
    public $brand_owner;
    public $brands_tags;
    public $casein_100g;
    public $cities_tags;
    public $copper_100g;
    public $energy_100g;
    public $food_groups;
    public $iodine_100g;
    public $labels_tags;
    public $silica_100g;
    public $sodium_100g;
    public $starch_100g;
    public $states_tags;
    public $sugars_100g;
    public $traces_tags;
    public $acidity_100g;
    public $additives_en;
    public $alcohol_100g;
    public $allergens_en;
    public $calcium_100g;
    public $choline_100g;
    public $completeness;
    public $countries_en;
    public $folates_100g;
    public $generic_name;
    public $glucose_100g;
    public $lactose_100g;
    public $last_image_t;
    public $maltose_100g;
    public $nitrate_100g;
    public $origins_tags;
    public $packaging_en;
    public $polyols_100g;
    public $product_name;
    public $serving_size;
    public $sucrose_100g;
    public $taurine_100g;
    public $caffeine_100g;
    public $categories_en;
    public $chloride_100g;
    public $chromium_100g;
    public $fluoride_100g;
    public $fructose_100g;
    public $inositol_100g;
    public $main_category;
    public $pnns_groups_1;
    public $pnns_groups_2;
    public $proteins_100g;
    public $selenium_100g;
    public $sulphate_100g;
    public $additives_tags;
    public $carnitine_100g;
    public $countries_tags;
    public $ecoscore_grade;
    public $ecoscore_score;
    public $emb_codes_tags;
    public $energy_kj_100g;
    public $food_groups_en;
    public $last_updated_t;
    public $magnesium_100g;
    public $manganese_100g;
    public $mead_acid_100g;
    public $packaging_tags;
    public $packaging_text;
    public $potassium_100g;
    public $trans_fat_100g;
    public $unique_scans_n;
    public $vitamin_a_100g;
    public $vitamin_c_100g;
    public $vitamin_d_100g;
    public $vitamin_e_100g;
    public $vitamin_k_100g;
    public $added_salt_100g;
    public $categories_tags;
    public $chlorophyl_100g;
    public $erythritol_100g;
    public $image_small_url;
    public $last_modified_t;
    public $molybdenum_100g;
    public $oleic_acid_100g;
    public $phosphorus_100g;
    public $popularity_tags;
    public $purchase_places;
    public $vitamin_b1_100g;
    public $vitamin_b2_100g;
    public $vitamin_b6_100g;
    public $vitamin_b9_100g;
    public $vitamin_pp_100g;
    public $beta_glucan_100g;
    public $bicarbonate_100g;
    public $capric_acid_100g;
    public $cholesterol_100g;
    public $created_datetime;
    public $energy_kcal_100g;
    public $erucic_acid_100g;
    public $food_groups_tags;
    public $ingredients_tags;
    public $ingredients_text;
    public $last_modified_by;
    public $lauric_acid_100g;
    public $main_category_en;
    public $nucleotides_100g;
    public $nutriscore_grade;
    public $nutriscore_score;
    public $omega_3_fat_100g;
    public $omega_6_fat_100g;
    public $omega_9_fat_100g;
    public $product_quantity;
    public $serving_quantity;
    public $vitamin_b12_100g;
    public $added_sugars_100g;
    public $behenic_acid_100g;
    public $butyric_acid_100g;
    public $caproic_acid_100g;
    public $cerotic_acid_100g;
    public $elaidic_acid_100g;
    public $gondoic_acid_100g;
    public $no_nutrition_data;
    public $stearic_acid_100g;
    public $beta_carotene_100g;
    public $caprylic_acid_100g;
    public $carbohydrates_100g;
    public $linoleic_acid_100g;
    public $maltodextrins_100g;
    public $melissic_acid_100g;
    public $montanic_acid_100g;
    public $myristic_acid_100g;
    public $nervonic_acid_100g;
    public $palmitic_acid_100g;
    public $phylloquinone_100g;
    public $saturated_fat_100g;
    public $soluble_fiber_100g;
    public $arachidic_acid_100g;
    public $glycemic_index_100g;
    public $image_nutrition_url;
    public $last_image_datetime;
    public $serum_proteins_100g;
    public $water_hardness_100g;
    public $energy_from_fat_100g;
    public $insoluble_fiber_100g;
    public $lignoceric_acid_100g;
    public $manufacturing_places;
    public $nutrient_levels_tags;
    public $unsaturated_fat_100g;
    public $arachidonic_acid_100g;
    public $carbon_footprint_100g;
    public $image_ingredients_url;
    public $last_updated_datetime;
    public $pantothenic_acid_100g;
    public $last_modified_datetime;
    public $nutrition_score_fr_100g;
    public $nutrition_score_uk_100g;
    public $abbreviated_product_name;
    public $data_quality_errors_tags;
    public $first_packaging_code_geo;
    public $monounsaturated_fat_100g;
    public $polyunsaturated_fat_100g;
    public $alpha_linolenic_acid_100g;
    public $docosahexaenoic_acid_100g;
    public $gamma_linolenic_acid_100g;
    public $image_nutrition_small_url;
    public $ingredients_analysis_tags;
    public $manufacturing_places_tags;
    public $eicosapentaenoic_acid_100g;
    public $fruits_vegetables_nuts_100g;
    public $image_ingredients_small_url;
    public $collagen_meat_protein_ratio_100g;
    public $dihomo_gamma_linolenic_acid_100g;
    public $fruits_vegetables_nuts_dried_100g;
    public $fruits_vegetables_nuts_estimate_100g;
    public $carbon_footprint_from_meat_or_fish_100g;
    public $fruits_vegetables_nuts_estimate_from_ingredients_100g;

    public function __construct($data)
    {
        if (is_array($data)) :
            foreach ($data as $key => $val) :
                $bindKey = str_replace('-', '_', $key);
                if (property_exists($this, $bindKey)) :
                    $this->$bindKey = $val;
                endif;
            endforeach;
        endif;
    }

    public function __get(string $name)
    {
        if (property_exists($this, $name)) :
            return $this->$name;
        endif;
    }

    public function render()
    {
        return "<div class=\"p-1 border-2 border-black font-sans w-80 drop-shadow-2xl rounded-lg p-2\">
              <div class=\"text-4xl font-extrabold leading-none\">Apports nutritionnels</div>
              <div class=\"leading-snug\">" . Constant::NAME_SITE . "</div>
              <div class=\"flex justify-between font-bold border-b-8 border-black\">
                  <div>Pour</div><div>(100g)</div>
              </div>
              <div class=\"flex justify-between items-end font-extrabold\">
                  <div>
                      <div class=\"font-bold\">Quantité par portion</div>
                      <div class=\"text-4xl\">Calories</div>
                  </div>
                  <div class=\"text-5xl\">{$this->energy_kcal_100g}</div>
              </div>
              <div class=\"border-t-4 border-black text-sm pb-1\">
                  <div class=\"text-right font-bold pt-1 pb-1\">% Valeur quotidienne*</div>
                  <hr class=\"border-gray-500\"/>
                  <div class=\"flex justify-between\">
                      <div>
                          <span class=\"font-bold\">Matières grasses totales</span> {$this->fat_100g}
                      </div>
                      <div class=\"font-bold\">{calculePourcent VQ}</div>
                  </div>
                  <hr class=\"border-gray-500\"/>
                  <div class=\"flex justify-between\">
                      <div>Gras saturés {$this->saturated_fat_100g}</div>
                      <div class=\"font-bold\">{calculePourcent VQ}</div>
                  </div>
                  <hr class=\"border-gray-500\"/>
                  <div>
                      <span class=\"italic\">Gras trans</span> {$this->trans_fat_100g}
                  </div>
                  <hr class=\"border-gray-500\"/>
                  <div class=\"flex justify-between\">
                      <div>
                          <span class=\"font-bold\">Cholestérol</span> {$this->cholesterol_100g}
                      </div>
                      <div class=\"font-bold\">{calculePourcent VQ}</div>
                  </div>
                  <hr class=\"border-gray-500\"/>
                  <div class=\"flex justify-between\">
                      <div>
                          <span class=\"font-bold\">Sodium</span> {$this->sodium_100g}
                      </div>
                      <div class=\"font-bold\">{calculePourcent VQ}</div>
                  </div>
                  <hr class=\"border-gray-500\"/>
                  <div class=\"flex justify-between\">
                      <div>
                          <span class=\"font-bold\">Glucides totaux</span> {$this->carbohydrates_100g}
                      </div>
                      <div class=\"font-bold\">{calculePourcent VQ}</div>
                  </div>
                  <hr class=\"border-gray-500\"/>
                  <div class=\"flex justify-between\">
                      <div class=\"pl-4\">
                      Fibres alimentaires {$this->fiber_100g}
                      </div>
                      <div class=\"font-bold\">{calculePourcent VQ}</div>
                  </div>
                  <hr class=\"border-gray-500\"/>
                  <div class=\"pl-4\">
                        Sucre total {$this->sugars_100g}
                      <div class=\"pl-4\">
                          <hr class=\"border-gray-500\"/>
                          <div class=\"flex justify-between\">
                              <div>Comprend {$this->added_sugar_100g} de sucres ajoutés</div>
                              <div class=\"font-bold\">{calculePourcent VQ}</div>
                          </div>
                      </div>
                  </div>
                  <hr class=\"border-gray-500\"/>
                  <div>
                      <span class=\"font-bold\">Protéine </span> {$this->proteins_100g}
                  </div>
              </div>
              <div class=\"border-t-8 border-black pt-1 text-sm\">
                      <div class=\"flex justify-between\">
                      <div>Vitamine C {$this->vitamin_c_100g}</div>
                      <div>{calculePourcent VQ}</div>
                  </div>
                  <hr class=\"border-gray-500\"/>
                  <div class=\"flex justify-between\">
                      <div>Vitamine D {$this->vitamin_d_100g}</div>
                      <div>{calculePourcent VQ}</div>
                  </div>
                  <hr class=\"border-gray-500\"/>
                  <div class=\"flex justify-between\">
                      <div>Calcium {$this->calcium_100g}</div>
                      <div>{calculePourcent VQ}</div>
                  </div>
                  <hr class=\"border-gray-500\"/>
                  <div class=\"flex justify-between\">
                      <div>Fer {$this->iron_100g}</div>
                      <div>{calculePourcent VQ}</div>
                  </div>
                  <hr class=\"border-gray-500\"/>
                  <div class=\"flex justify-between\">
                      <div>Potassium {$this->potassium_100g}</div>
                      <div>{calculePourcent VQ}</div>
                  </div>
                  <div class=\"border-t-4 border-black flex leading-none text-xs pt-2 pb-1\">
                      <div class=\"pr-1\">*</div>
                      <div>
                      Le % de valeur quotidienne (VQ) vous indique dans quelle mesure un nutriment contenu dans une portion de nourriture contribue à une alimentation quotidienne. 2 000 calories par jour sont utilisées pour des conseils nutritionnels généraux.</div>
                  </div>
              </div>
          </div>";
    }
}

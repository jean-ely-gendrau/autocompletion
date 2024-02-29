<?php

namespace App\Autocompletion\Templates;

use App\Autocompletion\Components\Constant;

class NutrikaFoodLab
{

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

    public function __construct($data)
    {
        foreach ($data as $key => $val) :
            $bindKey = str_replace('-', '_', $key);
            if (property_exists($this, $bindKey)) :
                $this->$bindKey = $val;
            endif;
        endforeach;
    }

    public function __get(string $name)
    {
        return $this->$name;
    }

    public function render()
    {


        return "<div class=\"p-1 border-2 border-black font-sans w-72\">
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

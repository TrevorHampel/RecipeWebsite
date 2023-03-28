<?php

include_once "DatabaseObjects/M_recipe.php";
include_once "DatabaseObjects/M_recipe_ingredient_link.php";
include_once "DatabaseObjects/M_ingredient.php";
include_once "DatabaseObjects/M_measurement_unit.php";
include_once "DatabaseObjects/M_measurement.php";
include_once "DatabaseObjects/M_recipe_tag.php";
include_once "Database.php";
include("includes/include.php"); 
//use DatabaseObjects\M_user;
ini_set('max_execution_time', '600');
    $count = 0;
    $letters = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
    foreach($letters as $letter)
    {
        $recipesArray = getRecipeFromLetter($letter); // a random recipe as of 2022.10.22 - 6:04pm ref the include file;
        if(is_array($recipesArray))
        {
            foreach($recipesArray as $row)
            {
                $count++;
                ob_start();
                var_dump($row["idMeal"]);
                var_dump($count); // output txt here
                error_log(ob_get_clean()."\n",3,'C:\temp\htdocs\RecipeApp\RecipeWebsite\output.txt'); // your path to the output file should go here
                
                $imgThumb = $row['strMealThumb'];
                $meal = $row['strMeal'];
                $category = $row['strCategory'];
                $area = $row['strArea'];
                $instructions = $row['strInstructions'];
                //$UserID = $_SESSION['UserID'];
                $ingredients = [];
                $video = $row['strYoutube'];
                $source = $row['strSource'];


                for ($i = 1; $i < 21; $i++) {
                    $strIng = 'strIngredient' . $i;
                    $strMeas = 'strMeasure' . $i;

                    if ($row[$strIng] == "" && $row[$strMeas] == "") {
                        break;
                    }
                    $ingredients += [$row[$strIng] => $row[$strMeas]];
                }

                $userObj = new M_recipe();
                $userObj->recipe_name = $meal;
                $userObj->image = $imgThumb;
                $userObj->source_url  = $source;
                $userObj->youtube_url = $video;
                $date = new \DateTime('now');
                $userObj->date_created  = $date->format('Y/m/d H:i:s');
                $userObj->recipe_instructions  = $instructions;
                $userObj->recipe_type = $category;
                $userObj->recipe_area = $area;
                $userObj->insert_obj();

                $i = 0;
                $Database = new Database();
                foreach($ingredients as $dow)
                {

                    $i++;
                    $M_ingredient = new M_ingredient();
                    $M_ingredient->ingredient_value = $row["strIngredient$i"];
                    $M_ingredient->insert_obj();

                    $measurement = preg_replace('/[0-9]+/', '', $row["strMeasure$i"]);
                    $M_measurement_unit = new M_measurement_unit();
                    $M_measurement_unit->measurement_unit_value = $measurement;
                    $M_measurement_unit->insert_obj();

                    $measurement_value = preg_replace('/[^0-9]/', '', $row["strMeasure$i"]);

                    $sql = "INSERT INTO measurement (measurement_value, measurement_unit_id)
                            VALUES ('" . $measurement_value . "', " . $M_measurement_unit->measurement_unit_id .")";

                    $insertID = $Database->insert($sql);

                    $sql = "INSERT INTO recipe_ingredient_link (recipe_id, ingredient_id, measurement_id)
                    VALUES (" . $userObj->recipe_id  . ", " . $M_ingredient->ingredient_id .", " . $insertID.")";

                    $insertID = $Database->insert($sql);
                }

                $explode = explode(',',$row['strTags']);
                foreach ($explode as $low)
                {
                    $M_recipe_tag = new M_recipe_tag();
                    $M_recipe_tag->recipe_tag_value = $low;
                    $M_recipe_tag->insert_obj();

                    $sql = "INSERT INTO recipe_tag_link (recipe_id, recipe_tag_id)
                    VALUES (" . $userObj->recipe_id  . ", " . $M_recipe_tag->recipe_tag_id .")";

                    $insertID = $Database->insert($sql);
                }
        }       
    }

}
echo "finished";

// ob_start();
// var_dump($userObj); // output txt here
// error_log(ob_get_clean()."\n",3,'C:/xampp/htdocs/RecipeWebsite/output.txt');



/*

                $imgThumb = $recipesArray[0]['strMealThumb'];
                $id = $recipesArray[0]['idMeal'];
                $meal = $recipesArray[0]['strMeal'];
                $category = $recipesArray[0]['strCategory'];
                $area = $recipesArray[0]['strArea'];
                $instructions = $recipesArray[0]['strInstructions'];
                //$UserID = $_SESSION['UserID'];
                $ingredients = [];
                $video = $recipesArray[0]['strYoutube'];
                $source = $recipesArray[0]['strSource'];

                foreach ($recipesArray as $r) {

                    for ($i = 1; $i < 21; $i++) {
                        $strIng = 'strIngredient' . $i;
                        $strMeas = 'strMeasure' . $i;

                        if ($r[$strIng] == "") {
                            break;
                        }
                        $ingredients += [$r[$strIng] => $r[$strMeas]];
                    }
                }

                $userObj = new M_recipe();
                $userObj->recipe_id = $id;
                $userObj->recipe_name = $meal;
                $userObj->image = $imgThumb;
                $userObj->source_url  = $source;
                $userObj->youtube_url = $video;
                $date = new \DateTime('now');
                $userObj->date_created  = $date->format('Y/m/d H:i:s');
                $userObj->recipe_instructions  = $instructions;
                $userObj->recipe_type = $category;
                $userObj->recipe_area = $area;
                $userObj->insert_obj();

                foreach ($recipesArray as $r) {

                    for ($i = 1; $i < 21; $i++) {
                        $strIng = 'strIngredient' . $i;
                        $strMeas = 'strMeasure' . $i;

                        if ($r[$strIng] == "") {
                            break;
                        }
                        $ingredients += [$r[$strIng] => $r[$strMeas]];
                    }
                }

                $i = 0;
                $Database = new Database();
                foreach($ingredients as $row)
                {
                    $i++;
                    $ingredients = new M_ingredient();
                    $ingredients->ingredient_value = $recipesArray[0]["strIngredient$i"];
                    $ingredients->insert_obj();

                    $measurement = preg_replace('/[0-9]+/', '', $recipesArray[0]["strMeasure$i"]);
                    $M_measurement_unit = new M_measurement_unit();
                    $M_measurement_unit->measurement_unit_value = $measurement;
                    $M_measurement_unit->insert_obj();

                    $measurement_value = preg_replace('/[^0-9]/', '', $recipesArray[0]["strMeasure$i"]);

                    $sql = "INSERT INTO measurement (measurement_value, measurement_unit_id)
                            VALUES ('" . $measurement_value . "', " . $M_measurement_unit->measurement_unit_id .")";

                    $insertID = $Database->insert($sql);

                    $sql = "INSERT INTO recipe_ingredient_link (recipe_id, ingredient_id, measurement_id)
                    VALUES (" . $userObj->recipe_id  . ", " . $ingredients->ingredient_id .", " . $insertID.")";

                    $insertID = $Database->insert($sql);
                }

                $explode = explode(',',$recipesArray[0]['strTags']);
                foreach ($explode as $row)
                {
                    $M_recipe_tag = new M_recipe_tag();
                    $M_recipe_tag->recipe_tag_value = $row;
                    $M_recipe_tag->insert_obj();

                    $sql = "INSERT INTO recipe_tag_link (recipe_id, recipe_tag_id)
                    VALUES (" . $userObj->recipe_id  . ", " . $M_recipe_tag->recipe_tag_id .")";

                    $insertID = $Database->insert($sql);
                }
                */
<?php

include_once "Database.php";
include_once "Session.php";
include_once "T_UserRecipe.php";
include_once "DatabaseObjects/M_recipe.php";
$Database = new Database();

class T_RecipeHelper {

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function printRecipeCard($recipeNumber, $btnCounter){
        $txt = '<hr class="row bar">';
        $recipesArray = new Recipe();

        $recipesArray = getRecipe($recipeNumber); // getRecipe returns a recipe ||| $Recipe = new Recipe(); get recipe is returning an array

        foreach ($recipesArray as $r) {
            // PORTION THAT CONSIST OF THE OUTER SEGMENT OF THE CARDS //
            
            // ECHO NAME OF RECIPE //
            $txt .= ' 
            <div class="row noedge">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    
                    <h2 class="centerText recipe-title" id="btn'.$btnCounter.'" style="display:block;" onclick="showhidecards(this.id)">'.$r->getName().'
                    <img src="'.$r->getThumbnail().'" style="border-radius:15%; display:inline-block; width: 100px; height: 100px;">
                </div>
                <div class="col-md-1">
                    <button onclick="removeFromFavorites(' . $recipeNumber. ' ,' . $_SESSION["UserID"]. ')" class="favoritesButton">Remove</button>
                </div>
            </div> 
            ';

            // ECHO THE IMAGE //
            $txt .= '
            <div id="card'.$btnCounter.'" hidden>
            <div class="row noedge">
            <div class="col">
            <img src="'.$r->getThumbnail().'">
            </div>
            ';

            $ingredients = $r->getIngredients();
            
            // <<< INGREDIENTS PRINTING SEGEMENT >>> //
            // ECHO LIST OF INGREDIENTS //

            $txt .= '
            <div class="col">
            <h3>INGREDIENTS:</h2>
            ';

            foreach($ingredients as $k => $v)  {
                $txt .= '<div class="row checkbox">';
                $txt .= '<div class="col-1">';
                $txt .= '
                    <input type="checkbox" 
                        name="'.$k.'" 
                        value="'.$v.'">
                            
                ';
                $txt .= '</div>';
                $txt .= '<div class="col-11">';
                    $txt .= 
                            "<p>" .
                                $k . " : " .
                                $v .
                            "</p>";
                    $txt .= '</div>';
                $txt .= '</div>';
            }


            $txt .='
            </div>
            <!-- end ingredients segment  -->
            </div>
            ';

            $txt .= '
            <!-- instructions segment start  -->
            <div id="card'.$btnCounter.'">
                <h2>INSTRUCTIONS:</h2>
                <p>'.$r->getInstructions().'</p>
            </div>
            <!-- end instructions segment  -->
            </div> <!-- END - showclose div attached to the above -- no row edge -->   
            <br>
            ';

        }   
        return $txt;

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    static function printRecipeCardDatabaseObject($recipeNumber, $btnCounter){
        $txt = '<hr class="row bar">';
        $M_Recipe = new M_Recipe(intval($recipeNumber));

        // PORTION THAT CONSIST OF THE OUTER SEGMENT OF THE CARDS //
        
        // ECHO NAME OF RECIPE //
        $txt .= ' 
        <div class="row noedge">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                
                <h2 class="centerText recipe-title" id="btn'.$btnCounter.'" style="display:block;" onclick="showhidecards(this.id)">'.$M_Recipe->recipe_name.'
                <img src="'.$M_Recipe->image.'" style="border-radius:15%; display:inline-block; width: 100px; height: 100px;">
            </div>
            <div class="col-md-1">
                <button onclick="removeFromFavorites(' . $recipeNumber. ' ,' . $_SESSION["UserID"]. ')" class="favoritesButton">Remove</button>
            </div>
        </div> 
        ';

        // ECHO THE IMAGE //
        $txt .= '
        <div id="card'.$btnCounter.'" hidden>
        <div class="row noedge">
        <div class="col">
        <img src="'.$M_Recipe->image.'">
        </div>
        ';
        
        // <<< INGREDIENTS PRINTING SEGEMENT >>> //
        // ECHO LIST OF INGREDIENTS //

        $txt .= '
        <div class="col">
        <h3>INGREDIENTS:</h2>
        ';

        foreach($M_Recipe->recipe_ingredient_link as $row)
{
            $txt .= '<div class="row checkbox">';
            $txt .= '<div class="col-1">';
            $txt .= '
                <input type="checkbox" 
                    name="'.$row->ingredient_id->ingredient_value.'" 
                    value="'.$row->measurement_id->measurement_value. " " . $row->measurement_id->measurement_unit_id->measurement_unit_value .'">
                        
            ';
            $txt .= '</div>';
            $txt .= '<div class="col-11">';
                $txt .= 
                        "<p>" .
                        $row->ingredient_id->ingredient_value . " : " 
                        .$row->measurement_id->measurement_value. " " . $row->measurement_id->measurement_unit_id->measurement_unit_value .
                        "</p>";
                $txt .= '</div>';
            $txt .= '</div>';
        }


        $txt .='
        </div>
        <!-- end ingredients segment  -->
        </div>
        ';

        $txt .= '
        <!-- instructions segment start  -->
        <div id="card'.$btnCounter.'">
            <h2>INSTRUCTIONS:</h2>
            <p>'.$M_Recipe->recipe_instructions.'</p>
        </div>
        <!-- end instructions segment  -->
        </div> <!-- END - showclose div attached to the above -- no row edge -->   
        <br>
        ';

        return $txt;

    }
}

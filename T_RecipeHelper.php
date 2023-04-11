<?php

include_once "Database.php";
include_once "Session.php";
include_once "T_UserRecipe.php";
include_once "DatabaseObjects/M_recipe.php";
$Database = new Database();

class T_RecipeHelper {

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        function printRecipeCard($recipeNumber, $btnCounter, $favOrNot){
        $recipesArray = getRecipe($recipeNumber); // getRecipe returns a recipe ||| $Recipe = new Recipe(); get recipe is returning an array
        $txt = "";
        
        $recipesArray = getRecipe($recipeNumber); // getRecipe returns a recipe ||| $Recipe = new Recipe(); get recipe is returning an array
        if(isset($recipesArray) && !empty($recipesArray))
        {
            foreach ($recipesArray as $r) {
                // PORTION THAT CONSIST OF THE OUTER SEGMENT OF THE CARDS //
                
                $txt .= '        <h2 class="centerText recipe-title" id="btn'.$btnCounter.'" style="display:block;" onclick="showhidecards(this.id)">'.$r->getName().'
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

                ';
                if ($favOrNot == true) {
                    $txt .= '
                        <button onclick="removeFromFavorites(' . $recipeNumber. ' ,' . $_SESSION["UserID"]. ')" class="favoritesButton">Remove</button>
                    ';
                }
                else {
                    $txt .= '
                        <a><button type="button" class="btn btn-primary btn-md m-3" onclick="addToFavoritesList(' . $recipeNumber . ', $UserId)">Add to Favorites</button></a>
                    ';
                }
                $txt .= '

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
            }
            return $txt;

        }

        return $txt;

    }
}

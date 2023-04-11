<?php
//include("includes/include.php");
include_once "DatabaseObjects/M_recipe.php";
include_once "DatabaseObjects/M_recipe_ingredient_link.php";
include_once "DatabaseObjects/M_ingredient.php";
include_once "DatabaseObjects/M_measurement_unit.php";
include_once "DatabaseObjects/M_measurement.php";
include_once "DatabaseObjects/M_recipe_tag.php";
include_once "Database.php";
include_once "Session.php";
// redirect the user to the login page if there user id is not in session
if(!isset($_SESSION["UserID"])){
    header("Location: Login.php");
}

$databaseObj = new Database();
$sql = "SELECT * FROM recipe_types";
$typeList = $databaseObj->selectAssc($sql);
$ingCount = 1;
$name = $image = $source = $youtube = $instructions = $type = $area = $strI = $strM = "";

function validateInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = validateInput($_POST["recipe-name"]);
    $image = validateInput($_POST["recipe-image"]);
    $source = validateInput($_POST["recipe-source"]);
    $youtube = validateInput($_POST["recipe-video"]);
    $instructions = validateInput($_POST["textarea"]);
    $type = validateInput($_POST["recipe-type"]);
    $area = validateInput($_POST["recipe-area"]);
    $Database = new Database();
    $ingredientList = [];

    $recipeObj = new M_recipe();
    $recipeObj->recipe_name = $name;
    $recipeObj->image = $image;
    $recipeObj->source_url = $source;
    $recipeObj->youtube_url = $youtube;
    $date = new \DateTime('now');
    $recipeObj->date_created = $date->format('Y/m/d H:i:s');
    $recipeObj->recipe_instructions = $instructions;
    $recipeObj->recipe_area = $area;
    $recipeObj->recipe_type = $type;
    $recipeObj->user_id = $_SESSION["UserID"];
    $recipeObj->insert_obj();
    

    for ($i = 1; $i < 21; $i++) {
        $strM = "measure-" . $i;
        $strI = "ingredient-" . $i;
        if ($_POST[$strI] == "") {
            break;
        }
        $ingredientList += [$_POST[$strI] => $_POST[$strM]];
    }

    $int = 0;
    foreach ($ingredientList as $ing) {
        $int++;
        $ingredient = new M_ingredient();
        $ingredient->ingredient_value = $_POST["ingredient-$int"];
        $ingredient->insert_obj();


        $measurement = preg_replace('/[0-9]+/', '', $_POST["measure-$int"]);
        $M_measurement_unit = new M_measurement_unit();
        $M_measurement_unit->measurement_unit_value = $measurement;
        $M_measurement_unit->insert_obj();

        $measurement_value = preg_replace('/[^0-9]/', '', $_POST["measure-$int"]);

        $sql = "INSERT INTO measurement (measurement_value, measurement_unit_id)
            VALUES ('" . $measurement_value . "', " . $M_measurement_unit->measurement_unit_id . ")";

        $insertID = $Database->insert($sql);

        $sql = "INSERT INTO recipe_ingredient_link (recipe_id, ingredient_id, measurement_id)
                    VALUES (" . $recipeObj->recipe_id  . ", " . $ingredient->ingredient_id . ", " . $insertID . ")";

        $insertID = $Database->insert($sql);
    }

    echo "<script>
            alert('Your Recipe, $recipeObj->recipe_name has been successfully added!');</script>";
}


?>

<!doctype html>
<html lang="en">

<head>
    <title>Add a New Recipe</title>
    <link rel='stylesheet' type="text/css" href="stylesheets/application.css">
    <script src="javascripts/addrecipe.js"></script>
</head>

<body>
    <?php include_once("includes/nav.php"); ?>
    <form method="post">
        <div class='container border rounded'>
            <div class='row'>
                <div class="col-12 pt-3">
                    <h2 class="text-dark">Add a New Recipe</h2>
                    <input hidden name="recipe-id" value="<?php echo ($id != null) ? $id : null ?>" />
                </div>
                <div class="col-8 pt-3">
                    <!-- Recipe Name -->
                    <div class="row form-group p-3">
                        <div class="col-3">
                            <label for="recipe-name">Recipe Name</label>
                        </div>
                        <div class="col-7">
                            <input type="text" name="recipe-name" class="form-control" id="recipe-name" placeholder="Enter a Recipe Name" required />
                        </div>
                    </div>
                    <!-- Recipe Type -->
                    <div class="row form-group p-3">
                        <div class="col-3">
                            <label for="recipe-type">Recipe Type</label>
                        </div>
                        <div class="col-7">
                            <select multiple type="text" name="recipe-type" class="form-control" id="recipe-type" required>
                                <?php
                                foreach ($typeList as $type) {
                                    echo "<option value='" . $type["recipe_type"] . "'>" . $type["recipe_type"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- Recipe Area -->
                    <div class="row form-group p-3">
                        <div class="col-3">
                            <label for="recipe-area">Recipe Area</label>
                        </div>
                        <div class="col-7">
                            <select multiple type="text" name="recipe-area" class="form-control" id="recipe-area" required>
                                <option>Middle Eastern</option>
                                <option>Mediterranean</option>
                                <option>African</option>
                                <option>Asian</option>
                            </select>
                        </div>
                    </div>
                    <!-- Recipe Image -->
                    <div class="row form-group p-3">
                        <div class="col-3">
                            <label for="recipe-image">Recipe Image</label>
                        </div>
                        <div class="col-7">
                            <input type="file" class="form-control-file" name="recipe-image" id="recipe-image" required>
                        </div>
                    </div>
                    <!-- Recipe Source -->
                    <div class="row form-group p-3">
                        <div class="col-3">
                            <label for="recipe-source">Recipe Website/Source</label>
                        </div>
                        <div class="col-7">
                            <input type="text" class="form-control" id="recipe-source" name="recipe-source" placeholder="Recipe Website">
                        </div>
                    </div>
                    <!-- Recipe Youtube Link -->
                    <div class="row form-group p-3">
                        <div class="col-3">
                            <label for="recipe-video">Recipe Video Link</label>
                        </div>
                        <div class="col-7">
                            <input type="text" class="form-control" id="recipe-video" name="recipe-video" placeholder="Recipe Video">
                        </div>
                    </div>
                    <!-- Recipe Instructions -->
                    <div class="row form-group p-3">
                        <div class="col-3">
                            <label for="recipe-instructions">Instructions</label>
                        </div>
                        <div class="col-7">
                            <textarea name="textarea" type="text" class="form-control" id="textarea" placeholder="Recipe Instructions"></textarea>
                        </div>
                    </div>
                    <!--Ingredient List-->
                    <div class="row form-group p-3">
                        <div class="col-3">
                            <label class="my-3" for="ingredient-list">Ingredients</label>
                            <a class="btn btn-primary" type="button" data-toggle="collapse" href="#ingredient-list" role="button" aria-expanded="false" style="width: 150px">
                                Add Ingredients
                            </a>
                        </div>

                        <div class="col-7 border rounded collapse" id="ingredient-list">
                            <?php
                            $listVar = "";
                            for ($i = 1; $i < 21; $i++) {
                                $listVar .= '<label for="ingredient-' . $i . '">Ingredient ' . $i . ':</label>
                                            <input class="mt-3 form-control" type="text" name="measure-' . $i . '" placeholder="Measurement" />
                                            <input class="my-3 form-control" type="text" name="ingredient-' . $i . '" placeholder="Ingredient" />';
                            }
                            echo $listVar;
                            ?>

                        </div>

                    </div>

                </div>
                <div class="row form-group p-3">
                    <div class="col-6">
                        <button type="submit" class="btn btn-success">Add Recipe</button>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="includes/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
</body>


</html>
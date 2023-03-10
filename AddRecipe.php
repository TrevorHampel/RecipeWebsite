<?php
//include("includes/include.php");
include_once "DatabaseObjects/M_recipe.php";
include_once "DatabaseObjects/M_recipe_ingredient_link.php";
include_once "DatabaseObjects/M_ingredient.php";
include_once "DatabaseObjects/M_measurement_unit.php";
include_once "DatabaseObjects/M_measurement.php";
include_once "DatabaseObjects/M_recipe_tag.php";
include_once "Database.php";

$databaseObj = new Database();
$sql = "SELECT * FROM recipe_types";
$typeList = $databaseObj->selectAssc($sql);



function validateInput()
{
    if (!isset($_POST["recipe-name"])) {
        return;
    }
    $name = $_POST["recipe-name"];
    $image = $_POST["recipe-image"];
    $source = $_POST["recipe-source"];
    $youtube = $_POST["recipe-video"];
    $instructions = $_POST["textarea"];
    $type = $_POST["recipe-type"];
    $area = $_POST["recipe-area"];

    if ($name == "") {
        echo "<span class='text-danger'>Please enter a name</span>";
        return false;
    }
    if ($image == "") {
        echo "<span class='text-danger'>Please upload an image</span>";
        return false;
    }
    if ($source == "") {
        echo "<span class='text-danger'>Please enter a source site</span>";
        return false;
    }
    if ($youtube == "") {
        echo "<span class='text-danger'>Please enter a recipe video</span>";
        return false;
    }
    if ($instructions == "") {
        echo "<span class='text-danger'>Please enter instructions for the recipe</span>";
        return false;
    }
    if ($type == "") {
        echo "<span class='text-danger'>Please enter a recipe type</span>";
        return false;
    }
    if ($area == "") {
        echo "<span class='text-danger'>Please enter a recipe area</span>";
        return false;
    }

    return true;
}

function addRecipe()
{
    if (validateInput()) {
        $id = rand(500, 1000);
        $_POST["recipe-id"] = $id;

        $recipeObj = new M_recipe();
        //$recipeObj->recipe_id = $_POST["recipe-id"];
        $recipeObj->recipe_id = $id;
        $recipeObj->recipe_name = $_POST["recipe-name"];
        $recipeObj->image = $_POST["recipe-image"];
        $recipeObj->source_url = $_POST["recipe-source"];
        $recipeObj->youtube_url = $_POST["recipe-video"];
        $date = new \DateTime('now');
        $recipeObj->date_created = $date->format('Y/m/d H:i:s');
        $recipeObj->recipe_instructions = $_POST["textarea"];
        $recipeObj->recipe_area = $_POST["recipe-area"];
        $recipeObj->recipe_type = $_POST["recipe-type"];
        $recipeObj->insert_obj();
    }
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
                            <input type="text" name="recipe-name" class="form-control" id="recipe-name" placeholder="Enter a Recipe Name" />
                        </div>
                    </div>
                    <!-- Recipe Type -->
                    <div class="row form-group p-3">
                        <div class="col-3">
                            <label for="recipe-type">Recipe Type</label>
                        </div>
                        <div class="col-7">
                            <select multiple type="text" name="recipe-type" class="form-control" id="recipe-type">
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
                            <select multiple type="text" name="recipe-area" class="form-control" id="recipe-area">
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
                            <input type="file" class="form-control-file" name="recipe-image" id="recipe-image">
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
                    <div class="row form-group p-3">
                        <div class="col-6">
                            <button type="submit" class="btn btn-success" onclick="<?php addRecipe() ?>">Add Recipe</button>

                        </div>
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
<?php
include("includes/include.php");

?>

<!doctype html>
<html lang="en">

<head>
    <title>Add a New Recipe</title>
    <link rel='stylesheet' type="text/css" href="stylesheets/application.css">
</head>

<body>
    <?php include_once("includes/nav.php"); ?>
    <form method="post">
        <div class='container border rounded'>
            <div class='row'>
                <div class="col-12 pt-3">
                    <h2 class="text-dark">Add a New Recipe</h2>
                </div>
                <div class="col-8 pt-3">
                    <!-- Recipe Name -->
                    <div class="row form-group p-3">
                        <div class="col-3">
                            <label for="recipe-name">Recipe Name</label>
                        </div>
                        <div class="col-7">
                            <input type="text" class="form-control" id="recipe-name" placeholder="Enter a Recipe Name">
                        </div>
                    </div>
                    <!-- Recipe Type -->
                    <div class="row form-group p-3">
                        <div class="col-3">
                            <label for="recipe-type">Recipe Type</label>
                        </div>
                        <div class="col-7">
                            <select multiple type="text" class="form-control" id="recipe-type">
                                <option>Chicken</option>
                                <option>Beef</option>
                                <option>Appetizer</option>
                                <option>Dessert</option>
                            </select>
                        </div>
                    </div>
                    <!-- Recipe Area -->
                    <div class="row form-group p-3">
                        <div class="col-3">
                            <label for="recipe-area">Recipe Area</label>
                        </div>
                        <div class="col-7">
                            <select multiple type="text" class="form-control" id="recipe-area">
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
                            <input type="file" class="form-control-file" id="recipe-image">
                        </div>
                    </div>
                    <!-- Recipe Source -->
                    <div class="row form-group p-3">
                        <div class="col-3">
                            <label for="recipe-source">Recipe Name</label>
                        </div>
                        <div class="col-7">
                            <input type="text" class="form-control" id="recipe-source" placeholder="Recipe Website">
                        </div>
                    </div>
                    <!-- Recipe Youtube Link -->
                    <div class="row form-group p-3">
                        <div class="col-3">
                            <label for="recipe-video">Recipe Video Link</label>
                        </div>
                        <div class="col-7">
                            <input type="text" class="form-control" id="recipe-video" placeholder="Recipe Video">
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
                    <!-- Submit Form -->
                    <div class="row form-group p-3">
                        <div class="col-6">
                            <button type="submit" class="btn btn-success" onclick="addRecipe()">Add Recipe</button>
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
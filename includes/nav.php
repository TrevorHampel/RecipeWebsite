<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img class="d-inline-block align-top" src="images/WTFicon.png" width="50" height="50" alt="">
    <h2 class="navbar-brand">WTF Should I Eat?</h2>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav">
            <?php
            $navbar = '';
            if (!isset($_SESSION["UserID"])) {
                $navbar .= '<li class="nav-item"><a class="nav-link" href="SignUp.php">Sign Up</a></li>';
                $navbar .= '<li class="nav-item"><a class="nav-link" href="Login.php">Login</a></li>';
            } else {
                $navbar .= '<li class="nav-item"><a class="nav-link" href="viewrecipes.php">Random Recipe</a></li>';
                $navbar .= '<li class="nav-item"><a class="nav-link" href="ListViewRecipes.php">Ten Recipes</a></li>';
                $navbar .= '<li class="nav-item"><a class="nav-link" href="SearchCategory.php">Categories</a></li>';
                $navbar .= '<li class="nav-item"><a class="nav-link" href="SearchRecipes.php">Search</a></li>';
                $navbar .= '<li class="nav-item"><a class="nav-link" href="favorites.php">Favorites</a></li>';
                $navbar .= '<li class="nav-item"><a class="nav-link" href="AddRecipe.php">Add a New Recipe</a></li>';
                $navbar .= '<li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>';
            }
            echo $navbar;
            ?>
        </ul>
    </div>
</nav>
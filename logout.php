<?php
<?php
include '../dbcredslive.php';

// CONSTANTS // --- used to access the rows from the each of the specific database tables when needed
const ingredient_id           = 'ingredient_id';
const ingredient_value        = 'ingredient_value';
const measurement_id          = 'measurement_id';
const measurement_value       = 'measurement_value';
const measurement_unit_id     = 'measurement_unit_id';
const measurement_unit_value  = 'measurement_unit_value';
const recipe_id               = 'recipe_id';

// mulitple arrays to build the different parts for each ingredient //
$jsonArray = array();
$jsonIngredients = array();
$jsonIngredients2 = array();
$jsonIngredients3 = array();

// creates a new connection using the database credentials on the website //
$conn = new mysqli(HOST, USER, PASS, DB);

// redirects the user to the home page without the password for the randomRecipeMobile web page //
function exitToHome(){
    header("Location: https://wtfshouldieat.000webhostapp.com/index.php");
    exit();
}

// creates an ob
class getRandomRecipeMobile{}
// class getRandomRecipeIngredients{} // TESTING IF I CAN ADD ONE OF THESE TO THE RECIPE - OBJ IN OBJ

// check to see if the post is == to 0//
if(sizeof($_POST) == 0){
    exitToHome(); 
} else {
    $secret=$_POST['txtInputSecret'];
}

if($secret == "MobiusStrip"){ 											
    // ?? est. a request type maybe
} else {
    exitToHome();
}

// dynamically get the total nubmer of rows to use in the random number generator for a random recipe //
$queryCountRows = mysqli_query($conn, "SELECT COUNT(*) as 'total' FROM `recipe`;");
$totalRows = mysqli_fetch_assoc($queryCountRows);
// echo $totalRows['total'];
    // VERIFIED - getting the total number of rows from the recipe table in the database

// DONE - if valid query set value for random number
if($totalRows > 0){
    $randomValue = rand(1, $totalRows['total']);
}

// establish the arrays that are being used to build the pre-JSON encoded object //
// $jsonArray = array();
// $jsonIngredients = array();
    
// $queryRecipe = mysqli_query($conn, "SELECT * FROM `recipe` WHERE `recipe_id` = $randomValue;");
$query = mysqli_query($conn, "SELECT * FROM `recipe` WHERE `recipe_id` = $randomValue;");
/*
    NAMES OF THE COLUMNS IN THE RECIPE DATA BASE TABLE CALLED ''recipe'' 
    datecreated
    image
    recipe_area
    recipe_id
    recipe_instructions
    recipe_name
    recipe_type
    source_url
    youtube_url
*/
// if ($queryRecipe){
if ($query){
    // $objIngredients = new getRandomRecipeIngredients();
    $response = new getRandomRecipeMobile(); 
    // TODO if the query is good go thru it and add the the returned ??json?? item
    // begin the json file with results for success and a message as feed back for TOAST
    $response->success = 1;
    $response->message = "SUCCESS";
    // iterate the query and add the data //
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
        $response->recipe_name = $row['recipe_name'];
        $response->recipe_type = $row['recipe_type'];
        $response->recipe_area = $row['recipe_area'];
        $response->recipe_instructions = $row['recipe_instructions'];
        $response->image = $row['image'];

    }

    // $jsonArray[] = "tank tops";
    // $jsonArray[] = "daisy dukess";

    // echo "TESTING WHRERE THIS IS THE ROW::: ".$r[recipe_id]."<br>";


    // - USE A FRESH QUERY SINCE THE OTHER ONE WAS USED UP - //
    $query = mysqli_query($conn, "SELECT * FROM `recipe` WHERE `recipe_id` = $randomValue;");


    // echo "this is rr::::: ".implode($imp = mysqli_fetch_array($query, MYSQLI_ASSOC))."<br>";

    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
        
        // while ($row = mysqli_fetch_assoc($queryRecipe)){
        // $jsonArray[] = $row;
        // echo "THIS IS THE ROW::: ".$row[recipe_id]."<br>";
        // if($indexer == 2){

        // $jsonIngredients = array();

        // $jsonIngredients[] = "INGREDIENTS LIST"; // this should be a 0 index
        //     // echo "see me now";
        //     // $queryIngredients;
        //     // $queryIngredients = mysqli_query($conn, "SELECT * FROM `recipe_ingredient_link` WHERE `recipe_id` = 1");
        // $queryIngredients = mysqli_query($conn, "SELECT * FROM `recipe_ingredient_link` WHERE `recipe_id` = 1");
        $queryIngredients = mysqli_query($conn, "SELECT * FROM `recipe_ingredient_link` WHERE `recipe_id` = $row[recipe_id];");
        //     // get the value each time to extract the data that i need to build the list of ingredients
        while($rowIngredientsIDS = mysqli_fetch_assoc($queryIngredients)){
            //     //     // use the id grabbed to get the actual value with another query
            $queryIngredientItem = mysqli_query($conn, "SELECT * FROM `ingredient` WHERE `ingredient_id` = $rowIngredientsIDS[ingredient_id];");
            while($rowIngredientsValues = mysqli_fetch_assoc($queryIngredientItem)){
                $jsonIngredients[] = $rowIngredientsValues[ingredient_value]; // this line would just store the id
                //     //     // $jsonIngredients[] = $rowIngredientsIDS['ingredient_id']; // this line would just store the id
            }
            //     //     $queryIngredientMeasure = mysqli_query($conn, "SELECT * FROM `ingredient` WHERE `measurement_id` = $rowIngredientsIDS['measurement_id'];");
            //     //     $jsonIngredients[] = $rowIngredientsIDS['measurement_id']; // this line would just store the id and not the values is want
        }
        //     // // dump the ingredients array into the jsonArray that surrounds all thing json //
        $jsonArray[] = $jsonIngredients; /// <<<<<<<<<<< NEW ARRAY ADDED HERE [3], indexed at
        // $jsonArray[] = $jsonIngredients2; /// <<<<<<<<<<< NEW ARRAY ADDED HERE [3], indexed at

        /////////////////////////////////////
        /////  INGREDIENTS MEASUREMENTS /////
        /////////////////////////////////////

        // $jsonIngredients2 = array();
        
        // $queryIngredients = mysqli_query($conn, "SELECT * FROM `recipe_ingredient_link` WHERE `recipe_id` = $row[recipe_id];");
        
        $q_measurement_table = "SELECT 
                                recipe_ingredient_link.recipe_id,
                                measurement.measurement_id,
                                measurement.measurement_value,
                                measurement.measurement_unit_id
                                -- `measurement_value`
                                FROM 
                                measurement
                                INNER JOIN 
                                recipe_ingredient_link 
                                ON 
                                recipe_ingredient_link.measurement_id = measurement.measurement_id
                                WHERE 
                                recipe_ingredient_link.recipe_id = $row[recipe_id];";

        $queryMeasureTable = mysqli_query($conn, $q_measurement_table);
        // $queryIngredients = mysqli_query($conn, "SELECT * FROM `recipe_ingredient_link` WHERE 'recipe_ingredient_link.recipe_id' = $row[recipe_id];");
        //     // get the value each time to extract the data that i need to build the list of ingredients
        // while($rowIngredientsIDS = mysqli_fetch_assoc($queryIngredients)){}

        
        // $jsonIngredients3 = array(); // << HOLDS THE MEASUREMENT VALUES LIKE - oz, lbs, pinch, etc
        
        while($rowMeasurementIDS = mysqli_fetch_assoc($queryMeasureTable)){
            
            // $jsonIngredients2[] = $rowMeasurementIDS[measurement_unit_id]; // PROOF THAT I'M GETTING UNIT IDs FROM THE TABLE

            $jsonIngredients2[] = $rowMeasurementIDS[measurement_value]; // THIS LINE IS GOOD
            
            $q_measurement_unit = "SELECT 
                                    * 
                                    FROM 
                                    measurement_unit 
                                    WHERE 
                                    measurement_unit_id = $rowMeasurementIDS[measurement_unit_id]";

            $result_measurement_unit = mysqli_query($conn, $q_measurement_unit);
            
            while($row_measurement_value = mysqli_fetch_assoc($result_measurement_unit)){
                // add to the json ingredients 3 array // aka ingredient measurement unit //
                $jsonIngredients3[] = $row_measurement_value[measurement_unit_value];
            }

            // $queryIngredientMeasureItem = mysqli_query($conn, 
            //     "SELECT * FROM `measurement` 
            //     WHERE `measurement_value` = $rowIngredientsIDS[ingredient_id];");
            
            // while($rowIngredientsValues = mysqli_fetch_assoc($queryIngredientMeasureItem)){
            //     $jsonIngredients2[] = $rowIngredientsValues[ingredient_value]; 
            // }
        }
        $jsonArray[] = $jsonIngredients2; /// <<<<<<<<<<< NEW ARRAY ADDED HERE [3], indexed at
        $jsonArray[] = $jsonIngredients3; /// <<<<<<<<<<< NEW ARRAY ADDED HERE [3], indexed at


        //     // $recipe_id;
        //     // $measurement_id;
        //     // $ingredient_id;

        //     // get the ingredients using the recipe idate
        //     // use a new sql query for that
        // }
    }

    // creates a key called 'ingredients' and assigns multiple nested arrays with ingredient values 
    $response->ingredients = $jsonArray;
       
    // KEEP TO SHOW FORMATTING OF DATA ON WEBISTE PRE-APP VISUAL AIDE //
    // echo "<pre>";
    // print_r($jsonArray);    // << this is an array
    // print_r($response);     // << this is an object
    // echo "</pre>";
    // -- END -- KEEP TO SHOW FORMATTING OF DATA ON WEBISTE PRE-APP VISUAL AIDE //

    // die(json_encode($jsonArray));
    die(json_encode($response));
    //$response->success = 1; // old code for getData.php
    //$response->message = "added new user"; // old code from getData.php
} else {
    // FAILED TO XFER DATA //
    $response = new getRandomRecipeMobile();
    $response->success = 0;
    $response->message = "FAILED TO XFER DATA";
    die(json_encode($response));
}

// Closes the connection for security purposes //
mysqli_close($conn);
?>
?>
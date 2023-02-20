<?php

include_once("DatabaseObject.php");
include_once("Database.php");
include_once("M_recipe_area.php");
include_once("M_recipe_type.php");
include_once("M_recipe_ingredient_link.php");
include_once("M_recipe_tag_link.php");


class M_recipe extends DatabaseObject{

    public ?int $recipe_id = null;
    public ?string $recipe_name = null;
    public ?string $recipe_type = null;
    public ?string $recipe_area = null;
    public ?string $image = null;
    public ?string $source_url = null;
    public ?string $youtube_url = null;
    public ?string $date_created = null;
    public ?string $recipe_instructions = null;

    public function __construct($primaryKey = null)
    {
        $this->recipe_id = $primaryKey;
        parent::search();
        if($this->recipe_id !== null)
        {
            // $this->recipe_area_id = new M_recipe_area($this->recipe_area_id);
            // $this->recipe_type_id = new M_recipe_type($this->recipe_type_id);
            $this->getAllRecipeIngredients();
            $this->getAllRecipeTags();
        }
    }

    public function getAllRecipeIngredients()
    {
        $Database = new Database();
        $sql = "SELECT recipe_ingredient_link_id
        FROM recipe_ingredient_link
        WHERE recipe_id = " . $this->recipe_id;
        $result = $Database->selectAssc($sql);
        $recipeArray = array();
        foreach($result as $row)
        {
            $recipeArray[] = new M_recipe_ingredient_link($row['recipe_ingredient_link_id']);
        }
        $this->recipe_ingredient_link = $recipeArray;
    }

    public function getAllRecipeTags()
    {
        $Database = new Database();
        $sql = "SELECT recipe_tag_link_id
        FROM recipe_tag_link
        WHERE recipe_id = " . $this->recipe_id;
        $result = $Database->selectAssc($sql);
        $recipeArray = array();
        foreach($result as $row)
        {
            $recipeArray[] = new M_recipe_tag_link($row['recipe_tag_link_id']);
        }
        $this->recipe_tag_link = $recipeArray;
    }

    public function setRecipeTypeId($recipeTypeId)
    {
        $this-> $recipeTypeId = new M_recipe_type($this->recipe_type);
    }

}
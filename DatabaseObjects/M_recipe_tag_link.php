<?php

include_once("DatabaseObject.php");
include_once("M_recipe.php");
include_once("M_recipe_tag.php");



class M_recipe_tag_link extends DatabaseObject{

    public ?int $recipe_tag_link_id = null;
    public ?int $recipe_id = null;
    public $recipe_tag_id = null;

    public function __construct($primaryKey = null)
    {
        $this->recipe_tag_link_id = $primaryKey;
        parent::search();
        $this->recipe_tag_id = new M_recipe_tag($this->recipe_tag_id);
    }
}
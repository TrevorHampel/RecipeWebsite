<?php

include_once("DatabaseObject.php");
include_once("M_measurement.php");
include_once("M_ingredient.php");



class M_recipe_ingredient_link extends DatabaseObject{

    public ?int $recipe_ingredient_link_id = null;
    public ?int $recipe_id = null;
    public $ingredient_id = null;
    public $measurement_id = null;

    public function __construct($primaryKey = null)
    {
        $this->recipe_ingredient_link_id = $primaryKey;
        parent::search();
        $this->ingredient_id = new M_ingredient($this->ingredient_id);
        $this->measurement_id = new M_measurement($this->measurement_id);
    }
}
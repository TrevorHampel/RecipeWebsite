<?php

include_once("DatabaseObject.php");



class M_recipe_area extends DatabaseObject{

    public ?int $recipe_area_id = null;
    public ?string $area_value = null;

    public function __construct($primaryKey = null)
    {
        $this->recipe_area_id = $primaryKey;
        parent::search();
    }
}
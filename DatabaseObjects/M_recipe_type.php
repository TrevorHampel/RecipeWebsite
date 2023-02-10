<?php

include_once("DatabaseObject.php");


class M_recipe_type extends DatabaseObject{

    public ?int $recipe_type_id  = null;
    public ?string $recipe_type = null;

    public function __construct($primaryKey = null)
    {
        $this->recipe_type_id  = $primaryKey;
        parent::search();
    }
}
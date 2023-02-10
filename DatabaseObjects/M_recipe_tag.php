<?php

include_once("DatabaseObject.php");



class M_recipe_tag extends DatabaseObject{

    public ?int $recipe_tag_id = null;
    public ?string $recipe_tag_value = null;

    public function __construct($primaryKey = null)
    {
        $this->recipe_tag_id = $primaryKey;
        parent::search();
    }
}
<?php

include_once("DatabaseObject.php");


class M_ingredient extends DatabaseObject{

    public ?int $ingredient_id = null;
    public ?string $ingredient_value = null;

    public function __construct($primaryKey = null)
    {
        $this->ingredient_id = $primaryKey;
        parent::search();
    }
}
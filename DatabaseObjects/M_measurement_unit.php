<?php

include_once("DatabaseObject.php");


class M_measurement_unit extends DatabaseObject{

    public ?int $measurement_unit_id = null;
    public ?string $measurement_unit_value = null;

    public function __construct($primaryKey = null)
    {
        $this->measurement_unit_id = $primaryKey;
        parent::search();
    }
}
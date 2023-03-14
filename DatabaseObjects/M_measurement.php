<?php

include_once("DatabaseObject.php");
include_once("M_measurement_unit.php");


class M_measurement extends DatabaseObject{

    public ?int $measurement_id = null;
    public ?string $measurement_value = null;
    public $measurement_unit_id = null;

    public function __construct($primaryKey = null)
    {
        $this->measurement_id = $primaryKey;
        parent::search();
        $this->measurement_unit_id = new M_measurement_unit($this->measurement_unit_id);
    }
}
<?php

include_once("DatabaseObject.php");



class user extends DatabaseObject{

    public ?int $user_id = null;
    public ?string $first_name = null;
    public ?string $last_name = null;
    public ?string $user_name = null;
    public ?string $password = null;

    public function __construct($primaryKey = null)
    {
        $this->user_id = $primaryKey;
        parent::search();
    }

    // public function search()
    // {
    //     parent::search();
    // }
    
    // public function update_obj()
    // {
    //     parent::update_obj();
    // }

    // public function delete_obj()
    // {
    //     parent::delete_obj();
    // }
}
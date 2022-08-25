<?php

namespace App\Http\Classes;


class Collector {
    public $user;
    
    public function __construct()
    {
        $this->user = new User();
    }
    
    public function User()
    {
        return $this->user;
    }
}
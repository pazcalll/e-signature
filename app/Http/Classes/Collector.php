<?php

namespace App\Http\Classes;


class Collector {
    public function User()
    {
        $user = new User();
        return $user;
    }
    public function Student()
    {
        $student = new Student();
        return $student;
    }
    public function Lecturer()
    {
        $lecturer = new Lecturer();
        return $lecturer;
    }
}
<?php

namespace App\Repository;

interface TeacherRepositoryInterface{

    // get all Teachers
    public function getAllTeachers();
    public function  Getspecialization();
    public function  Getgender();
    public function  StoreTeachers($request) ;
    public function  EditTeachers($request) ;
    public function  UpdateTeachers($request) ;
    public function  DeleteTeachers($request) ;

}

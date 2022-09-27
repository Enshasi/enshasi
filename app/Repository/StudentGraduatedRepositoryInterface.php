<?php


namespace App\Repository;


interface StudentGraduatedRepositoryInterface
{
    public function index();
    public function create();
    public function softDelete($request);
    public function returnDate($request);
    public function destroy($request);
}

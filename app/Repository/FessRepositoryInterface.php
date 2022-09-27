<?php


namespace App\Repository;


interface FessRepositoryInterface
{
    public function index();
    public function create();
    public function edit($id);
   // public function show($id);
    public function store($request);
    public function update($request);
    public function destroy($request);

}

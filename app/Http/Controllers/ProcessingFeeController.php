<?php

namespace App\Http\Controllers;

use App\Repository\ProcessingRepositoryInterface;
use Illuminate\Http\Request;

class ProcessingFeeController extends Controller
{
    protected  $Processing;
    public function __construct(ProcessingRepositoryInterface  $Processing){
        $this->Processing = $Processing ;
    }
    public function index(Request $request){
        return $this->Processing->index();
    }
    public function show($id){
        return $this->Processing->show($id);
    }
    public function store(Request $request){
        return $this->Processing->store($request);
    }
    public function edit($id){
        return $this->Processing->edit($id);
    }

    public function update(Request $request){
        return $this->Processing->update($request);
    }
    public function destroy(Request $request){
        return $this->Processing->destroy($request);
    }
}

<?php

namespace App\Http\Controllers\Receipt;

use App\Http\Controllers\Controller;
use App\Repository\ReceiptStudentsRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentController extends Controller
{
    protected  $Receipt ;
    public function __construct(ReceiptStudentsRepositoryInterface $Receipt){
        $this->Receipt = $Receipt ;
    }

    public function index(Request $request){
        return $this->Receipt->index();
    }

    public function show(Request $request , $id){
        return $this->Receipt->show($id);
    }
    public function store(Request $request){
        return $this->Receipt->store($request);
    }
    public function edit($id){
        return $this->Receipt->edit($id);
    }
    public function update(Request $request){
        return $this->Receipt->update($request);
    }
    public function destroy(Request $request){
        return $this->Receipt->destroy($request);
    }
}

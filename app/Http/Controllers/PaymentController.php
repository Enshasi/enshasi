<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Repository\PaymentRepositoryInterface;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected  $Payment;
    public function __construct(PaymentRepositoryInterface  $Payment){
        $this->Payment = $Payment ;
    }
    public function index(Request $request){
        return $this->Payment->index();
    }
    public function show($id){
        return $this->Payment->show($id);
    }
    public function store(Request $request){
        return $this->Payment->store($request);
    }
    public function edit($id){
        return $this->Payment->edit($id);
    }

    public function update(Request $request){
        return $this->Payment->update($request);
    }
    public function destroy(Request $request){
        return $this->Payment->destroy($request);
    }
}

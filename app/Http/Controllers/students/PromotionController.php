<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use App\Repository\StudentPromotionRepositoryInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    protected  $Promotion ;
    public function __construct(StudentPromotionRepositoryInterface $Promotion){
        $this->Promotion = $Promotion ;
    }

    public function create(Request $request){
        return $this->Promotion->create();
    }

   public function index(){
       return $this->Promotion->index();
   }

   public function store(Request $request){
       return $this->Promotion->store($request);
   }
    public function destroy(Request $request){
        return $this->Promotion->destroy($request);

    }
}

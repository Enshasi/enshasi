<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Models\fees;
use App\Repository\FessRepositoryInterface;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    protected  $Fees ;
    public function __construct(FessRepositoryInterface $Fees){
        $this->Fees = $Fees ;
    }

    public function index()
    {
       return $this->Fees->index();
    }

    public function create()
    {
        return $this->Fees->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Fees->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function show(fees $fees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , $id)
    {
        return $this->Fees->edit($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    return $this->Fees->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       return $this->Fees->destroy($request);
    }
}

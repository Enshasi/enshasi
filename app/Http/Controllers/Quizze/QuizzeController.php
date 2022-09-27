<?php

namespace App\Http\Controllers\Quizze;
use App\Http\Controllers\Controller;
use App\Models\Quizze;
use App\Repository\QuizzeRepositoryInterface;
use Illuminate\Http\Request;

class QuizzeController extends Controller
{
    protected  $Quizze;
    public function __construct(QuizzeRepositoryInterface  $Quizze){
        $this->Quizze = $Quizze ;
    }
    public function index()
    {
        return $this->Quizze->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->Quizze->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Quizze->store($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quizze  $quizze
     * @return \Illuminate\Http\Response
     */
    public function show(Quizze $quizze)
    {
        return $this->Quizze->show();

    }


    public function edit($id)
    {
        return $this->Quizze->edit($id);

    }


    public function update(Request $request, Quizze $quizze)
    {
        return $this->Quizze->update($request);

    }


    public function destroy(Request $request)
    {
        return $this->Quizze->destroy($request);
    }
}

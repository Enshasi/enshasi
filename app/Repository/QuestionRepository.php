<?php
namespace App\Repository;

use App\Models\Classroom;
use App\Models\fees;
use App\Models\Grade;
use App\Models\ProcessingFee;
use App\Models\Question;
use App\Models\Quizze;
use App\Models\Student;
use App\Models\student_account;
use Illuminate\Support\Facades\DB;

class QuestionRepository implements QuestionRepositoryInterface
{


    public function index()
    {
       $questions = Question::all();
       return view('page.Questions.index' , compact('questions'));
    }

    public function create()
    {
        $quizzes = Quizze::get();

        return view('page.Questions.create' , compact('quizzes'));

    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function store($request)
    {
        try {
            $question  = new Question();
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->quizze_id = $request->quizze_id;
            $question->save();
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }


    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $quizzes = Quizze::get();
        return view('page.Questions.edit' , compact('question' , 'quizzes'));
    }

    public function update($request)
    {
        try {
            $question = Question::findorfail($request->id);
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->quizze_id = $request->quizze_id;
            $question->save();
            toastr()->success(trans('messages.Update'));
            return redirect()-back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Question::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}

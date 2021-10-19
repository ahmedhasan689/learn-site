<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Quiz;
use App\Course;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::orderBy('id', 'desc')->paginate(5);
        return view('Admin.quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Quiz $quiz)
    {
        $rules = [
            'name' => 'required|min:10|max:50',
            'course_id' => 'required|integer',
        ];
        $this->validate($request, $rules);

        $quiz = Quiz::create($request->all());

        if ($quiz){
            return redirect()->route('quiz.index')->withStatus('Quiz Successfully Created');
        }else{
            return redirect()->route('quiz.create')->withStatus('There Is Some Error');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return view('admin.quizzes.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        return view('admin.quizzes.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $rules = [
            'name' => 'required|min:10|max:50',
            'course_id' => 'required|integer',
        ];
        $this->validate($request, $rules);

        if ($quiz->update($request->all())){
            return redirect()->route('quiz.index')->withStatus('Quiz Successfully Updated');
        }else{
            return redirect()->route('quiz.edit')->withStatus('There Is Some Error');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quiz.index')->withStatus('Quiz Successfully Deleted');
    }
}

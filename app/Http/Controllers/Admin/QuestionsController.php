<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Question;

class QuestionsController extends Controller
{

    public function index(Question $question)
    {
        $questions = Question::orderBy('id', 'desc')->paginate(6);
        return view('admin.questions.index', compact('questions'));
    }

    public function create()
    {
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:10|max:150',
            'answers' => 'required|min:10|max:150',
            'right_answer' => 'required|min:3|max:150',
            'score' => 'required|integer|in:5,10,15,20,25,30',
            'quiz_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        if(Question::create($request->all())){

            return redirect()->route('questions.index')->withStatus('Question Successfully Created');

        }else{

            return redirect()->route('questions.create')->withStatus('Something Error, Try Again');

        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $rules = [
            'title' => 'required|min:10|max:150',
            'answers' => 'required|min:10|max:150',
            'right_answer' => 'required|min:3|max:150',
            'score' => 'required|integer|in:5,10,15,20,25,30',
            'quiz_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        if($question->update($request->all())){

            return redirect()->route('questions.index')->withStatus('Question Successfully Created');

        }else{

            return redirect()->route('questions.edit')->withStatus('Something Error, Try Again');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')->withStatus('Question Successfully Deleted');

    }
}

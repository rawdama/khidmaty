<?php

namespace App\Http\Controllers;

use App\Models\Question;

use App\Models\QuestionTranslation;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminId = auth()->guard('admin')->id();
        $questions=Question::where('admin_id',$adminId)->get();
        return view('pages.questions.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'question_ar' => 'required|string',
        'question_en' => 'required|string',
        'answer_ar' => 'required|string',
        'answer_en' => 'required|string',
    ]);

    
    $question = new Question();
    foreach (config('app.languages') as $locale => $language) {
        $question->translateOrNew($locale)->question = $request->input("question_$locale");
        $question->translateOrNew($locale)->answer = $request->input("answer_$locale");
    }
    $question->admin_id=auth()->guard('admin')->id();
    $question->save();
    return \Jeybin\Toastr\Toastr::success('question is added successfully ')->redirect('questions.index' );


    
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'question_ar' => 'required|string',
        'question_en' => 'required|string',
        'answer_ar' => 'required|string',
        'answer_en' => 'required|string',
    ]);
    $question = Question::findOrFail($id);
    foreach (config('app.languages') as $locale => $language) {
        $translation = $question->translateOrNew($locale);
        $translation->question = $request->input("question_$locale");
        $translation->answer = $request->input("answer_$locale");

        $translation->save(); // Save the translation
    }
    $question->admin_id=auth()->guard('admin')->id();
    $question->save();
    return \Jeybin\Toastr\Toastr::success('Question updated successfully')->redirect('questions.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        try{
            if ($question->admin_id !== auth()->guard('admin')->id()) {
                return redirect()->back()->withErrors(['error' => 'Unauthorized action.']);
            }
            $question->delete();
            return \Jeybin\Toastr\Toastr::error('question is deleted successfully ')->redirect('questions.index' );
        }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);

        }
    }
}

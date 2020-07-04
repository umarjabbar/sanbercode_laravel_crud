<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Question;
use App\Answer;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all(); 
        return view('questions.index', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $request->validate([
            'judul_pertanyaan' => 'required',
            'isi_pertanyaan' => 'required'
        ]);

        Question::create($request->all());
        return redirect('/pertanyaan')->with('message', 'Anda berhasil menabahkan pertanyaan');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        // dump($question);
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $id)
    {
        return view('questions.update', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $id)
    {
        $request->validate([
            'judul_pertanyaan' => 'required',
            'isi_pertanyaan' => 'required'
        ]);

        Question::where('id', $id->id)
                ->update([
                    'judul_pertanyaan' => $request->judul_pertanyaan,
                    'isi_pertanyaan' => $request->isi_pertanyaan
                ]);
        return redirect('/pertanyaan')->with('message', 'Anda berhasil memperbarui pertanyaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::destroy($id);
        return back()->with('message','Jawaban berhasil dihapus!');
    }
}

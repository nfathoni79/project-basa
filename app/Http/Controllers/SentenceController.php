<?php

namespace App\Http\Controllers;

use App\Models\Sentence;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SentencesImport;

class SentenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sentences = Sentence::all();
        // $sentences = Sentence::find(3);
        // $sentences = Sentence::where('id', 3)->get();

        return view('sentences.index', compact('sentences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $file = $request->file('import_file');
        Excel::import(new SentencesImport, $file);

        return redirect()->route('sentences.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function show(Sentence $sentence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function edit(Sentence $sentence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sentence $sentence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sentence $sentence)
    {
        //
    }

    /**
     * Remove all resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyAll()
    {
        //
        Sentence::truncate();

        return redirect()->route('sentences.index');
    }
}

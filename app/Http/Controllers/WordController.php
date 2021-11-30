<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\WordsImport;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $words = Word::all();

        return view('words.index', compact('words'));
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
        $file = $request->file('file-upload');
        Excel::import(new WordsImport, $file);

        return redirect()->route('words.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function show(Word $word)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $word)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word)
    {
        //
        $word->update($request->all());
        //
        // $word = Word::findOrFail($word);
        //
        // $word->number = $request->number;
        // $word->rude = $request->rude;
        // $word->middle = $request->middle;
        // $word->polite = $request->polite;
        // $word->save();

        return redirect()->route('words.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word)
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
        // DB::table('words')->truncate();
        Word::truncate();

        return redirect()->route('words.index');
    }

    // Coba
    public function cobaWords()
    {
        $words = Word::all();

        return $words;
    }
}

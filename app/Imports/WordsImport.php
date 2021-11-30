<?php

namespace App\Imports;

use App\Models\Word;
use Maatwebsite\Excel\Concerns\ToModel;

class WordsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Word([
            //
            'number' => $row[0],
            'rude' => $row[1],
            'middle' => $row[2],
            'polite' => $row[3],
        ]);
    }
}

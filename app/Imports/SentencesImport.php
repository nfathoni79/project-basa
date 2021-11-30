<?php

namespace App\Imports;

use App\Models\Sentence;
use Maatwebsite\Excel\Concerns\ToModel;

class SentencesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sentence([
            //
            'number' => $row[0],
            'simple_rude' => $row[1],
            'soft_rude' => $row[2],
            'simple_polite' => $row[3],
            'soft_polite' => $row[4],
        ]);
    }
}

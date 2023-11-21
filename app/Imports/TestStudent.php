<?php

namespace App\Imports;

use App\Models\ExamTestThemeModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TestStudent implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);

        // foreach ($collection as $key => $value) {

        //     $test_theme = ExamTestThemeModel::create([
        //         'name' => $value[0]
        //     ]);
            
        //     for ($i = 1; $i < count($value); $i++) { 
                

        //     }
        // }
    }
}

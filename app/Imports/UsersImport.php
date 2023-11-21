<?php

namespace App\Imports;

use App\Models\StudentGroup;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $users = $rows->groupBy('1');

        foreach ($users as $rows => $name)
        {
            foreach ($name as $row) {


                if (isset($row[0])) {

                    $student_group = StudentGroup::where(['name' => $rows])->first();

                    if (!$student_group) {

                        $student_group = StudentGroup::create(['name' => $rows]);
                    }

                    User::create([
                        "full_name" => $row[0],
                        // "password" => Hash::make($row[3]),
                        // "login" => $row[2],
                        'student_id' => $row[2],
                        "level_id" => 4,
                        "group_id" => $student_group->id
                    ]);
                }

            }
        }

        return "as";
    }
}

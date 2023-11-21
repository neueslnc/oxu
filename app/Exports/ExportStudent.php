<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportStudent implements FromCollection, WithHeadings
{
    /**
     * @var
     */
    protected $direction_id;
    protected $group_id;

    public function __construct($direction_id, $group_id)
    {
        $this->direction_id = $direction_id;
        $this->group_id = $group_id;
    }

    public function headings():array{
        return[
            'F.I.O',
            'Talaba ID',
            'Telefon raqami',
            'Hemis ID',
            'Passport',
            'PINFL',
            'Tug`ilgan sana',
            'Otasi F.I.O',
            'Onasi F.I.O',
            'Otasi T.R',
            'Onasi T.R',
            'Yashash joyi',
            'Vaqtincha yashash joyi',
            'Ota-ona qaramog`idan maxrum bo`lgan',
            'Nogironligi',
            'Ijtimoiy ta`minotga muxtoj',
            'Sudlanganligi',
            'Ish joyi'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('users')
            ->select([
                'full_name',
                'student_id',
                'number_phone',
                'hemis_id',
                'passport_series',
                'passport_pinfl',
                'birthday',
                'father_fio',
                'mather_fio',
                'father_phone',
                'mather_phone',
                'address',
                'address_temporarily',
                'deprived_of_parental',
                'disabled',
                'social_security',
                'court',
                'workplace'
            ])
            ->where('direction_id','=',$this->direction_id)
            ->where('group_id','=',$this->group_id)
            ->get()
            ->sortBy('full_name');
    }
}

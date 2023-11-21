<?php

namespace Database\Seeders;

use App\Domain\Directions\Models\Direction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directions = [
            ' Jismoniy madaniyat',
            ' Tarix (mamlakatlar va yoʼnalishlar boʼyicha)',
            ' Kompyuter ilmlari va dasturlash texnologiyalari (yoʼnalishlar boʼyicha)',
            ' Konchilik ishi (faoliyat turlari boʼyicha)',
            ' Filologiya va tillarini oʼqitish (roman-german tillari)',
            ' Moliya va moliyaviy texnologiyalar',
            ' Iqtisodiyot (tarmoqlar va sohalar boʼyicha)',
            ' Davolash ishi',
            ' Farmatsiya',
            ' Stomotalogiya',
            ' Boshlangʼich taʼlim',
            ' Maktabgacha taʼlim',
            ' Pedagogika va psixologiya',
            ' Iqtisodiyot (tarmoqlar va sohalar boʼyicha)',
            ' Taʼlim va tarbiya nazariyasi va metodikasi (boshlangʼich taʼlim)',
            ' Pedagogika va psixologiya'
        ];
        $code = [
            '60112200',
            '60220300',
            '60610100',
            '60721500',
            '60230100',
            '60410400',
            '60310100',
            '60910200',
            '60910700',
            '60910100',
            '60110500',
            '60110200',
            '60110100',
            '70310102',
            '70110501',
            '70110102',
        ];
        $type_one = [
            '1',
            '1',
            '1',
            '1',
            '1',
            '1',
            '1',
            '1',
            '1',
            '1',
            '1',
            '1',
            '1',
            '1',
            '1',
            '1',
            ];
        $type_two = [
            '2',
            '2',
            '2',
            '2',
            '2',
            '2',
            '2',
            '2',
            '2',
            '2',
            '2',
            '2',
            '2',
            '2',
            '2',
            '2',
        ];


        for ($i = 0; $i < count($directions); $i++) {
            $direction = new Direction();
            $direction->title = $directions[$i];
            $direction->code = $code[$i];
            $direction->type_of_education_id = $type_one[$i];
            $direction->language_id = 1;
            $direction->dean_id = 6;
            $direction->form_of_education_id = $type_one[$i];
            $direction->status = 1;
            $direction->save();
        }
        for ($i = 0; $i < count($directions); $i++) {
            $direction = new Direction();
            $direction->title = $directions[$i];
            $direction->code = $code[$i];
            $direction->type_of_education_id = $type_two[$i];
            $direction->language_id = 1;
            $direction->dean_id = 6;
            $direction->form_of_education_id = $type_one[$i];
            $direction->status = 2;
            $direction->save();
        }

//        for ($i = 0; $i < count($directions); $i++) {
//            $direction = new Direction();
//            $direction->title = $directions[$i];
//            $direction->code = $code[$i];
//            $direction->type_of_education_id = $type[$i];
//            $direction->language_id = 1;
//            $direction->form_of_education_id = ($direction->code > 70000000) ? "2" : "1";
//            if ($directions[$i] == ' Davolash ishi' or $directions[$i] == ' Farmatsiya' or $directions[$i] == ' Stomotalogiya') {
//                $direction->dean_id = 0;
//            } else {
//                $direction->dean_id = 6;
//            }
//
//            $direction->save();
//        }
    }
}

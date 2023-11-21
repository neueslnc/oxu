<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Sciences::create(['name' => "Amaliy o'zbek (rus) tili. Davlat tilida ish yuritish (ECTS 6) ", "syllabus_id" => 1, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Bolalarda boshlang'ich matematik tushunchalarni rivojlantirish ", "syllabus_id" => 1, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Boshlang'ich ta'limda tarbiya fani ", "syllabus_id" => 1, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Falsafa (ECTS4)", "syllabus_id" => 1, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Kitobxonlik madaniyatini shakllantirish metodikasi ", "syllabus_id" => 1, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Malakaviy amaliyot", "syllabus_id" => 1, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Mutaxassislikka kirish ", "syllabus_id" => 1, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Umumiy psixologiya ", "syllabus_id" => 1, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Amaliy o'zbek (rus) tili. Davlat tilida ish yuritish (ECTS 6) ", "syllabus_id" => 1, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Bolalar adabiyoti nazariyasi ", "syllabus_id" => 1, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Gender tarbiya ", "syllabus_id" => 1, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Malakaviy amaliyot", "syllabus_id" => 1, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Matematika va uni o'qitish metodikasi", "syllabus_id" => 1, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Ona - tili o'qish savodxonligi va uni o'qitish metodikasi ", "syllabus_id" => 1, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi ", "syllabus_id" => 1, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Umumiy psixologiya ", "syllabus_id" => 1, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Ilmiy tadqiqot metodologiyasi", "syllabus_id" => 2, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Kreativ pedagogika ", "syllabus_id" => 2, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Xalqaro baholash tizimi", "syllabus_id" => 2, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Boshlang'ich sinfda ona tili va o'qish savodxonligini o'qitishda innovatsion texnologiyalar", "syllabus_id" => 2, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Boshlang'ich ta'lim fanlar nazariyasi", "syllabus_id" => 2, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Pedagogik tadqiqotlarda statistik metodlar", "syllabus_id" => 2, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Yangi O`zbekiston taraqqiyot strategiyasida ta`lim tizimidagi islohotlar", "syllabus_id" => 2, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Amaliy o'zbek ( rus) tili. Davlat tilida ish yuritish", "syllabus_id" => 3, "semester_id" => 3]); 
        \App\Models\Sciences::create(['name' => "Bolalarda boshlang'ich matematik tushunchalarni rivojlantirish ", "syllabus_id" => 3, "semester_id" => 3]); 
        \App\Models\Sciences::create(['name' => "Boshlang'ich ta'limda tarbiya fani ", "syllabus_id" => 3, "semester_id" => 3]); 
        \App\Models\Sciences::create(['name' => "Boshlang'ich ta'lim pedagogikasi", "syllabus_id" => 3, "semester_id" => 3]); 
        \App\Models\Sciences::create(['name' => "Falsafa (ECTS4)", "syllabus_id" => 3, "semester_id" => 3]); 
        \App\Models\Sciences::create(['name' => "Gender tarbiya ", "syllabus_id" => 3, "semester_id" => 3]); 
        \App\Models\Sciences::create(['name' => "Matematika va uni o'qitish metodikasi", "syllabus_id" => 3, "semester_id" => 3]); 
        \App\Models\Sciences::create(['name' => "Mediasavodxonlik va axborot madaniyati", "syllabus_id" => 3, "semester_id" => 3]); 
        \App\Models\Sciences::create(['name' => "Mutaxassislikka kirish ", "syllabus_id" => 3, "semester_id" => 3]); 
        \App\Models\Sciences::create(['name' => "Ona - tili o'qish savodxonligi va uni o'qitish metodikasi ", "syllabus_id" => 3, "semester_id" => 3]); 
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi", "syllabus_id" => 3, "semester_id" => 3]); 
        \App\Models\Sciences::create(['name' => "Texnologiya ta'limi va uni o'qitish metodikasi ", "syllabus_id" => 3, "semester_id" => 3]); 
        \App\Models\Sciences::create(['name' => "Tibbiy bilim asoslari ", "syllabus_id" => 3, "semester_id" => 3]); 
        \App\Models\Sciences::create(['name' => "Umumiy psixologiya ", "syllabus_id" => 3, "semester_id" => 3]); 
        \App\Models\Sciences::create(['name' => "Yosh fiziologiyasi va gigiyenasi ", "syllabus_id" => 3, "semester_id" => 3]); 

        \App\Models\Sciences::create(['name' => "Amaliy o'zbek (rus) tili. Davlat tilida ish yuritish (ECTS 6) ", "syllabus_id" => 4, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Boshlang'ich ta'limda tarbiya fani ", "syllabus_id" => 4, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Falsafa (ECTS4)", "syllabus_id" => 4, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Mediasavodxonlik va axborot madaniyati", "syllabus_id" => 4, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Mutaxassislikka kirish ", "syllabus_id" => 4, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Umumiy psixologiya ", "syllabus_id" => 4, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Xalq pedagogikasi/Pedagogik kompetentlik", "syllabus_id" => 4, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Bolalarda boshlang'ich matematik tushunchalarni rivojlantirish ", "syllabus_id" => 4, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Gender tarbiya ", "syllabus_id" => 4, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Matematika va uni o'qitish metodikasi", "syllabus_id" => 4, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Mutaxassislikka kirish ", "syllabus_id" => 4, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Ona - tili o'qish savodxonligi va uni o'qitish metodikasi ", "syllabus_id" => 4, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi ", "syllabus_id" => 4, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Umumiy psixologiya ", "syllabus_id" => 4, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Anatomiya ", "syllabus_id" => 5, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Biofizika ", "syllabus_id" => 5, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Biokimyo", "syllabus_id" => 5, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Fiziologiya ", "syllabus_id" => 5, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Gistologiya, sitologiya, embriologiya", "syllabus_id" => 5, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Lotin tili va tibbiy terminalogiya ", "syllabus_id" => 5, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Mikrobiologiya, virusologiya, immunologiya", "syllabus_id" => 5, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi", "syllabus_id" => 5, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O'zbek/rus tili", "syllabus_id" => 5, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Tibbiy biologiya. Umumiy genetika ", "syllabus_id" => 5, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Tibbiy kimyo", "syllabus_id" => 5, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Tibbiyotda axborot texnologiyalari (IT texnologiyasi) ", "syllabus_id" => 5, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Tibbiyotda xorijiy til", "syllabus_id" => 5, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Tibbiyot kasbiga kirish", "syllabus_id" => 5, "semester_id" => 3]);

        \App\Models\Sciences::create(['name' => "Biomeditsina injereringi", "syllabus_id" => 5, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Birinchi shifokorgacha bo'lgan yordam", "syllabus_id" => 5, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Farmakologiya ", "syllabus_id" => 5, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Ichki kasalliklar", "syllabus_id" => 5, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Klinik anatomiya (operativ xirurgiya va topografik anatomiya)", "syllabus_id" => 5, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Pato logik anatomiya", "syllabus_id" => 5, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Pato logik fiziologiya", "syllabus_id" => 5, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Pediatriya", "syllabus_id" => 5, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Psixologiya va pedagogika ", "syllabus_id" => 5, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Shifokor etikasi va tibbiy deontologiya", "syllabus_id" => 5, "semester_id" => 4]);

        \App\Models\Sciences::create(['name' => "Anatomiya ", "syllabus_id" => 6, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Biofizika ", "syllabus_id" => 6, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Lotin tili va tibbiy terminalogiya ", "syllabus_id" => 6, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi", "syllabus_id" => 6, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'zbek/rus tili", "syllabus_id" => 6, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Tibbiy biologiya. Umumiy genetika ", "syllabus_id" => 6, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Tibbiy kimyo", "syllabus_id" => 6, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Tibbiyot kasbiga kirish", "syllabus_id" => 6, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Anatomiya ", "syllabus_id" => 6, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Biofizika ", "syllabus_id" => 6, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Fiziologiya ", "syllabus_id" => 6, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Gistologiya, sitologiya, embriologiya", "syllabus_id" => 6, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Jismoniy tarbiya va sport", "syllabus_id" => 6, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Stomotologiya", "syllabus_id" => 6, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Tibbiy biologiya. Umumiy genetika ", "syllabus_id" => 6, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Tibbiy kimyo", "syllabus_id" => 6, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Tibbiyotda axborot texnologiyalari (IT texnologiyasi) ", "syllabus_id" => 6, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Tibbiyotda xorijiy til", "syllabus_id" => 6, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Tibbiyot kasbiga kirish", "syllabus_id" => 6, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Analitik kimyo ", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Axborot texnologiyalari va jarayonlarni matematik modellashtirish ", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Ekologiya va gigiyena ", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Farmatsevtika ishini tashkil etish ", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Farmatsevtik bioetika ", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Farmatsevtik botanika ", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Fizika ", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Fizik va kolloid kimyo", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Fiziologiya odam anatomiyasi asoslari bilan", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Lotin tili va farmasevtik terminologiya asoslari ", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Matematika va matematik statistika ", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Mutaxassislikka kirish ", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Noorganik kimyo ", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Organik kimyo", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi ", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O'zbek/ rus tili", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Patologiya ", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Tibbiyotda axbotot texnologiyalari/Psixologiya va pedagogika", "syllabus_id" => 7, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Tibbiyotda xorijiy til/Jismoniy tarbiya va sport", "syllabus_id" => 7, "semester_id" => 3]);

        \App\Models\Sciences::create(['name' => "Analitik kimyo ", "syllabus_id" => 7, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Bioetika", "syllabus_id" => 7, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Biologik kimyo", "syllabus_id" => 7, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Farmatsevtika ishini tashkil etish ", "syllabus_id" => 7, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Farmatsevtik botanika ", "syllabus_id" => 7, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Mikrobiologiya ", "syllabus_id" => 7, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Organik kimyo", "syllabus_id" => 7, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Tibbiyot tarixi", "syllabus_id" => 7, "semester_id" => 4]);
    
        \App\Models\Sciences::create(['name' => "Axborot texnologiyalari va jarayonlarni matematik modellashtirish ", "syllabus_id" => 8, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Ekologiya va gigiyena ", "syllabus_id" => 8, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Fiziologiya odam anatomiyasi asoslari bilan", "syllabus_id" => 8, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Lotin tili va farmasevtik terminologiya asoslari ", "syllabus_id" => 8, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Matematika va matematik statistika ", "syllabus_id" => 8, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Mutaxassislikka kirish ", "syllabus_id" => 8, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Noorganik kimyo ", "syllabus_id" => 8, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Tibbiyotda axbotot texnologiyalari/Psixologiya va pedagogika", "syllabus_id" => 8, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Axborot texnologiyalari va jarayonlarni matematik modellashtirish ", "syllabus_id" => 8, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Ekologiya va gigiyena ", "syllabus_id" => 8, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Falsafa", "syllabus_id" => 8, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Fizika ", "syllabus_id" => 8, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Lotin tili va farmasevtik terminologiya asoslari ", "syllabus_id" => 8, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Matematika va matematik statistika ", "syllabus_id" => 8, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Noorganik kimyo ", "syllabus_id" => 8, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi ", "syllabus_id" => 8, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'zbek/ rus tili", "syllabus_id" => 8, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Patologiya ", "syllabus_id" => 8, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Amaliy fonetika", "syllabus_id" => 9, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Amaliy grammatika", "syllabus_id" => 9, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Og'zaki nutq madaniyati", "syllabus_id" => 9, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'qish va yozish amaliyoti", "syllabus_id" => 9, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi", "syllabus_id" => 9, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Roman-german filologiyasiga kirish", "syllabus_id" => 9, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Tilshunoslik", "syllabus_id" => 9, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Adabiyotshunoslik", "syllabus_id" => 9, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Amaliy fonetika", "syllabus_id" => 9, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Amaliy grammatika", "syllabus_id" => 9, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Og'zaki nutq madaniyati", "syllabus_id" => 9, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'qish va yozish amaliyoti", "syllabus_id" => 9, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'zbek (Rus) tili", "syllabus_id" => 9, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Ta'limda axborot texnologiyalari", "syllabus_id" => 9, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Valeologiya", "syllabus_id" => 9, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Amaliy matematika", "syllabus_id" => 10, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Iqtisodiyotda axborot kommunikatsion texnologiyalar va tizimlar", "syllabus_id" => 10, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Iqtisodiyot nazariyasi", "syllabus_id" => 10, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'zbek (rus) tili", "syllabus_id" => 10, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Xorijiy til (Ingliz, fransuz, nemis, koreys)", "syllabus_id" => 10, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Biznes matematika", "syllabus_id" => 10, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Falsafa", "syllabus_id" => 10, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Iqtisodiyot nazariyasi", "syllabus_id" => 10, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Iqtisodiy ta'limotlar tarixi", "syllabus_id" => 10, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Malakaviy amaliyot", "syllabus_id" => 10, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi", "syllabus_id" => 10, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O‘zbek tilini sohada qo‘llanilishi/ Kasbiy nutq mahorati", "syllabus_id" => 10, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Xorijiy til (Ingliz, fransuz, nemis, koreys)", "syllabus_id" => 10, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Ilmiy tadqiqot metodologiyasi ", "syllabus_id" => 11, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Maxsus fanlarni o‘qitish metodikasi   ", "syllabus_id" => 11, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Mikroiqtisodiyot-2", "syllabus_id" => 11, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Raqamli iqtisodiyot /Menejment-2", "syllabus_id" => 11, "semester_id" => 1]);
    
        \App\Models\Sciences::create(['name' => "Iqtisodiy  o‘sish", "syllabus_id" => 11, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Moliyaviy tahlil", "syllabus_id" => 11, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Raqobat strategiyasi /Jahon iqtisodiyoti", "syllabus_id" => 11, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Amaliy matematika", "syllabus_id" => 12, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Biznes huquqi/ Kreativ fikrlash", "syllabus_id" => 12, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Biznes matematika", "syllabus_id" => 12, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Falsafa", "syllabus_id" => 12, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Iqtisodiyotda axborot kommunikatsion texnologiyalar va tizimlar", "syllabus_id" => 12, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Iqtisodiyot nazariyasi", "syllabus_id" => 12, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Iqtisodiy siyosatga kirish", "syllabus_id" => 12, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Iqtisodiy ta'limotlar tarixi", "syllabus_id" => 12, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O’zbekistonning eng yangi tarixi (ECTS 4)", "syllabus_id" => 12, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O‘zbek (rus tili)", "syllabus_id" => 12, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O‘zbek tilini sohada qo‘llanilishi/                                 Kasbiy nutq mahorati", "syllabus_id" => 12, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Raqamli iqtisodiyot", "syllabus_id" => 12, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Xorijiy til (Ingliz, fransuz, nemis, koreys)", "syllabus_id" => 12, "semester_id" => 3]);

        \App\Models\Sciences::create(['name' => "Biznes matematika", "syllabus_id" => 12, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Iqtisodiy tahlil va audit", "syllabus_id" => 12, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Makroiqtisodiyot", "syllabus_id" => 12, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Menejment", "syllabus_id" => 12, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Mikroiqtisodiyot", "syllabus_id" => 12, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Xorijiy til (Ingliz, fransuz, nemis, koreys)", "syllabus_id" => 12, "semester_id" => 4]);

        \App\Models\Sciences::create(['name' => "Amaliy matematika", "syllabus_id" => 13, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Iqtisodiyotda axborot kommunikatsion texnologiyalar va tizimlar", "syllabus_id" => 13, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Iqtisodiyot nazariyasi", "syllabus_id" => 13, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'zbek (rus) tili", "syllabus_id" => 13, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Xorijiy til (Ingliz, fransuz, nemis, koreys)", "syllabus_id" => 13, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Falsafa", "syllabus_id" => 13, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Iqtisodiyot nazariyasi", "syllabus_id" => 13, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Iqtisodiy ta'limotlar tarixi", "syllabus_id" => 13, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi", "syllabus_id" => 13, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O‘zbek tilini sohada qo‘llanilishi/ Kasbiy nutq mahorati", "syllabus_id" => 13, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Xorijiy til (Ingliz, fransuz, nemis, koreys)", "syllabus_id" => 13, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Anatomiya", "syllabus_id" => 14, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Gimnastika va uni o'qitish metodikasi", "syllabus_id" => 14, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Harakat o'yinlari va uni o'qitish metodikasi", "syllabus_id" => 14, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Jismoniy madaniyat nazariyasi va metodikasi 1", "syllabus_id" => 14, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Jismoniy madaniyat nazariyasi va metodikasi II", "syllabus_id" => 14, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Jismoniy tarbiya va sportni boshqarish", "syllabus_id" => 14, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Mediasavodxonlik va axborot madaniyati", "syllabus_id" => 14, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi", "syllabus_id" => 14, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Sportchi ovqatlanishi", "syllabus_id" => 14, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Sport o'yinlari va uni o'qitish metodikasi", "syllabus_id" => 14, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Umumiy psixologiya", "syllabus_id" => 14, "semester_id" => 3]);
    
        \App\Models\Sciences::create(['name' => "Gimnastika va uni o'qitish metodikasi", "syllabus_id" => 14, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Harakat o'yinlari va uni o'qitish metodikasi", "syllabus_id" => 14, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Jismoniy madaniyat nazariyasi va metodikasi 1", "syllabus_id" => 14, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Jismoniy madaniyat nazariyasi va metodikasi II", "syllabus_id" => 14, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Jismoniy madaniyat va sport sohasida ilmiy metodik faoliyt asoslari", "syllabus_id" => 14, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Kasbiy sohada xorijiy tillar", "syllabus_id" => 14, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Sport o'yinlari va uni o'qitish metodikasi", "syllabus_id" => 14, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Umumiy pedagogika", "syllabus_id" => 14, "semester_id" => 4]);

        \App\Models\Sciences::create(['name' => "Gimnastika va uni o'qitish metodikasi", "syllabus_id" => 15, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Harakat o'yinlari va uni o'qitish metodikasi", "syllabus_id" => 15, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Jismoniy madaniyat nazariyasi va metodikasi 1", "syllabus_id" => 15, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Jismoniy tarbiya tarixi ", "syllabus_id" => 15, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Umumiy psixologiya", "syllabus_id" => 15, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Anatomiya", "syllabus_id" => 15, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Gimnastika va uni o'qitish metodikasi", "syllabus_id" => 15, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Harakat o'yinlari va uni o'qitish metodikasi", "syllabus_id" => 15, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Jismoniy madaniyat nazariyasi va metodikasi 1", "syllabus_id" => 15, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi", "syllabus_id" => 15, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Sportchi ovqatlanishi", "syllabus_id" => 15, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Algoritmlar va ma'lumotlar strukturalari", "syllabus_id" => 17, "semester_id" => 5]);
        \App\Models\Sciences::create(['name' => "Amaliy informatika", "syllabus_id" => 17, "semester_id" => 5]);
        \App\Models\Sciences::create(['name' => "Amaliy o’zbek (rus) tili", "syllabus_id" => 17, "semester_id" => 5]);
        \App\Models\Sciences::create(['name' => "Axborot tizimlari", "syllabus_id" => 17, "semester_id" => 5]);
        \App\Models\Sciences::create(['name' => "Dasturiy injiniring", "syllabus_id" => 17, "semester_id" => 5]);
        \App\Models\Sciences::create(['name' => "Diskret matematika", "syllabus_id" => 17, "semester_id" => 5]);
        \App\Models\Sciences::create(['name' => "Falsafa", "syllabus_id" => 17, "semester_id" => 5]);
        \App\Models\Sciences::create(['name' => "Matematika ", "syllabus_id" => 17, "semester_id" => 5]);
        \App\Models\Sciences::create(['name' => "Matematik analiz", "syllabus_id" => 17, "semester_id" => 5]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi ", "syllabus_id" => 17, "semester_id" => 5]);
        \App\Models\Sciences::create(['name' => "O'zbek tilini sohada qo'llanilishi", "syllabus_id" => 17, "semester_id" => 5]);
        \App\Models\Sciences::create(['name' => "Programmalash asoslari", "syllabus_id" => 17, "semester_id" => 5]);
        \App\Models\Sciences::create(['name' => "Sonli usullar", "syllabus_id" => 17, "semester_id" => 5]);
        \App\Models\Sciences::create(['name' => "Umumiy pedagogika", "syllabus_id" => 17, "semester_id" => 5]);
        \App\Models\Sciences::create(['name' => "Xorijiy til", "syllabus_id" => 17, "semester_id" => 5]);

        \App\Models\Sciences::create(['name' => "Matematika ", "syllabus_id" => 18, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Matematik analiz", "syllabus_id" => 18, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi", "syllabus_id" => 18, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'zbek (rus ) tili ", "syllabus_id" => 18, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'zbek tilini sohada qo'llanilishi", "syllabus_id" => 18, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Programmalash asoslari", "syllabus_id" => 18, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Valeologeya asoslari", "syllabus_id" => 18, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Xorijiy til", "syllabus_id" => 18, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Algoritmlar va ma'lumotlar strukturalari", "syllabus_id" => 18, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Amaliy informatika", "syllabus_id" => 18, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Ekologiya va atrof muxit himoyasi", "syllabus_id" => 18, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Matematik analiz", "syllabus_id" => 18, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'zbek (rus ) tili ", "syllabus_id" => 18, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Programmalash asoslari", "syllabus_id" => 18, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Valeologeya asoslari", "syllabus_id" => 18, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Xorijiy til", "syllabus_id" => 18, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Algoritmlar va ma'lumotlar strukturalari", "syllabus_id" => 19, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Amaliy informatika", "syllabus_id" => 19, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Ekologiya va atrof muxit himoyasi", "syllabus_id" => 19, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Matematika ", "syllabus_id" => 19, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Matematik analiz", "syllabus_id" => 19, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O‘zbekiston eng yangi tarixi", "syllabus_id" => 19, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O'zbek/rus tili", "syllabus_id" => 19, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Parallel dasturlash", "syllabus_id" => 19, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Programmalash asoslari", "syllabus_id" => 19, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Xorijiy til", "syllabus_id" => 19, "semester_id" => 3]);

        \App\Models\Sciences::create(['name' => "Axborot tizimlari", "syllabus_id" => 19, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Kompyuter tarmoqlari", "syllabus_id" => 19, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Matematik analiz", "syllabus_id" => 19, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "O'zbek tilini sohada qo'llanilishi", "syllabus_id" => 19, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Parallel dasturlash", "syllabus_id" => 19, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Programmalash asoslari", "syllabus_id" => 19, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Xorijiy til", "syllabus_id" => 19, "semester_id" => 4]);

        \App\Models\Sciences::create(['name' => "Matematika ", "syllabus_id" => 20, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi", "syllabus_id" => 20, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'zbek (rus ) tili ", "syllabus_id" => 20, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'zbek tilini sohada qo'llanilishi", "syllabus_id" => 20, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Programmalash asoslari", "syllabus_id" => 20, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Valeologeya asoslari", "syllabus_id" => 20, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Xorijiy til", "syllabus_id" => 20, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Algoritmlar va ma'lumotlar strukturalari", "syllabus_id" => 20, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Amaliy informatika", "syllabus_id" => 20, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Ekologiya va atrof muxit himoyasi", "syllabus_id" => 20, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'zbek (rus ) tili ", "syllabus_id" => 20, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Programmalash asoslari", "syllabus_id" => 20, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Valeologeya asoslari", "syllabus_id" => 20, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Xorijiy til", "syllabus_id" => 20, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Fizika", "syllabus_id" => 21, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Foydali qazilmalarni boyitish va qayta ishlash asoslari/Rudalarni qayta ishlashga tayyorlash", "syllabus_id" => 21, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Geodeziya", "syllabus_id" => 21, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Geologeya va gidrogeologiya", "syllabus_id" => 21, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Kimyo", "syllabus_id" => 21, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Konchilik ishi asoslari", "syllabus_id" => 21, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Konchilik sohasiga kirish", "syllabus_id" => 21, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Muxandislik va kompyuter grafikasi", "syllabus_id" => 21, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Oliy matematika", "syllabus_id" => 21, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi", "syllabus_id" => 21, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O'zbek (rus)tili", "syllabus_id" => 21, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Texnik tizimlarda axborot texnologiyalari", "syllabus_id" => 21, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Valeologeya asoslari", "syllabus_id" => 21, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Xorijiy til", "syllabus_id" => 21, "semester_id" => 3]);

        \App\Models\Sciences::create(['name' => "Amaliy mexanika", "syllabus_id" => 21, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Burg'ilash va portlatish ishlari/Konchilikda fizik jarayonlar", "syllabus_id" => 21, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Geologeya va gidrogeologiya", "syllabus_id" => 21, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Gidravlika", "syllabus_id" => 21, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Konchilik ishi asoslari", "syllabus_id" => 21, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Oliy matematika", "syllabus_id" => 21, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Xorijiy til", "syllabus_id" => 21, "semester_id" => 4]);

        \App\Models\Sciences::create(['name' => "Fizika", "syllabus_id" => 22, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Geodeziya", "syllabus_id" => 22, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Konchilik sohasiga kirish", "syllabus_id" => 22, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Muxandislik va kompyuter grafikasi", "syllabus_id" => 22, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Oliy matematika", "syllabus_id" => 22, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi", "syllabus_id" => 22, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Fizika", "syllabus_id" => 22, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Marksheyderlik ishi/Kon geometriyasi", "syllabus_id" => 22, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Oliy matematika", "syllabus_id" => 22, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'zbek (rus)tili", "syllabus_id" => 22, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Texnik tizimlarda axborot texnologiyalari", "syllabus_id" => 22, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Valeologeya asoslari", "syllabus_id" => 22, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Amaliy o’zbek (rus) tili", "syllabus_id" => 23, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Axborot texnologiyalarini kasbiy faoliyatda qo’llash ", "syllabus_id" => 23, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Bolalarning ijtimoiy moslashuvi", "syllabus_id" => 23, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Bolalarni sahnalashtirish va ijodiy faoliyatga o’rgatish ", "syllabus_id" => 23, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Bolalar psixologiyasi va psixodiagnostikasi", "syllabus_id" => 23, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Falsafa  (ECTS 4)", "syllabus_id" => 23, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Kasbiy sohada xorijiy tillar ", "syllabus_id" => 23, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Maktabgacha talim-tarbiyani tashkil etish ", "syllabus_id" => 23, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O’zbekistonning eng yangi tarixi (ECTS 4)", "syllabus_id" => 23, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Bolalar psixologiyasi va psixodiagnostikasi", "syllabus_id" => 23, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Maktabgacha ta`limda STEAM texnologiyalari", "syllabus_id" => 23, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Maktabgacha talim-tarbiyani tashkil etish ", "syllabus_id" => 23, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Mediasavodxonlik va axborot madaniyati", "syllabus_id" => 23, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Tarbiyachining ish  hujjatlari", "syllabus_id" => 23, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Bolalar jismoniy tarbiyasi ", "syllabus_id" => 24, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Bolalarni sahnalashtirish va ijodiy faoliyatga o’rgatish ", "syllabus_id" => 24, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Bolalar psixologiyasi va psixodiagnostikasi", "syllabus_id" => 24, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Maktabgacha ta`limda STEAM texnologiyalari", "syllabus_id" => 24, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Maktabgacha talim-tarbiyani tashkil etish ", "syllabus_id" => 24, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Nutq o’stirish metodikasi ", "syllabus_id" => 24, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi", "syllabus_id" => 24, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Tarbiyachining ish  hujjatlari", "syllabus_id" => 24, "semester_id" => 3]);

        \App\Models\Sciences::create(['name' => "Bolalar jismoniy tarbiyasi ", "syllabus_id" => 24, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Maktabgacha ta`limda STEAM texnologiyalari", "syllabus_id" => 24, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Mediasavodxonlik va axborot madaniyati", "syllabus_id" => 24, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Nutq o’stirish metodikasi ", "syllabus_id" => 24, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Tarbiyachining ish  hujjatlari", "syllabus_id" => 24, "semester_id" => 4]);

        \App\Models\Sciences::create(['name' => "Bolalarning ijtimoiy moslashuvi", "syllabus_id" => 25, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Bolalarni sahnalashtirish va ijodiy faoliyatga o’rgatish ", "syllabus_id" => 25, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Bolalar psixologiyasi va psixodiagnostikasi", "syllabus_id" => 25, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Maktabgacha talim-tarbiyani tashkil etish ", "syllabus_id" => 25, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O’zbekistonning eng yangi tarixi (ECTS 4)", "syllabus_id" => 25, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Bolalarning ijtimoiy moslashuvi", "syllabus_id" => 25, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Bolalarni sahnalashtirish va ijodiy faoliyatga o’rgatish ", "syllabus_id" => 25, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Bolalar psixologiyasi va psixodiagnostikasi", "syllabus_id" => 25, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Maktabgacha talim-tarbiyani tashkil etish ", "syllabus_id" => 25, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Yangi innovatsiyalarni kasbiy faoliyatda qo’llash", "syllabus_id" => 25, "semester_id" => 2]);
    
        \App\Models\Sciences::create(['name' => "Amaliy matematika", "syllabus_id" => 26, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Iqtisodiyotda axborot kommunikatsion texnologiyalar va tizimlar", "syllabus_id" => 26, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Iqtisodiyot nazariyasi", "syllabus_id" => 26, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'zbek (rus) tili", "syllabus_id" => 26, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Xorijiy til (Ingliz, fransuz, nemis, koreys)", "syllabus_id" => 26, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Biznes matematika", "syllabus_id" => 26, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Falsafa", "syllabus_id" => 26, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Iqtisodiyot nazariyasi", "syllabus_id" => 26, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Iqtisodiy ta'limotlar tarixi", "syllabus_id" => 26, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Malakaviy amaliyot", "syllabus_id" => 26, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi", "syllabus_id" => 26, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O‘zbek tilini sohada qo‘llanilishi/                                 Kasbiy nutq mahorati", "syllabus_id" => 26, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Xorijiy til (Ingliz, fransuz, nemis, koreys)", "syllabus_id" => 26, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Amaliy matematika", "syllabus_id" => 27, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Biznes huquqi/ Kreativ fikrlash", "syllabus_id" => 27, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Biznes matematika", "syllabus_id" => 27, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Falsafa", "syllabus_id" => 27, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Iqtisodiyotda axborot kommunikatsion texnologiyalar va tizimlar", "syllabus_id" => 27, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Iqtisodiyot nazariyasi", "syllabus_id" => 27, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Iqtisodiy ta'limotlar tarixi", "syllabus_id" => 27, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Marketing", "syllabus_id" => 27, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi", "syllabus_id" => 27, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O'zbek (rus) tili", "syllabus_id" => 27, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Raqamli iqtisodiyot", "syllabus_id" => 27, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Xorijiy til (Ingliz, fransuz, nemis, koreys)", "syllabus_id" => 27, "semester_id" => 3]);

        \App\Models\Sciences::create(['name' => "Bank ishi/ Moliyaviy ma'lumotlar", "syllabus_id" => 27, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Biznes matematika", "syllabus_id" => 27, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Makroiqtisodiyot", "syllabus_id" => 27, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Mikroiqtisodiyot", "syllabus_id" => 27, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Moliya bozorlari, institutlar va instrumentlar", "syllabus_id" => 27, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Moliyaga kirish", "syllabus_id" => 27, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Xorijiy til (Ingliz, fransuz, nemis, koreys)", "syllabus_id" => 27, "semester_id" => 4]);

        \App\Models\Sciences::create(['name' => "Amaliy matematika", "syllabus_id" => 28, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Iqtisodiyotda axborot kommunikatsion texnologiyalar va tizimlar", "syllabus_id" => 28, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Iqtisodiyot nazariyasi", "syllabus_id" => 28, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'zbek (rus) tili", "syllabus_id" => 28, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Xorijiy til (Ingliz, fransuz, nemis, koreys)", "syllabus_id" => 28, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Falsafa", "syllabus_id" => 28, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Iqtisodiyot nazariyasi", "syllabus_id" => 28, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Iqtisodiy ta'limotlar tarixi", "syllabus_id" => 28, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi", "syllabus_id" => 28, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O‘zbek tilini sohada qo‘llanilishi/ Kasbiy nutq mahorati", "syllabus_id" => 28, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Xorijiy til (Ingliz, fransuz, nemis, koreys)", "syllabus_id" => 28, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Kognitiv psixologiya", "syllabus_id" => 30, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Maxsus fanlarni o`qitish metodikasi", "syllabus_id" => 30, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Yangi O`zbekiston taraqqiyot strategiyasida ta`lim tizimidagi islohotlar", "syllabus_id" => 30, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Din psixologiyasi", "syllabus_id" => 30, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Ilmiy tadqiqot metodologiyasi ", "syllabus_id" => 30, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Markaziy nerv sistemasi fiziologiyasi va oliy nerv faoliyati", "syllabus_id" => 30, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Neyropsixologiya ", "syllabus_id" => 30, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'qituvchining testologik madaniyati", "syllabus_id" => 30, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Pedagogik diagnostika", "syllabus_id" => 30, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Pedagogik faoliyatda stress psixologiyasi", "syllabus_id" => 30, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Salomatlikning ijtimoiy psixologiyasi", "syllabus_id" => 30, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Ekologiya va tabiatni muhofaza qilish", "syllabus_id" => 31, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Falsafa", "syllabus_id" => 31, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Ijtimoiy pedagogika", "syllabus_id" => 31, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Kasb psixologiyasi/Strees psixokorreksiyasi", "syllabus_id" => 31, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Ma’naviyatshunoslik", "syllabus_id" => 31, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Oliy matematika", "syllabus_id" => 31, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O‘zbekiston eng yangi tarixi", "syllabus_id" => 31, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O‘zbek (rus tili)", "syllabus_id" => 31, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Pedagogika nazariyasi va tarixi", "syllabus_id" => 31, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Psixologiya nazariyasi va tarixi", "syllabus_id" => 31, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Rivojlanish psixologiyasi va pedagogik psixologiya", "syllabus_id" => 31, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Shaxs psixologiyasi ", "syllabus_id" => 31, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Xorijiy til", "syllabus_id" => 31, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Yosh fiziologiyasi va gigiyenasi", "syllabus_id" => 31, "semester_id" => 3]);

        \App\Models\Sciences::create(['name' => "Ijtimoiy pedagogika", "syllabus_id" => 31, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "O‘zbek tilini sohada qo‘llanilishi", "syllabus_id" => 31, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Pedagogika nazariyasi va tarixi", "syllabus_id" => 31, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Psixodiagnostika va eksperimental psixologiya", "syllabus_id" => 31, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Rivojlanish psixologiyasi va pedagogik psixologiya", "syllabus_id" => 31, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Ta’limda axborot texnologiyalari", "syllabus_id" => 31, "semester_id" => 4]);

        \App\Models\Sciences::create(['name' => "Jismoniy tarbiya va sport", "syllabus_id" => 32, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O‘zbekiston eng yangi tarixi", "syllabus_id" => 32, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Pedagogika nazariyasi va tarixi", "syllabus_id" => 32, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Psixologiya nazariyasi va tarixi", "syllabus_id" => 32, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Valeologiya", "syllabus_id" => 32, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Xalq pedagogikasi/Pedagogik kompetentlik", "syllabus_id" => 32, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Xorijiy til", "syllabus_id" => 32, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Ma’naviyatshunoslik", "syllabus_id" => 32, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O‘zbek (rus tili)", "syllabus_id" => 32, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Pedagogika nazariyasi va tarixi", "syllabus_id" => 32, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Psixologiya nazariyasi va tarixi", "syllabus_id" => 32, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Shaxs psixologiyasi ", "syllabus_id" => 32, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Xorijiy til", "syllabus_id" => 32, "semester_id" => 2]);


        \App\Models\Sciences::create(['name' => "Anatomiya ", "syllabus_id" => 33, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Biofizika", "syllabus_id" => 33, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Biokimyo ", "syllabus_id" => 33, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Fiziologiya", "syllabus_id" => 33, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Gistologiya, sitologiya, embriologiya ", "syllabus_id" => 33, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Klinik restavratsion stomatologiya", "syllabus_id" => 33, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Lotin tili va tibbiy terminologiya ", "syllabus_id" => 33, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Mikrobiologiya, virusologiya, immunologiya ", "syllabus_id" => 33, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Ortopedik stomatologiya propedevtikasi", "syllabus_id" => 33, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi ", "syllabus_id" => 33, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O'zbek/rus tili", "syllabus_id" => 33, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Preklinik restavratsion stomatologiya", "syllabus_id" => 33, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Tibbiy biologiya. Umumiy genetika", "syllabus_id" => 33, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Tibbiy kimyo", "syllabus_id" => 33, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Tibbiyotda axbotot texnologiyalari", "syllabus_id" => 33, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Tibbiyotda xorijiy til/Jismoniy tarbiya va sport ", "syllabus_id" => 33, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Tibbiyot kasbiga kirish", "syllabus_id" => 33, "semester_id" => 3]);

        \App\Models\Sciences::create(['name' => "Biokimyo ", "syllabus_id" => 33, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Farmakologiya ", "syllabus_id" => 33, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Ikkilamchi deformatsiyalar va patologik yedirilish ", "syllabus_id" => 33, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Klinik restavratsion stomatologiya", "syllabus_id" => 33, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Mikrobiologiya, virusologiya, immunologiya ", "syllabus_id" => 33, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Ortopedik stomatologiya propedevtikasi", "syllabus_id" => 33, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Patologik anatomiya ", "syllabus_id" => 33, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Patologik fiziologiya", "syllabus_id" => 33, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Tibbiyot tarixi", "syllabus_id" => 33, "semester_id" => 4]);

        \App\Models\Sciences::create(['name' => "Anatomiya ", "syllabus_id" => 34, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Biofizika", "syllabus_id" => 34, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Lotin tili va tibbiy terminologiya ", "syllabus_id" => 34, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Preklinik restavratsion stomatologiya", "syllabus_id" => 34, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Tibbiy biologiya. Umumiy genetika", "syllabus_id" => 34, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Tibbiy kimyo", "syllabus_id" => 34, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Tibbiyotda axbotot texnologiyalari", "syllabus_id" => 34, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Tibbiyot kasbiga kirish", "syllabus_id" => 34, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Anatomiya ", "syllabus_id" => 34, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Biofizika", "syllabus_id" => 34, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Falsafa", "syllabus_id" => 34, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Fiziologiya", "syllabus_id" => 34, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Gistologiya, sitologiya, embriologiya ", "syllabus_id" => 34, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Lotin tili va tibbiy terminologiya ", "syllabus_id" => 34, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'zbekistonning eng yangi tarixi ", "syllabus_id" => 34, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'zbek/rus tili", "syllabus_id" => 34, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Preklinik restavratsion stomatologiya", "syllabus_id" => 34, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Tibbiy biologiya. Umumiy genetika", "syllabus_id" => 34, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Tibbiyot kasbiga kirish", "syllabus_id" => 34, "semester_id" => 2]);

        \App\Models\Sciences::create(['name' => "Arxeologiya va etnologiya", "syllabus_id" => 35, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Falsafa", "syllabus_id" => 35, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Fan va texnika tarixi", "syllabus_id" => 35, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Jahon tarixi", "syllabus_id" => 35, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Maxsus tarix fanlari", "syllabus_id" => 35, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Oliy matematika", "syllabus_id" => 35, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O'zbekiston tarixi", "syllabus_id" => 35, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "O'zbek (rus) tili", "syllabus_id" => 35, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Raqamli tarix", "syllabus_id" => 35, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Valeologiya", "syllabus_id" => 35, "semester_id" => 3]);
        \App\Models\Sciences::create(['name' => "Xorijiy til", "syllabus_id" => 35, "semester_id" => 3]);

        \App\Models\Sciences::create(['name' => "Jahon sivilizatsiyalari tarixi", "syllabus_id" => 35, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Jahon tarixi", "syllabus_id" => 35, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "O'zbekiston tarixi", "syllabus_id" => 35, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "O'zbek xalqi etnogenezi va etnik tarixi", "syllabus_id" => 35, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Sharq tillari", "syllabus_id" => 35, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Tarbiya", "syllabus_id" => 35, "semester_id" => 4]);
        \App\Models\Sciences::create(['name' => "Tarixiy geografiya", "syllabus_id" => 35, "semester_id" => 4]);

        \App\Models\Sciences::create(['name' => "Arxeologiya va etnologiya", "syllabus_id" => 36, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Jahon tarixi", "syllabus_id" => 36, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Maxsus tarix fanlari", "syllabus_id" => 36, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'zbekiston tarixi", "syllabus_id" => 36, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "O'zbek (rus) tili", "syllabus_id" => 36, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Valeologiya", "syllabus_id" => 36, "semester_id" => 1]);
        \App\Models\Sciences::create(['name' => "Xorijiy til", "syllabus_id" => 36, "semester_id" => 1]);

        \App\Models\Sciences::create(['name' => "Arxeologiya va etnologiya", "syllabus_id" => 36, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Jahon tarixi", "syllabus_id" => 36, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Maxsus tarix fanlari", "syllabus_id" => 36, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Oliy matematika", "syllabus_id" => 36, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "O'zbekiston tarixi", "syllabus_id" => 36, "semester_id" => 2]);
        \App\Models\Sciences::create(['name' => "Xorijiy til", "syllabus_id" => 36, "semester_id" => 2]);

    }
}

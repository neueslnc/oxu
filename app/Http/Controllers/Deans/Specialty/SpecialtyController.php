<?php

namespace App\Http\Controllers\Deans\Specialty;

use App\Domain\Deans\Groups\Models\DeanGroup;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TypeOfEducationModel;
use Illuminate\Support\Facades\Auth;
use App\Domain\Directions\Models\Direction;
use App\Domain\FormOfEducations\Models\FormOfEducation;
use App\Http\Requests\Deans\SpecialtyRequest;
use App\Models\Language;
use Illuminate\Support\Facades\DB;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('deans(dekan).specialty.typeEducation');
    }

    public function yonalishlar($type_id)
    {
        if ($type_id==1) {
//            $directions = DB::table('dean_groups')
//                ->join('directions','directions.id','=','dean_groups.direction_id')
//                ->join('form_of_education','form_of_education.id','=','dean_groups.form_of_education_id')
//                ->join('type_of_education','type_of_education.id','=','dean_groups.type_of_education_id')
//                ->join('languages','languages.id','=','dean_groups.language_id')
//                ->select('dean_groups.id','dean_groups.direction_id',
//                    'dean_groups.form_of_education_id','dean_groups.type_of_education_id','dean_groups.language_id',
//                    'directions.id','directions.title','form_of_education.id','form_of_education.title',
//                    'type_of_education.id','type_of_education.name','languages.id','languages.name'
//                )->where('dean_groups.form_of_education_id','=',1)
//                ->where('dean_groups.type_of_education_id','=',1)
//                ->groupBy('direction_id')
//                ->get();

            $directions = Direction::query()
                ->with(['get_form_of_education','get_language'])
                ->where('form_of_education_id','=',1)
                ->where('type_of_education_id','=',1)
                ->where('dean_id','=',45)
                ->get();
        }elseif ($type_id==2) {
//            $directions = DB::table('dean_groups')
//                ->join('directions','directions.id','=','dean_groups.direction_id')
//                ->join('form_of_education','form_of_education.id','=','dean_groups.form_of_education_id')
//                ->join('type_of_education','type_of_education.id','=','dean_groups.type_of_education_id')
//                ->join('languages','languages.id','=','dean_groups.language_id')
//                ->select('dean_groups.id','dean_groups.direction_id',
//                    'dean_groups.form_of_education_id','dean_groups.type_of_education_id','dean_groups.language_id',
//                    'directions.id','directions.title','form_of_education.id','form_of_education.title',
//                    'type_of_education.id','type_of_education.name','languages.id','languages.name'
//                )->where('dean_groups.form_of_education_id','=',1)
//                ->where('dean_groups.type_of_education_id','=',2)
//                ->groupBy('direction_id')
//                ->get();
            $directions = Direction::query()
                ->with(['get_form_of_education','get_language'])
                ->where('form_of_education_id','=',1)
                ->where('type_of_education_id','=',2)
                ->where('dean_id','=',45)
                ->get();
        }elseif($type_id==3) {
//            $directions=Direction::where('form_of_education_id','=',2)
//                ->orderBy('id','desc')
//                ->where('dean_id','=',Auth::user()->id)
//                ->get();
            $directions = Direction::query()
                ->with(['get_form_of_education','get_language'])
                ->where('form_of_education_id','=',2)
                ->where('dean_id','=',45)
                ->get();
        }elseif ($type_id==4) {
//            $directions = DB::table('dean_groups')
//                ->join('directions','directions.id','=','dean_groups.direction_id')
//                ->join('form_of_education','form_of_education.id','=','dean_groups.form_of_education_id')
//                ->join('type_of_education','type_of_education.id','=','dean_groups.type_of_education_id')
//                ->join('languages','languages.id','=','dean_groups.language_id')
//                ->select('dean_groups.id','dean_groups.direction_id',
//                    'dean_groups.form_of_education_id','dean_groups.type_of_education_id','dean_groups.language_id',
//                    'directions.id','directions.title','form_of_education.id','form_of_education.title',
//                    'type_of_education.id','type_of_education.name','languages.id','languages.name'
//                )->where('dean_groups.form_of_education_id','=',1)
//                ->where('dean_groups.type_of_education_id','=',4)
//                ->groupBy('direction_id')
//                ->get();
            $directions = Direction::query()
                ->with(['get_form_of_education','get_language'])
                ->where('form_of_education_id','=',1)
                ->where('type_of_education_id','=',4)
                ->where('dean_id','=',45)
                ->get();
        }
        return view('deans(dekan).specialty.index',compact('directions'));
    }

    public function yonalishlarMagistr($type_id)
    {
        $directions=Direction::query()
            ->where('dean_id','=',Auth::user()->id)
            ->where('form_of_education_id','=',$type_id)
            ->paginate(10);

        return view('deans(dekan).specialty.index',compact('directions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=FormOfEducation::get();
        $languages=Language::get();
        $forms=TypeOfEducationModel::get();
        // dd($types);
        return view('deans(dekan).specialty.create',compact('types','languages','forms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecialtyRequest $request)
    {
        // dd(Auth::user()->id );
        Direction::create(
            [
                'title' => $request->name,
                'code' => $request->code,
                'form_of_education_id'=> $request->type ,
                'type_of_education_id'=> $request->type_of_education_id ,
                'dean_id'=> Auth::user()->id ,
                'language_id'=>$request->language_id,
            ]
            );
            session()->flash('success',"Mutaxasislik yaratildi !");
            return redirect()->route('specialty.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Direction $specialty)
    {
        $types=FormOfEducation::get();
        $languages=Language::get();

        $direction=Direction::where('id','=',$specialty->id)->first();
        return view('deans(dekan).specialty.edit',compact('specialty','types','direction','languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpecialtyRequest $request, $id)
    {

        $edit=Direction::where('id', '=', $id)->update([
            'title' => $request->name,
            'code' => $request->code,
            'form_of_education_id'=> $request->type ,
            'language_id'=>$request->language_id,]);

            session()->flash('success',"Mutaxasislik o'zgartirildi !");
            return redirect()->route('specialty.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        // dd($id);
        Direction::where('id','=',$id)->delete();
        session()->flash('success',"Mutaxasislik o'chirildi !");
        return redirect()->route('specialty.index');
    }
}

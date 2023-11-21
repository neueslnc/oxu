<?php

namespace App\Http\Controllers\Directions;

use App\Domain\Directions\Actions\StoreDirectionAction;
use App\Domain\Directions\Actions\UpdateDirectionAction;
use App\Domain\Directions\DTO\StoreDirectionDTO;
use App\Domain\Directions\DTO\UpdateDirectionDTO;
use App\Domain\Directions\Models\Direction;
use App\Domain\Directions\Requests\StoreDirectionRequest;
use App\Domain\Directions\Requests\UpdateDirectionRequest;
use App\Http\Controllers\Controller;
use App\Domain\Directions\Repositories\DirectionRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DirectionController extends Controller
{
    public $directions;

    /**
     * @param DirectionRepository $directionRepository
     */
    public function __construct(DirectionRepository $directionRepository)
    {
        $this->directions = $directionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('directions.index', ['directions' => $this->directions->getPaginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('directions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDirectionRequest $request
     * @param StoreDirectionAction $action
     * @return RedirectResponse
     */
    public function store(StoreDirectionRequest $request, StoreDirectionAction $action)
    {
        try {
            $dto = StoreDirectionDTO::fromArray($request->all());
            $action->execute($dto);
        } catch (Exception $exception) {
            return redirect()->back();
        }
        return redirect()->route('directories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Direction $direction
     * @return \Illuminate\Http\Response
     */
    public function show(Direction $direction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Direction $direction
     * @return Application|Factory|View
     */
    public function edit(Direction $direction)
    {
        return view('directions.edit', ['direction' => $direction]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDirectionRequest $request
     * @param Direction $direction
     * @param UpdateDirectionAction $action
     * @return RedirectResponse
     */
    public function update(UpdateDirectionRequest $request, Direction $direction, UpdateDirectionAction $action)
    {
        try {
            $request->merge([
                'direction' => $direction
            ]);
            $dto = UpdateDirectionDTO::fromArray($request->all());
            $action->execute($dto);
        } catch (Exception $exception) {
            return redirect()->back();
        }
        return redirect()->route('directories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Direction $direction
     * @return RedirectResponse
     */
    public function destroy(Direction $direction)
    {
        $direction->delete();

        return redirect()->back();
    }

    public function getDirectionType(Request $request)
    {
        if($request->form_of_education == 1){
            $directions = Direction::query()
                ->where('form_of_education_id', '=', 1)
                ->where('type_of_education_id', '=', 1)
                ->where('dean_id','=',Auth::user()->id)
                ->get();
            return response()
                ->json([
                    'status' => true,
                    'data' => $directions
                ]);
        }
        if($request->form_of_education == 2){
            $directions = Direction::query()
                ->where('form_of_education_id', '=', 1)
                ->where('type_of_education_id', '=', 2)
                ->where('dean_id','=',Auth::user()->id)
                ->get();
            return response()
                ->json([
                    'status' => true,
                    'data' => $directions
                ]);
        }
        if($request->form_of_education == 4){
            $directions = Direction::query()
                ->where('form_of_education_id', '=', 1)
                ->where('type_of_education_id', '=', 4)
                ->where('dean_id','=',Auth::user()->id)
                ->get();
            return response()
                ->json([
                    'status' => true,
                    'data' => $directions
                ]);
        }
        if($request->form_of_education == 3){
            $directions = Direction::query()
                ->where('form_of_education_id', '=', 2)
                ->get();

            return response()
                ->json([
                    'status' => true,
                    'data' => $directions
                ]);
        }
    }
}

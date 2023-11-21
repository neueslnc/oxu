<?php

namespace App\Http\Controllers\FormOfEducations;

use App\Domain\FormOfEducations\Actions\StoreFormOfEducationAction;
use App\Domain\FormOfEducations\Actions\UpdateFormOfEducationAction;
use App\Domain\FormOfEducations\DTO\StoreFormOfEducationDTO;
use App\Domain\FormOfEducations\DTO\UpdateFormOfEducationDTO;
use App\Domain\FormOfEducations\Models\FormOfEducation;
use App\Domain\FormOfEducations\Repositories\FormOfEducationRepository;
use App\Domain\FormOfEducations\Requests\StoreFormOfEducationRequest;
use App\Domain\FormOfEducations\Requests\UpdateFormOfEducationRequest;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormOfEducationController extends Controller
{
    /**
     * @var FormOfEducationRepository
     */
    public $educations;

    /**
     * @param FormOfEducationRepository $formOfEducationRepository
     */
    public function __construct(FormOfEducationRepository $formOfEducationRepository)
    {
        $this->educations = $formOfEducationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('form_of_educations.index', [
            'educations' => $this->educations->getPaginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('form_of_educations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFormOfEducationRequest $request
     * @param StoreFormOfEducationAction $action
     * @return RedirectResponse
     */
    public function store(StoreFormOfEducationRequest $request, StoreFormOfEducationAction $action): RedirectResponse
    {
        try {
            $dto = StoreFormOfEducationDTO::fromArray($request->all());
            $action->execute($dto);
        } catch (Exception $exception) {
            return redirect()->back();
        }

        return redirect()->route('form_of_educations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FormOfEducation $form_of_education
     * @return Application|Factory|View
     */
    public function edit(FormOfEducation $form_of_education): View|Factory|Application
    {
        return view('form_of_educations.edit', [
            'education' => $form_of_education
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFormOfEducationRequest $request
     * @param FormOfEducation $form_of_education
     * @param UpdateFormOfEducationAction $action
     * @return RedirectResponse
     */
    public function update(UpdateFormOfEducationRequest $request, FormOfEducation $form_of_education, UpdateFormOfEducationAction $action): RedirectResponse
    {
        try {
            $request->merge([
                'form_of_education' => $form_of_education
            ]);
            $dto = UpdateFormOfEducationDTO::fromArray($request->all());
            $action->execute($dto);
        } catch (Exception $exception) {
            return redirect()->back();
        }

        return redirect()->route('form_of_educations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param FormOfEducation $form_of_education
     * @return RedirectResponse
     */
    public function destroy(FormOfEducation $form_of_education): RedirectResponse
    {
        $form_of_education->delete();

        return redirect()->back();
    }
}

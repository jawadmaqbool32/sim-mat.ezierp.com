<?php

namespace App\Http\Controllers;

use App\DataTables\MandatoryQuestionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMandatoryQuestionRequest;
use App\Http\Requests\UpdateMandatoryQuestionRequest;
use App\Repositories\MandatoryQuestionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MandatoryQuestionController extends AppBaseController
{
    /** @var MandatoryQuestionRepository $mandatoryQuestionRepository*/
    private $mandatoryQuestionRepository;

    public function __construct(MandatoryQuestionRepository $mandatoryQuestionRepo)
    {
        $this->mandatoryQuestionRepository = $mandatoryQuestionRepo;
    }

    /**
     * Display a listing of the MandatoryQuestion.
     *
     * @param MandatoryQuestionDataTable $mandatoryQuestionDataTable
     *
     * @return Response
     */
    public function index(MandatoryQuestionDataTable $mandatoryQuestionDataTable)
    {
        return $mandatoryQuestionDataTable->render('mandatory_questions.index');
    }

    /**
     * Show the form for creating a new MandatoryQuestion.
     *
     * @return Response
     */
    public function create()
    {
        return view('mandatory_questions.create');
    }

    /**
     * Store a newly created MandatoryQuestion in storage.
     *
     * @param CreateMandatoryQuestionRequest $request
     *
     * @return Response
     */
    public function store(CreateMandatoryQuestionRequest $request)
    {
        $input = $request->all();

        $mandatoryQuestion = $this->mandatoryQuestionRepository->create($input);

        Flash::success('Mandatory Question saved successfully.');

        return redirect(route('mandatoryQuestions.index'));
    }

    /**
     * Display the specified MandatoryQuestion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mandatoryQuestion = $this->mandatoryQuestionRepository->find($id);

        if (empty($mandatoryQuestion)) {
            Flash::error('Mandatory Question not found');

            return redirect(route('mandatoryQuestions.index'));
        }

        return view('mandatory_questions.show')->with('mandatoryQuestion', $mandatoryQuestion);
    }

    /**
     * Show the form for editing the specified MandatoryQuestion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mandatoryQuestion = $this->mandatoryQuestionRepository->find($id);

        if (empty($mandatoryQuestion)) {
            Flash::error('Mandatory Question not found');

            return redirect(route('mandatoryQuestions.index'));
        }

        return view('mandatory_questions.edit')->with('mandatoryQuestion', $mandatoryQuestion);
    }

    /**
     * Update the specified MandatoryQuestion in storage.
     *
     * @param int $id
     * @param UpdateMandatoryQuestionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMandatoryQuestionRequest $request)
    {
        $mandatoryQuestion = $this->mandatoryQuestionRepository->find($id);

        if (empty($mandatoryQuestion)) {
            Flash::error('Mandatory Question not found');

            return redirect(route('mandatoryQuestions.index'));
        }

        $mandatoryQuestion = $this->mandatoryQuestionRepository->update($request->all(), $id);

        Flash::success('Mandatory Question updated successfully.');

        return redirect(route('mandatoryQuestions.index'));
    }

    /**
     * Remove the specified MandatoryQuestion from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mandatoryQuestion = $this->mandatoryQuestionRepository->find($id);

        if (empty($mandatoryQuestion)) {
            Flash::error('Mandatory Question not found');

            return redirect(route('mandatoryQuestions.index'));
        }

        $this->mandatoryQuestionRepository->delete($id);

        Flash::success('Mandatory Question deleted successfully.');

        return redirect(route('mandatoryQuestions.index'));
    }

    public function preview(MandatoryQuestionDataTable $mandatoryQuestionDataTable)
    {

        return $mandatoryQuestionDataTable->render('mandatory_questions.preview');

    }
}

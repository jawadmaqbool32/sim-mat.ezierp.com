<?php

namespace App\Http\Controllers;

use App\DataTables\QuestionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Repositories\QuestionRepository;
use App\Repositories\SectionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class QuestionController extends AppBaseController
{
    /** @var QuestionRepository $questionRepository*/
    private $questionRepository;

    public function __construct(QuestionRepository $questionRepo, SectionRepository $sectionRepo)
    {
        $this->questionRepository = $questionRepo;
        $this->sectionRepository = $sectionRepo;
    }

    /**
     * Display a listing of the Question.
     *
     * @param QuestionDataTable $questionDataTable
     *
     * @return Response
     */
    public function index(QuestionDataTable $questionDataTable)
    {
        return $questionDataTable->render('questions.index');
    }

    /**
     * Show the form for creating a new Question.
     *
     * @return Response
     */
    public function create()
    {
        $section = $this->sectionRepository->all();
        $section = $section->pluck('name', 'id');

        return view('questions.create')->with('section', $section);
    }

    /**
     * Store a newly created Question in storage.
     *
     * @param CreateQuestionRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionRequest $request)
    {
        $input = $request->all();

        $question = $this->questionRepository->create($input);

        Flash::success('Question saved successfully.');

        return redirect(route('questions.index'));
    }

    /**
     * Display the specified Question.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $question = $this->questionRepository->find($id);

        if (empty($question)) {
            Flash::error('Question not found');

            return redirect(route('questions.index'));
        }

        return view('questions.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified Question.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $question = $this->questionRepository->find($id);
        $section = $this->sectionRepository->all();
        $section = $section->pluck('name', 'id');
        if (empty($question)) {
            Flash::error('Question not found');

            return redirect(route('questions.index'));
        }

        return view('questions.edit')->with('question', $question)->with('section', $section);
    }

    /**
     * Update the specified Question in storage.
     *
     * @param int $id
     * @param UpdateQuestionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionRequest $request)
    {
        $question = $this->questionRepository->find($id);

        if (empty($question)) {
            Flash::error('Question not found');

            return redirect(route('questions.index'));
        }

        $question = $this->questionRepository->update($request->all(), $id);

        Flash::success('Question updated successfully.');

        return redirect(route('questions.index'));
    }

    /**
     * Remove the specified Question from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $question = $this->questionRepository->find($id);

        if (empty($question)) {
            Flash::error('Question not found');

            return redirect(route('questions.index'));
        }

        $this->questionRepository->delete($id);

        Flash::success('Question deleted successfully.');

        return redirect(route('questions.index'));
    }
}

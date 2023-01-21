<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMandatoryQuestionAPIRequest;
use App\Http\Requests\API\UpdateMandatoryQuestionAPIRequest;
use App\Models\MandatoryQuestion;
use App\Repositories\MandatoryQuestionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MandatoryQuestionController
 * @package App\Http\Controllers\API
 */

class MandatoryQuestionAPIController extends AppBaseController
{
    /** @var  MandatoryQuestionRepository */
    private $mandatoryQuestionRepository;

    public function __construct(MandatoryQuestionRepository $mandatoryQuestionRepo)
    {
        $this->mandatoryQuestionRepository = $mandatoryQuestionRepo;
    }

    /**
     * Display a listing of the MandatoryQuestion.
     * GET|HEAD /mandatoryQuestions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $mandatoryQuestions = $this->mandatoryQuestionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($mandatoryQuestions->toArray(), 'Mandatory Questions retrieved successfully');
    }

    /**
     * Store a newly created MandatoryQuestion in storage.
     * POST /mandatoryQuestions
     *
     * @param CreateMandatoryQuestionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMandatoryQuestionAPIRequest $request)
    {
        $input = $request->all();

        $mandatoryQuestion = $this->mandatoryQuestionRepository->create($input);

        return $this->sendResponse($mandatoryQuestion->toArray(), 'Mandatory Question saved successfully');
    }

    /**
     * Display the specified MandatoryQuestion.
     * GET|HEAD /mandatoryQuestions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MandatoryQuestion $mandatoryQuestion */
        $mandatoryQuestion = $this->mandatoryQuestionRepository->find($id);

        if (empty($mandatoryQuestion)) {
            return $this->sendError('Mandatory Question not found');
        }

        return $this->sendResponse($mandatoryQuestion->toArray(), 'Mandatory Question retrieved successfully');
    }

    /**
     * Update the specified MandatoryQuestion in storage.
     * PUT/PATCH /mandatoryQuestions/{id}
     *
     * @param int $id
     * @param UpdateMandatoryQuestionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMandatoryQuestionAPIRequest $request)
    {
        $input = $request->all();

        /** @var MandatoryQuestion $mandatoryQuestion */
        $mandatoryQuestion = $this->mandatoryQuestionRepository->find($id);

        if (empty($mandatoryQuestion)) {
            return $this->sendError('Mandatory Question not found');
        }

        $mandatoryQuestion = $this->mandatoryQuestionRepository->update($input, $id);

        return $this->sendResponse($mandatoryQuestion->toArray(), 'MandatoryQuestion updated successfully');
    }

    /**
     * Remove the specified MandatoryQuestion from storage.
     * DELETE /mandatoryQuestions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MandatoryQuestion $mandatoryQuestion */
        $mandatoryQuestion = $this->mandatoryQuestionRepository->find($id);

        if (empty($mandatoryQuestion)) {
            return $this->sendError('Mandatory Question not found');
        }

        $mandatoryQuestion->delete();

        return $this->sendSuccess('Mandatory Question deleted successfully');
    }
}

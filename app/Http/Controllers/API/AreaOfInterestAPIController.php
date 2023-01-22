<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAreaOfInterestAPIRequest;
use App\Http\Requests\API\UpdateAreaOfInterestAPIRequest;
use App\Models\AreaOfInterest;
use App\Repositories\AreaOfInterestRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AreaOfInterestController
 * @package App\Http\Controllers\API
 */

class AreaOfInterestAPIController extends AppBaseController
{
    /** @var  AreaOfInterestRepository */
    private $areaOfInterestRepository;

    public function __construct(AreaOfInterestRepository $areaOfInterestRepo)
    {
        $this->areaOfInterestRepository = $areaOfInterestRepo;
    }

    /**
     * Display a listing of the AreaOfInterest.
     * GET|HEAD /areaOfInterests
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $areaOfInterests = $this->areaOfInterestRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($areaOfInterests->toArray(), 'Area Of Interests retrieved successfully');
    }

    /**
     * Store a newly created AreaOfInterest in storage.
     * POST /areaOfInterests
     *
     * @param CreateAreaOfInterestAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAreaOfInterestAPIRequest $request)
    {
        $input = $request->all();

        $areaOfInterest = $this->areaOfInterestRepository->create($input);

        return $this->sendResponse($areaOfInterest->toArray(), 'Area Of Interest saved successfully');
    }

    /**
     * Display the specified AreaOfInterest.
     * GET|HEAD /areaOfInterests/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AreaOfInterest $areaOfInterest */
        $areaOfInterest = $this->areaOfInterestRepository->find($id);

        if (empty($areaOfInterest)) {
            return $this->sendError('Area Of Interest not found');
        }

        return $this->sendResponse($areaOfInterest->toArray(), 'Area Of Interest retrieved successfully');
    }

    /**
     * Update the specified AreaOfInterest in storage.
     * PUT/PATCH /areaOfInterests/{id}
     *
     * @param int $id
     * @param UpdateAreaOfInterestAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAreaOfInterestAPIRequest $request)
    {
        $input = $request->all();

        /** @var AreaOfInterest $areaOfInterest */
        $areaOfInterest = $this->areaOfInterestRepository->find($id);

        if (empty($areaOfInterest)) {
            return $this->sendError('Area Of Interest not found');
        }

        $areaOfInterest = $this->areaOfInterestRepository->update($input, $id);

        return $this->sendResponse($areaOfInterest->toArray(), 'AreaOfInterest updated successfully');
    }

    /**
     * Remove the specified AreaOfInterest from storage.
     * DELETE /areaOfInterests/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AreaOfInterest $areaOfInterest */
        $areaOfInterest = $this->areaOfInterestRepository->find($id);

        if (empty($areaOfInterest)) {
            return $this->sendError('Area Of Interest not found');
        }

        $areaOfInterest->delete();

        return $this->sendSuccess('Area Of Interest deleted successfully');
    }
}

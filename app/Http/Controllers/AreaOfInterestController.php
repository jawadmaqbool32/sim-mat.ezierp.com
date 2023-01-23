<?php

namespace App\Http\Controllers;

use App\DataTables\AreaOfInterestDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAreaOfInterestRequest;
use App\Http\Requests\UpdateAreaOfInterestRequest;
use App\Repositories\AreaOfInterestRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\User;

class AreaOfInterestController extends AppBaseController
{
    /** @var AreaOfInterestRepository $areaOfInterestRepository*/
    private $areaOfInterestRepository;

    public function __construct(AreaOfInterestRepository $areaOfInterestRepo)
    {
        $this->areaOfInterestRepository = $areaOfInterestRepo;
    }

    /**
     * Display a listing of the AreaOfInterest.
     *
     * @param AreaOfInterestDataTable $areaOfInterestDataTable
     *
     * @return Response
     */
    public function index(AreaOfInterestDataTable $areaOfInterestDataTable)
    {
        return $areaOfInterestDataTable->render('area_of_interests.index');
    }

    /**
     * Show the form for creating a new AreaOfInterest.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::whereHas('userRole', function($q){
           return $q->where('role_id', 3);
        })->pluck('name', 'id');

        $parent_id = $this->areaOfInterestRepository->all();
        $parent_id = $parent_id->where('parent_id', Null)->pluck('name', 'id');

        return view('area_of_interests.create')->with('parent_id', $parent_id)->with('users', $users);
    }

    /**
     * Store a newly created AreaOfInterest in storage.
     *
     * @param CreateAreaOfInterestRequest $request
     *
     * @return Response
     */
    public function store(CreateAreaOfInterestRequest $request)
    {
        $input = $request->all();

        $areaOfInterest = $this->areaOfInterestRepository->create($input);

        Flash::success('Area Of Interest saved successfully.');

        return redirect(route('areaOfInterests.index'));
    }

    /**
     * Display the specified AreaOfInterest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $areaOfInterest = $this->areaOfInterestRepository->find($id);

        if (empty($areaOfInterest)) {
            Flash::error('Area Of Interest not found');

            return redirect(route('areaOfInterests.index'));
        }

        return view('area_of_interests.show')->with('areaOfInterest', $areaOfInterest);
    }

    /**
     * Show the form for editing the specified AreaOfInterest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $areaOfInterest = $this->areaOfInterestRepository->find($id);

        $parent_id = $this->areaOfInterestRepository->all();
        $parent_id = $parent_id->where('parent_id', Null)->pluck('name', 'id');

        $users = User::whereHas('userRole', function($q){
            return $q->where('role_id', 3);
         })->pluck('name', 'id');


        if (empty($areaOfInterest)) {
            Flash::error('Area Of Interest not found');

            return redirect(route('areaOfInterests.index'));
        }

        return view('area_of_interests.edit')->with('areaOfInterest', $areaOfInterest)->with('parent_id', $parent_id)->with('users', $users);
    }

    /**
     * Update the specified AreaOfInterest in storage.
     *
     * @param int $id
     * @param UpdateAreaOfInterestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAreaOfInterestRequest $request)
    {
        $areaOfInterest = $this->areaOfInterestRepository->find($id);

        if (empty($areaOfInterest)) {
            Flash::error('Area Of Interest not found');

            return redirect(route('areaOfInterests.index'));
        }

        $areaOfInterest = $this->areaOfInterestRepository->update($request->all(), $id);

        Flash::success('Area Of Interest updated successfully.');

        return redirect(route('areaOfInterests.index'));
    }

    /**
     * Remove the specified AreaOfInterest from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $areaOfInterest = $this->areaOfInterestRepository->find($id);

        if (empty($areaOfInterest)) {
            Flash::error('Area Of Interest not found');

            return redirect(route('areaOfInterests.index'));
        }

        $this->areaOfInterestRepository->delete($id);

        Flash::success('Area Of Interest deleted successfully.');

        return redirect(route('areaOfInterests.index'));
    }
}

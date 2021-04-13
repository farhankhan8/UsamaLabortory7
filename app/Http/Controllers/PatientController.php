<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAvailableTestRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\SoreAvailableTestRequest;
use App\Http\Requests\UpdateAvailableTestRequest;
use App\Room;
use App\AvailableTest;
use App\TestPerformed;
use Session;

use App\Catagory;

use App\Services\EventService;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PatientController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events  = User::all();

        return view('admin.patient.index', compact('events'));
    }
    public function create()
    {
        // abort_if(Gate::denies('room_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
         $rooms = Catagory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


        return view('admin.availableTests.create',compact('rooms'));
    }
 


    public function store(SoreAvailableTestRequest $request)
    {
        $room = AvailableTest::create($request->all());

        return redirect()->route('available-tests');


    }
    public function edit($id)
    {
        $room = User::findOrFail($id);

        // abort_if(Gate::denies('room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.patient.edit', compact('room'));
    }
    
    public function update($id, Request $request)
{
    $task = User::findOrFail($id);



    $input = $request->all();

    $task->fill($input)->save();

    Session::flash('flash_message', 'Task successfully added!');

    return redirect()->route('patient-list');
}

    public function show($id)
    {
        $rooms = User::findOrFail($id);

        return view('admin.patient.show', compact('rooms'));
    }

    public function destroy($id)
    {
        $task = User::findOrFail($id);
    
        $task->delete();
    
        Session::flash('flash_message', 'Task successfully deleted!');
    
        return redirect()->route('patient-list');
    }

    public function massDestroy(MassDestroyEventRequest $request)
    {
        Event::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}

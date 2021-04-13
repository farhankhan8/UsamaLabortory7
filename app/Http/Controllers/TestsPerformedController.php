<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\StoreTestPerformedRequest;

use App\Http\Requests\UpdateEventRequest;
use App\Room;
use App\AvailableTest;
use App\TestPerformed;
use App\Test;
use Session;


use App\Catagory;
use App\Services\EventService;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestsPerformedController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = Test::all();
        //   dd($events)

        return view('admin.TestPerformed.index', compact('events'));
    }

    public function create()
    {
        // abort_if(Gate::denies('event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $availableTests = AvailableTest::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


        // $rooms = Catagory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        // $availableTests = AvailableTest::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


        // $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.TestPerformed.create', compact('users','availableTests'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);

        Test::create($input);
        return redirect()->route('tests-performed');




    }
    // public function store(StoreEventRequest $request, EventService $eventService)
    // {
    //     if ($eventService->isRoomTaken($request->all())) {
    //         return redirect()->back()
    //                 ->withInput($request->input())
    //                 ->withErrors('This room is not available at the time you have chosen');
    //     }

    //     $event = Event::create($request->all());

    //     if ($request->filled('recurring_until')) {
    //         $eventService->createRecurringEvents($request->all());
    //     }

    //     return redirect()->route('admin.events.index');

    // }

    public function edit($id)
    {
        $event  = Test::findOrFail($id);
        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $rooms = AvailableTest::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


        // abort_if(Gate::denies('room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.TestPerformed.edit', compact('event','rooms','users'));
    }
    // public function edit(Event $event)
    // {
    //     abort_if(Gate::denies('event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $rooms = Room::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

    //     $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

    //     $event->load('room', 'user');

    //     return view('admin.events.edit', compact('rooms', 'users', 'event'));
    // }

    public function update($id, Request $request)
    {
        $task = Test::findOrFail($id);

        // $this->validate($request, [
        //     'title' => 'required',
        //     'description' => 'required'
        // ]);
    
        $input = $request->all();
    
        $task->fill($input)->save();
    
        Session::flash('flash_message', 'Task successfully added!');
    
        return redirect()->route('tests-performed');
        // $event->update($request->all());

        // return redirect()->route('admin.events.index');

    }
    public function show($id)
    {
        
        $rooms = Test::findOrFail($id);
        // dd($rooms);

        return view('admin.TestPerformed.show', compact('rooms'));
    }

    // public function show(Event $event)
    // {
    //     abort_if(Gate::denies('event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $event->load('room', 'user');

    //     return view('admin.events.show', compact('event'));
    // }

    public function destroy($id)
    {
        $task = Test::findOrFail($id);
    
        $task->delete();
    
        Session::flash('flash_message', 'Task successfully deleted!');
    
        return redirect()->route('tests-performed');

    }

    public function massDestroy(MassDestroyEventRequest $request)
    {
        Event::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}

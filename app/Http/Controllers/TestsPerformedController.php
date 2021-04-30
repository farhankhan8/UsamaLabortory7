<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\StoreTestPerformedRequest;
use DB;
use App\AvailableTest;
use App\Patient;
use App\TestPerformed;
use App\Http\Requests\UpdateEventRequest;
use App\Room;
// use App\AvailableTest;
use App\AvailableTestPatient;
use App\Test;
use App\Status;
use App\Tag;
use App\Artical;
use Session;
use App\Catagory;
use App\Services\EventService;
// use App\Patient;
use App\Ahmed;
use App\Role1;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestsPerformedController extends Controller
{
    // $a = Artical::first();
    // $b= $a->tags;
    // dd($b);
    public function index()
    {
        $events = DB::table('test_performeds')
           ->join('patients', 'test_performeds.patient_id', '=', 'patients.id')
            ->join('available_tests', 'test_performeds.available_test_id', '=', 'available_tests.id')
            ->join('catagories', '.available_tests.catagory_id', '=', 'catagories.id')

            ->select('test_performeds.*', 'patients.Pname','patients.dob','available_tests.name','available_tests.testFee','available_tests.initialNormalValue','available_tests.finalNormalValue','available_tests.units','catagories.Cname')
            ->orderBy('patient_id', 'DESC')
            // ->orderBy('available_test_id', 'DESC')


            ->get();
    //  dd($events);


        return view('admin.TestPerformed.index', compact('events'));
    }

    public function create()
    {
        //  abort_if(Gate::denies('event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = Patient::all()->pluck('Pname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $availableTests = AvailableTest::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        //  $sta = Status::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');
        //  dd($sta);

        // $sta = Status::get();


        // $rooms = Catagory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        // $availableTests = AvailableTest::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


        // $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.TestPerformed.create', compact('users','availableTests'));
    }

    public function store(Request $request)
    {
        
        $input = $request->all();
        TestPerformed::create($input);
        // $results = Table::latest('datetime')->first();

        // $artica = Artical::latest('name');
        // $ta = Tag::latest();
        // $artica->tags()->attach($ta);
       
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
             abort_if(Gate::denies('room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $performed  = TestPerformed::findOrFail($id);
        $getNameFromAvailbles = AvailableTest::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $patientNames = Patient::all()->pluck('Pname', 'id')->prepend(trans('global.pleaseSelect'), '');
        $states = TestPerformed::all()->pluck('state', 'id')->prepend(trans('global.pleaseSelect'), '');


        // $testPerformed = TestPerformed::findOrFail($id);

        // dd($rooms);

 
        // abort_if(Gate::denies('room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.TestPerformed.edit', compact('performed','getNameFromAvailbles','patientNames','states'));
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
        $task = TestPerformed::findOrFail($id);
        // dd($task);

        // $this->validate($request, [
        //     'title' => 'required',
        //     'description' => 'required'
        // ]);
    
        $input = $request->all();
    // dd($input);
        $task->fill($input)->save();
        // dd("ok");
    
        Session::flash('flash_message', 'Task successfully added!');
    
        return redirect()->route('tests-performed');
        // $event->update($request->all());

        // return redirect()->route('admin.events.index'); 

    }
    public function show($id)
    {
        abort_if(Gate::denies('event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
// dd("farhan");
        // $rooms = AvailableTestPatient::findOrFail($id);
        $roo = TestPerformed::findOrFail($id);
        //  dd($b);
         $a = $roo->patient;
         $b = $roo->availableTest;
        // $roo = TestP::findOrFail($id);
        // $a = $roo->patient;
        // dd($rooms);

        return view('admin.TestPerformed.show', compact('roo','a','b'));
    }


    public function destroy($id)
    {
        $task = TestPerformed::findOrFail($id);
    
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateeventRequest;
use Flash;
use Response;

class EventController extends Controller
{

    /**
     * Show the form for creating a new event.
     *
     * @return Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created event in storage.
     *
     * @param CreateeventRequest $request
     *
     * @return Response
     */
    public function store(CreateeventRequest $request)
    {
        $input = $request->all();

        $event = $this->eventRepository->create($input);

        Flash::success('Event saved successfully.');

        return redirect(route('events.index'));
    }
}

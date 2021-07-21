<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::check()) {
            $events = Event::latest()->paginate(5);
            return view('events.index', compact('events'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::check()) {
            $categories = Category::all();
            return view('events.create', compact('categories'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'title' => 'required',
            'categories_id' => 'required',
            'description' => 'required',
            'location' => 'required',
            'dateTime' => 'required',
            'priceAdult' => 'required',
            'priceKid' => 'required',
            'available' => 'required',
            'inventory' => 'required',
        ]);

        $data = $request->all();
        $file = $request->file('image');

        $filename = 'event-photo-' . time() . '.' . $file->getClientOriginalExtension();
        $data['image'] = $filename;

        $path = $file->storeAs('public/imgs', $filename);

        Event::create($data);

        return redirect()->route('events.index')
            ->with('success', 'Evento guardado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        if (Auth::check()) {
            $categories = Category::find($event->categories_id);
            return view('events.show', compact('event', 'categories'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        if (Auth::check()) {
            $categories = Category::all();
            return view('events.edit', compact('event', 'categories'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'title' => 'required',
            'categories_id' => 'required',
            'description' => 'required',
            'location' => 'required',
            'dateTime' => 'required',
            'priceAdult' => 'required',
            'priceKid' => 'required',
            'available' => 'required',
            'inventory' => 'required',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Actualizacion exitoza');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Evento eliminado correctamente');
    }
}

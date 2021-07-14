<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){

        $categories = Category::all();
        $events = Event::all();
        return view('public.index',compact('events', 'categories'));
    }

    public function show(Event $event){

        $categories = Category::all();
        return view('public.event',compact('event', 'categories'));
    }
}
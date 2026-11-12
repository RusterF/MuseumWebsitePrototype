<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request): View
    {
        $events = Event::where('status', 'PUBLISH')
            ->orderBy('date', 'desc')
            ->paginate(8)
            ->withQueryString();

        return view('frontend.events.index', compact('events'));
    }

    public function show(string $slug): View
    {
        $event = Event::with('bookings')
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedEvents = Event::where('id', '!=', $event->id)
            ->where('status', 'PUBLISH')
            ->limit(3)
            ->get();

        return view('frontend.events.show', compact('event', 'relatedEvents'));
    }
}

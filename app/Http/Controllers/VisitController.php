<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;


class VisitController extends Controller
{
    public function index()
    {

        $upcomingVisits = Visit::where('visit_time', '>', now())->get();
        $pastVisits = Visit::where('visit_time', '<', now())->get();

        return view('visit', compact('upcomingVisits', 'pastVisits'));
    }

    public function create()
    {
        return view('visits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'visit_id',
            'group_id' => 'required',
            'visit_author' => 'required',
            'visit_time' => 'required',
        ]);

        $groupId = $request->input('group_id');
        $groupName = $request->input('group_name');

        Visit::create($request->all());
        $upcomingVisits = Visit::where('group_id', $groupId)
            ->where('visit_time', '>', now())
            ->get();
        $pastVisits = Visit::where('group_id', $groupId)
            ->where('visit_time', '<', now())
            ->get();

        $visits = Visit::where('group_id', $groupId)->get();

        return view('visit', compact('groupId', 'groupName', 'visits', 'upcomingVisits', 'pastVisits'));
    }

    public function show(Visit $visit)
    {
        $visits = Visit::all();
        return view('show',compact('visit'));
    }


    public function visits(Request $request)
    {

        $groupId = $request->input('group_id');
        $groupName = $request->input('group_name');

        $visits = Visit::all();

        return view('newvisit', compact('groupId', 'groupName'));
    }

}

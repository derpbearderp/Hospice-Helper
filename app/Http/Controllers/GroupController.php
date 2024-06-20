<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Member;
use App\Models\Update;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index()
    {

        $groups = Group::all();
        return view('welcome', compact('groups'));
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'group_id',
            'author_id' => 'required',
            'group_name' => 'required'
        ]);

        $group = Group::create($request->all());

        $userId = auth()->user()->id;
        Member::create([
            'group_id' => $group->id,
            'user_id' => $userId
        ]);

        return redirect()->route('groups.index')
            ->with('success','Group created successfully.');
    }

    public function show(Group $group)
    {
        return view('show',compact('group'));
    }

    public function showGroup(Request $request)
    {
        $groupId = $request->input('group_id');
        $groupName = $request->input('group_name');

        return view('group', compact('groupId', 'groupName'));
    }

    public function updates(Request $request)
    {
        $user = Auth::user();
        $groupId = $request->input('group_id');
        $groupName = $request->input('group_name');
        if ($user->medical_staff) {
            // If user is medical staff, get all updates including those for medical staff only
            $updates = Update::where('group_id', $groupId)->get();
        } else {
            // If user is not medical staff, get updates excluding those for medical staff only
            $updates = Update::where('group_id', $groupId)
                ->where('for_medstaff_only', false)
                ->get();
        }

        return view('update', compact('groupId', 'groupName', 'updates'));
    }

    public function visit(Request $request)
    {
        $groupId = $request->input('group_id');
        $groupName = $request->input('group_name');

        // Fetch upcoming and past visits
        $upcomingVisits = Visit::where('group_id', $groupId)
            ->where('visit_time', '>', now())
            ->get();
        $pastVisits = Visit::where('group_id', $groupId)
            ->where('visit_time', '<', now())
            ->get();

        $visits = Visit::where('group_id', $groupId)->get();

        return view('visit', compact('groupId', 'groupName', 'visits', 'upcomingVisits', 'pastVisits'));
    }
    public function members(Request $request)
    {

        $groupId = $request->input('group_id');
        $groupName = $request->input('group_name');
        $members = Member::where('group_id', $groupId)->get();

        return view('member', compact('groupId', 'groupName', 'members'));
    }
}

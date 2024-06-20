<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function index()
    {

        $updates = Update::all();
        return view('update', compact('updates'));
    }

    public function create()
    {
        return view('updates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'update_id',
            'group_id' => 'required',
            'update_author' => 'required',
            'update_name' => 'required',
            'update_description' => 'required',
            'for_medstaff_only' => 'sometimes|boolean'
        ]);

        $user = Auth::user();
        $groupId = $request->input('group_id');
        $groupName = $request->input('group_name');

        Update::create($request->all());

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

    public function show(Update $update)
    {
        $updates = Update::all();
        return view('show',compact('update'));
    }


    public function updates(Request $request)
    {

        $groupId = $request->input('group_id');
        $groupName = $request->input('group_name');

        $updates = Update::all();

        return view('newupdate', compact('groupId', 'groupName'));
    }

}

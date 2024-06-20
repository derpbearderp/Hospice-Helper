<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;

class MemberController extends Controller
{
    public function addMember(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'User not found');
        }

        Member::create([
            'user_id' => $user->id,
            'group_id' => $request->group_id,
        ]);

        return back()->with('success', 'Member added successfully');
    }
}

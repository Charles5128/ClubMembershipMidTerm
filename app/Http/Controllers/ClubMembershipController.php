<?php

namespace App\Http\Controllers;

use App\Models\ClubMembership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClubMembershipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $memberships = ClubMembership::all();
        return view('club_memberships.index', compact('memberships'));
    }

    public function create()
    {
        return view('club_memberships.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required',
            'club_name' => 'required',
            'membership_date' => 'required|date',
        ]);

        ClubMembership::create($request->all());
        return redirect()->route('club_memberships.index')->with('success', 'Membership added successfully.');
    }

    public function edit(ClubMembership $clubMembership)
    {
        if (!Auth::user()->hasRole('Administrator')) {
            abort(403, 'Unauthorized access.');
        }
        return view('club_memberships.edit', compact('clubMembership'));
    }

    public function update(Request $request, ClubMembership $clubMembership)
    {
        if (!Auth::user()->hasRole('Administrator')) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'student_name' => 'required',
            'club_name' => 'required',
            'membership_date' => 'required|date',
        ]);

        $clubMembership->update($request->all());
        return redirect()->route('club_memberships.index')->with('success', 'Membership updated successfully.');
    }

    public function destroy(ClubMembership $clubMembership)
    {
        if (!Auth::user()->hasRole('Administrator')) {
            abort(403, 'Unauthorized action.');
        }

        $clubMembership->delete();
        return redirect()->route('club_memberships.index')->with('success', 'Membership deleted successfully.');
    }
}

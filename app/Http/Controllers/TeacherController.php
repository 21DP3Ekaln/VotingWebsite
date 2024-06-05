<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\teachers;
use App\Models\Votes;
use Illuminate\Support\Facades\DB;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function create()
    {
        $departments = Department::all();
        return view('uploadpage', compact('departments')); // Pass departments to uploadpage
    }

    public function storeTeacher(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'description' => 'required',
            'department_id' => 'required|exists:departments,id'
        ]);

        teachers::create($request->all());
        return redirect()->back()->with('success', 'Teacher information added successfully!');
    }

    public function displayTeachers()
    {
        $teachers = teachers::all();
        return view('teachers_list', compact('teachers'));
    }

    public function updateVote(Request $request, teachers $teacher)
    {
        try {
            Votes::create([
                'user_id' => Auth::id(),
                'teachers_id' => $teacher->id
            ]);
            return response()->json(['success' => true, 'new_votes' => Votes::where('teachers_id', '=', $teacher->id)->count()]);

        } catch (\Exception $e) {
            // Log the error for better debugging
            \Log::error('Voting error for teacher ID: ' . $teacher->id . '. Error: '. $e->getMessage());

            return response()->json(['success' => false, 'message' => 'Error updating votes. Please try later.']);
        }
    }

    


}

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
        return view('uploadpage', compact('departments'));
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
    $user = Auth::user();
    $teachers = Teachers::with('department');

    if ($user->usertype !== 'admin') {

        $teachers->where('department_id', $user->department_id);
    }

    $teachers = $teachers->get();

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

            \Log::error('Voting error for teacher ID: ' . $teacher->id . '. Error: '. $e->getMessage());

            return response()->json(['success' => false, 'message' => 'Error updating votes. Please try later.']);
        }
    }


    public function showTopTeachers()
{
    $user = Auth::user();

    if ($user->usertype === 'admin') {

        $topTeachers = Teachers::select('teachers.*', DB::raw('COUNT(*) as total_votes'))
            ->leftJoin('votes', 'teachers.id', '=', 'votes.teachers_id')
            ->groupBy('teachers.id', 'teachers.department_id')
            ->orderBy('total_votes', 'desc')
            ->get();
    } else {
        
        $topTeachers = Teachers::select('teachers.*', DB::raw('COUNT(*) as total_votes'))
            ->leftJoin('votes', 'teachers.id', '=', 'votes.teachers_id')
            ->where('department_id', $user->department_id)
            ->groupBy('teachers.id')
            ->orderBy('total_votes', 'desc')
            ->limit(1)
            ->get();
    }

    return view('top_teachers', compact('topTeachers'));
}



}

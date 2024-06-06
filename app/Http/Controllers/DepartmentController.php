<?php
namespace App\Http\Controllers;


use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|unique:departments',
    ]);

    Department::create($validatedData);

    return back()->with('success', 'Department created successfully.');
}

public function index()
{
    $departments = Department::all();
    return view('departments.index', compact('departments'));
}

public function destroy(Department $department)
{

    if ($department->users()->exists()) {
        return redirect()->back()->with('error', 'Cannot delete department with associated users.');
    }


    if ($department->teachers()->exists()) {
        return redirect()->back()->with('error', 'Cannot delete department with associated teachers.');
    }

    $department->delete();
    return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
}


public function edit(Department $department)
{
    return view('departments.edit', compact('department'));
}


public function update(Request $request, Department $department)
{
    $request->validate([
        'name' => 'required|unique:departments,name,' . $department->id,
    ]);

    $department->update($request->all());
    return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
}





}

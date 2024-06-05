<?php
namespace App\Http\Controllers;


use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function create()
    {
        return view('departments.create'); // This assumes you'll create a 'create.blade.php' file in a 'departments' folder under 'resources/views'
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|unique:departments', // Department name must be unique
    ]);

    Department::create($validatedData); // Use the fully qualified namespace 

    return back()->with('success', 'Department created successfully.');
}
}

<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $employeeDetails = EmployeeDetail::where('user_id', Auth::id())->get();

        return response()->json([
            'data' => $employeeDetails,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date_of_birth' => 'required|date',
            'city' => 'required|string|max:255',
        ]);

        $existingDetail = EmployeeDetail::where('user_id', Auth::id())->first();

        if ($existingDetail) {
            return response()->json([
                'message' => 'Employee detail already exists for this user.',
            ], 400); 
        }

        $employeeDetail = EmployeeDetail::create([
            'user_id' => Auth::id(),
            'date_of_birth' => $validatedData['date_of_birth'],
            'city' => $validatedData['city'],
        ]);

        return response()->json([
            'message' => 'Employee detail created successfully.',
            'data' => $employeeDetail,
        ], 201);
    }

    public function show()
    {
        $employeeDetail = EmployeeDetail::where('user_id', Auth::id())->first();

        if (!$employeeDetail) {
            return response()->json([
                'message' => 'Employee detail not found.',
            ], 400); 
        }

        return response()->json([
            'data' => $employeeDetail,
        ]);
    }

    public function update(Request $request)
    {
        $employeeDetail = EmployeeDetail::where('user_id', Auth::id())->first();

        if (!$employeeDetail) {
            return response()->json([
                'message' => 'Employee detail not found.',
            ], 400); 
        }

        $validatedData = $request->validate([
            'date_of_birth' => 'sometimes|date',
            'city' => 'sometimes|string|max:255',
        ]);

        $employeeDetail->update($validatedData);

        return response()->json([
            'message' => 'Employee detail updated successfully.',
            'data' => $employeeDetail,
        ]);
    }

    public function destroy()
    {
        $employeeDetail = EmployeeDetail::where('user_id', Auth::id())->first();

        if (!$employeeDetail) {
            return response()->json([
                'message' => 'Employee detail not found.',
            ], 400); 
        }

        $employeeDetail->delete();

        return response()->json([
            'message' => 'Employee detail deleted successfully.',
        ]);
    }
}

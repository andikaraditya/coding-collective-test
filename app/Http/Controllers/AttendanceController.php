<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::where('user_id', Auth::id())->get();

        return response()->json([
            'data' => $attendances,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|in:clock_in,clock_out',
        ]);

        $today = now()->toDateString();

        $existingAttendance = Attendance::where('user_id', Auth::id())
                                        ->whereDate('attendance_at', $today)
                                        ->where('type', $validatedData['type'])
                                        ->first();

        if ($existingAttendance) {
            return response()->json([
                'message' => "You have already recorded a '{$validatedData['type']}' attendance for today.",
            ], 400);
        }

        $attendance = Attendance::create([
            'user_id' => Auth::id(),
            'attendance_at' => now(),
            'type' => $validatedData['type'],
        ]);

        return response()->json([
            'message' => 'Attendance record created successfully.',
            'data' => $attendance,
        ], 201);
    }

    public function show($id)
    {
        $attendance = Attendance::where('user_id', Auth::id())->find($id);
        if (!$attendance) {
            return response()->json([
                'message' => 'Attendance detail not found.',
            ], 404); 
        }

        return response()->json([
            'data' => $attendance,
        ]);
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::where('user_id', Auth::id())->find($id);
        if (!$attendance) {
            return response()->json([
                'message' => 'Attendance detail not found.',
            ], 404); 
        }

        $validatedData = $request->validate([
            'attendance_at' => 'sometimes|date',
        ]);

        $attendance->update($validatedData);

        return response()->json([
            'message' => 'Attendance record updated successfully.',
            'data' => $attendance,
        ]);
    }

    public function destroy($id)
    {
        $attendance = Attendance::where('user_id', Auth::id())->find($id);
        if (!$attendance) {
            return response()->json([
                'message' => 'Attendance detail not found.',
            ], 404); 
        }

        $attendance->delete();

        return response()->json([
            'message' => 'Attendance record deleted successfully.',
        ]);
    }
}

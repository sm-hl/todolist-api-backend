<?php

namespace App\Http\Controllers\API;

use DateTime;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'max:200|nullable',
        //     'execution_date' => 'required|date',
        //     'completed' => 'required|boolean',
        //     'priority' => 'required|in:1,2,3',
        //     'tags' => 'required',
        // ]);
        // $caracters = strlen($request->tags);
        // $words = str_word_count($request->tags);
        Log::info($request->all());
        $time =new DateTime($request->execution_date);
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'execution_date' => $time->format('Y-m-d H:i'),
            'completed' => (boolean) $request->completed,//0 -> false, 1->true
            'priority' => (integer) $request->priority,
            'tags' => $request->tags,
        ]);

        return response()->json(['message'=>'task created']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::find($id);
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $time = new DateTime($request->execution_date);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'execution_date' => $time->format('Y-m-d'),
            'completed' => (boolean) $request->completed,//0 -> false, 1->true
            'priority' => (integer) $request->priority,
            'tags' => $request->tags,
        ]);

        return response()->json(['message'=>'Task updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return response()->json(['message'=>'Task deleted']);
    }
}

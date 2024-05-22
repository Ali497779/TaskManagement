<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskEmail;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id', auth()->user()->id)->with('user')->get();
        return view('home',compact('tasks'));
    }
    public function filter(Request $request): JsonResponse
    {

        return response()->json([
            'data' => Task::filter($request)->where('user_id', auth()->user()->id)->latest()->get(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'user_id' => auth()->user()->id
        ]);


        return response()->json([
            'id' => $task->id,
            'title' => $task->title,
            'description' => $task->description,
            'deadline' => $task->deadline,
            'status' => ''
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Task::where('id', $id)->update([
            'status' => $request->status
        ]);
        // if($request->status == 'Completed'){
        //     Mail::to(auth()->user()->email)->send(new TaskEmail());
        // }
        return response()->json([
            'id' => $id,
            'status' => $request->status
        ], 200);
    }

    public function taskupdate(Request $request)
    {
        Task::where('id', $request->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline
        ]);

        return response()->json([
            'id' => $request->id,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Task::where('id', $id)->delete();
        return response()->json([
            'id' => $id
        ], 200);
    }
}

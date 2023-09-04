<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use App\Http\Requests\StoreTodolistRequest;
use App\Http\Requests\UpdateTodolistRequest;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Todolist::all();

        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTodolistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodolistRequest $request)
    {
        $data = $request->validated();

        Todolist::create($data);

        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function show(Todolist $todolist)
    {
        return response()->json([
            'message' => 'success',
            'data' => $todolist
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodolistRequest  $request
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodolistRequest $request, Todolist $todolist)
    {
        $data = $request->validated();

        $todolist->update($data);

        return response()->json([
            'message' => 'success',
            'data' => $todolist->refresh()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todolist $todolist)
    {
        $todolist->delete();

        return response()->json([
            'message' => 'success',
            'data' => $todolist->refresh()
        ]);
    }
}

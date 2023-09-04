<?php

namespace App\Http\Controllers;

use App\Models\UserTodolist;
use App\Http\Requests\StoreUserTodolistRequest;
use App\Http\Requests\UpdateUserTodolistRequest;

class UserTodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserTodolist::where('user_id', auth()->user()->id)->get();

        if ($data->isEmpty()) {
            return response()->json([
                'message' => 'success',
                'data' => []
            ]);
        }

        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserTodolistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserTodolistRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;

        UserTodolist::create($data);
        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserTodolist  $userTodolist
     * @return \Illuminate\Http\Response
     */
    public function show(UserTodolist $todolist)
    {
        if ($todolist->user_id != auth()->user()->id) {
            return response()->json([
                'message' => 'unauthorized',
            ], 401);
        }

        return response()->json([
            'message' => 'success',
            'data' => $todolist
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserTodolistRequest  $request
     * @param  \App\Models\UserTodolist  $userTodolist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserTodolistRequest $request, UserTodolist $todolist)
    {
        if ($todolist->user_id != auth()->user()->id) {
            return response()->json([
                'message' => 'unauthorized',
            ], 401);
        }

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
     * @param  \App\Models\UserTodolist  $userTodolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTodolist $todolist)
    {
        if ($todolist->user_id != auth()->user()->id) {
            return response()->json([
                'message' => 'unauthorized',
            ], 401);
        }

        $todolist->delete();

        return response()->json([
            'message' => 'success',
            'data' => $todolist->refresh()
        ]);
    }
}

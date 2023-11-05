<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->hasPermission('todo-create')){
            $todos = Todo::where('user_id', auth()->id())->get();
            return view('todos.index', compact('todos'));
        }
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Todo::create(['user_id' => auth()->id()] + $request->all());
        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        if(auth()->id() == $todo->user_id){
            return view('todos.show', compact('todo'));
        }else{
            return redirect()->route('todos.index');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        if(auth()->id() == $todo->user_id){
            return view('todos.edit', compact('todo'));
        }else{
            return redirect()->route('todos.index')->withErrors(['msg' => 'You not allowed!']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        if(auth()->id() == $todo->user_id){
            $todo->update($request->all());
            return redirect()->route('todos.index');
        }
            else{
            return redirect()->route('todos.index')->withErrors(['msg' => 'Not Allowed']);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {

        if(auth()->id() == $todo->user_id){
            $todo->delete();
            return redirect()->route('todos.index');
        }
            else{
            return redirect()->route('todos.index')->withErrors(['msg' => 'Not Allowed']);
            }

    }
}

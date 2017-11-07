<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

use Illuminate\Support\Facades\Input;

use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project)
    {
        $tasks = \App\Task::all()->where('project',$project);
        return view('todo-tasks',compact('tasks','project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->project = Input::get('project');
        $task->note = Input::get('task');
        $task->status = 0;
        $task->save();
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $task = Task::findOrFail($request->id);
        $task->status = 1; 
        $task->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function setImageCompressionQuality() {
        $imagick = new \Imagick(realpath('1.jpg'));
        $imagick->cropImage(3000, 3000,250, 1200);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }

}

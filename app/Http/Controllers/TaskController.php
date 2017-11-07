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
        $dst_x = 0; 
        $dst_y = 0;  
        $src_x = 100; 
        $src_y = 100; 
        $dst_w = 160; 
        $dst_h = 120; 
        $src_w = 260; 
        $src_h = 220; 
        $dst_image = imagecreatetruecolor($dst_w, $dst_h);
        $src_image = imagecreatefromjpeg('1.jpg');
        imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
        $test = imagejpeg($dst_image, 'crop.jpg');
        $path = 'crop.jpg';
        echo "<img src=\"".$path."\" alt=\"error\">"; 
    }

}

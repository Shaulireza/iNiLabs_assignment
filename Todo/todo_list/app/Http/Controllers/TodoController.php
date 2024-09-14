<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $todo = Todo::all();
       return $this->sendResponse($todo,'All Category see Easily');
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
        $validator = Validator::make($request->all(),[
            'title'=>'required',
        ]);
        if($validator-> fails()){
            return $this-> sendError('Validation Error.', $validator->errors(),422);
        }
        $input = $request->all();
        $todo = Todo::create($input);
        return $this->sendResponse($todo,'Todo Data Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $todo = Todo::findorfail($id);
       return $this->sendResponse($todo,'Todo Data Fetched Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $validator = Validator::make($request->all(),[
            'title'=> 'required',
            
          ]);
          if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $todo = Todo::findorFail($id);
        $todo ->update([
            'title' => $request->title,
            
        ]);
        return $this->sendResponse($todo, 'Todo Data Updated Successfully!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $todo = Todo::findorfail($id)->delete();
      return $this->sendResponse($todo,'ToDo Data Deleted permanently');
    }
}

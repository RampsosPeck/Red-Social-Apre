<?php

namespace Redsocialapre\Http\Controllers;

use Illuminate\Http\Request;
use Redsocialapre\Http\Resources\StatusResource;
use Redsocialapre\Models\Status;

class StatusesController extends Controller
{
	public function index()
    {
        // return  Status::paginate();

        return StatusResource::collection(
            Status::latest()->paginate()
        );
    }
    
    public function store(){

        request()->validate(['body' => 'required|min:5']);

        $status = Status::create([
            'body'=> request('body'),
            'user_id'=> auth()->id()
        ]);

        //return redirect('/');

       // return response()->json(['body'=>$status->body]);

        return StatusResource::make($status);

    }
}

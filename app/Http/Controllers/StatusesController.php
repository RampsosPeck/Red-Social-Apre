<?php

namespace Redsocialapre\Http\Controllers;

use Illuminate\Http\Request;
use Redsocialapre\Models\Status;

class StatusesController extends Controller
{
    public function store(){

        request()->validate(['body' => 'required|min:5']);

        $status = Status::create([
            'body'=> request('body'),
            'user_id'=> auth()->id()
        ]);

        //return redirect('/');

        return response()->json(['body'=>$status->body]);

    }
}

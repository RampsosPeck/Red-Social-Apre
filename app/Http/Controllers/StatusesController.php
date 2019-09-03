<?php

namespace Redsocialapre\Http\Controllers;

use Illuminate\Http\Request;
use Redsocialapre\Models\Status;

class StatusesController extends Controller
{
    public function store(){
        Status::create([
            'body'=> request('body'),
            'user_id'=> auth()->id()
        ]);
    }
}

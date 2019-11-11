<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostsController extends Controller
{
    public function scopGlobal()
    {
       // $query = \App\Models\Post::all();
       //withDrafts adalah scope global 
       $query = \App\Models\Post::withDrafts()->get(); 
       return $query;
    }
}

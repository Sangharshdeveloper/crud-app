<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use DataTables;
use App\Models\Post;
use Livewire\WithPagination;


class PostController extends Controller
{
    public function show()
    {
        return view('posts');
    }
}

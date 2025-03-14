<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;


class PostsTable extends Component
{   
    use WithPagination;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage(); // reset pagination when searching
    }


    public function render()
    {
        // get post content from database 
       $posts = Post::where('title', 'like', '%' . $this->search . '%')
                     ->orWhere('description', 'like', '%' . $this->search . '%')
                     ->paginate(10);

        return view('livewire.posts-table', compact('posts'));

    }
}

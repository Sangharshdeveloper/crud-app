<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;


class PostsTable extends Component
{   
    use WithPagination;
    public $search = '';
    public $postId; // Store the ID of the post being edited/deleted
    public $title, $description; // Used for editing

    public function updatingSearch()
    {
        $this->resetPage(); // reset pagination when searching
    }
    
    public function edit($id)
    {
        
            $post = Post::findOrFail($id);
            $this->postId = $post->id;
            $this->title = $post->title;
            $this->description = $post->description;
        
            // Emit an event to show the modal
            $this->dispatch('show-edit-modal');
        
    }

    public function update()
{
    $this->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    Post::findOrFail($this->postId)->update([
        'title' => $this->title,
        'description' => $this->description,
    ]);

    session()->flash('message', 'Post updated successfully.');

    // Reset form and close modal
    $this->reset(['title', 'description', 'postId']);
    $this->dispatch('hide-edit-modal');
}


    public function confirmDelete($id)
    {
        $this->postId = $id;
        $this->dispatch('show-delete-confirmation'); // Fire JS event
    }

    public function delete()
    {
        Post::destroy($this->postId);
        session()->flash('message', 'Post deleted successfully.');
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

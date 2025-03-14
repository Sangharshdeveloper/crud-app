<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;


class ShowPost extends Component
{
    use WithPagination;
    public $postId; // Store the ID of the post being edited/deleted
    public $title, $description, $image; // Used for editing
    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function render()
    {
        // Fetch posts based on the search term
        $posts = Post::query()
            
            ->paginate(10); // Adjust the number of items per page

            return view('livewire.show-post',compact('posts'));
        }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function edit($id)
    {

        $post = Post::findOrFail($id);
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->image = $post->image;
        $this->description = $post->description;

        // Emit an event to show the modal
        $this->dispatch('show-edit-modal');
    }

    public function view($id)
    {

        $post = Post::findOrFail($id);
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->image = $post->image;
        $this->description = $post->description;

        // Emit an event to show the modal
        $this->dispatch('show-view-modal');
    }

    public function create()
    {
        // Reset fields before opening the modal
        $this->reset(['title', 'description', 'image']);

        // Emit an event to show the modal
        $this->dispatch('show-create-modal');
    }

    public function storePost()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'status' => 1,
            'user_id' => 1,
        ]);

        // Hide the modal after saving
        $this->dispatch('hide-create-modal');

        $this->dispatch('postCreated');

        // Clear input fields
        $this->reset(['title', 'description', 'image']);

        session()->flash('message', 'Post created successfully!');
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
            'image' => $this->image,
        ]);

        session()->flash('message', 'Post updated successfully.');
        $this->dispatch('postUpdated');

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
        if ($this->postId) {
            Post::destroy($this->postId);
            session()->flash('message', 'Post deleted successfully.');

            // Dispatch event to refresh the page or Livewire data
            $this->dispatch('postDeleted');
        }
    }

}

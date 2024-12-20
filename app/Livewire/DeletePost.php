<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class DeletePost extends Component
{

    public $post;

    public function delete()
    {
        $this->post->delete();
        session()->flash('message', 'Post deleted successfully.');
        // $this->emit('postDeleted'); // Emit an event to notify the parent component
    }

    public function render()
    {
        return view('livewire.delete-post');
    }
}

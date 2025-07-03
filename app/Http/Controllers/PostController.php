<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private $post;


    public function __construct()
    {
        $this->post = new PostModel();
    }

    public function index()
    {
        return $this->post::paginate();
    }

    public function show(string $slug, int $id = null): RedirectResponse | PostModel
    {
        $post = $this->post->findOrFail($id);
        if($post->slug !== $slug){
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return $post;
    }

    public function create()
    {
        $createdPost = $this->post->create([
            'title' => 'My fouth content',
            'slug' => 'my-fouth-content',
            'content' => 'Hello this is my fouth content :)'
        ]);

        echo "Post created successfully ";
        return $createdPost;

    }

    public function update(int $id = null)
    {

        $updatedPost = $this->post->find($id);
        if (!$updatedPost) {
            echo "Sorry! post not found :( ";
        }
        $updatedPost->update([
            'title' => 'My fouth content',
            'slug' => 'my-fouth-content',
            'content' => 'Hello this is my fouth content :)'
        ]);
        echo "Post updated successfully ";
        return $updatedPost;
    }

    public function delete(int $id = null)
    {
        $deletedPost = $this->post->find($id);
        if (!$deletedPost) {
            echo "Sorry! post not found :( ";
        }
        $deletedPost->update([
            'status' => 'inactive'
        ]);
        echo "Post deleted sucessfully :)";
    }
}

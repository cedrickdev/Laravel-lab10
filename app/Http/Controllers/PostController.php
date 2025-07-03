<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\PostFormValidationRequest;
use App\Models\PostModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use \Illuminate\View\View;
use \Illuminate\Support\Str;

class PostController extends Controller
{

    private $post;


    public function __construct()
    {
        $this->post = new PostModel();
    }

    public function index(): View
    {
        $post = $this->post::paginate(1);

        return view('blog.index', [
            'posts' => $post
        ]);
    }

    public function show(string $slug, PostModel $post): RedirectResponse | View
    {
        $post = $this->post->findOrFail($post);
        if ($post->slug !== $slug) {
            return to_route('post.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return view('blog.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
       
        return view('blog.create');
    }

    public function store(PostFormValidationRequest $request)
    {
        $createdPost = $this->post->create($request->validated());
        return redirect()->route('post.show', ['slug' => $createdPost->slug, 'id' => $createdPost->id])->with('success', 'le Blog a éte crée avec succes'); //with() property is then passed in the session which is captured in the view template to dosplay the alert
    }

    public function edit(PostModel $post ) :View{
        return view('blog.edit', [
         'post' => $post
        ]);
    }

    public function update(PostModel $post, PostFormValidationRequest $request)
    {
        $post->update($request->validated());
        return redirect()->route('post.show', ['slug' => $post->slug, 'id' => $post->id])->with('success', 'le Blog a éte modifié avec succes');
    }

    public function delete(PostModel $post)
    {
     
        $post->update([
            'status' => 'inactive'
        ]);
    }
}

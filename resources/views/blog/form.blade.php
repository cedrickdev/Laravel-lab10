<form action="" method="post" class="row gy-2 gx-3 align-items-center mb-5" >
    @csrf
    @method($post->id ? "PATCH" : "POST")
  <div class="col-auto">
    <label class="visually-hidden" for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $post->title) }}" placeholder="Mon titre">
    @error("title")
        {{ $message }}
    @enderror
  </div>
  <div class="col-auto">
    <label class="visually-hidden" for="content">Content</label>
    <div class="input-group">
      <textarea rows="4" name="content" class="form-control" id="content" value="{{ old('content', $post->content) }}" placeholder="Username"></textarea>
    </div>
    @error("content")
        {{ $message }}
    @enderror
  </div>
 
  <div class="col-auto">
    <button type="submit" class="btn btn-primary">
        @if ($post->id )
            Modifier
            @else
            Creer
        @endif
    </button>
  </div>
</form>

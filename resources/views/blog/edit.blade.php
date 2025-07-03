@extends('base')

@section('title', 'Modifier le blog')


@section('content')

<form action="" method="post" class="row gy-2 gx-3 align-items-center mb-5" >
    @csrf
    
  <div class="col-auto">
    <label class="visually-hidden" for="autoSizingInput">Title</label>
    <input type="text" name="title" class="form-control" id="autoSizingInput" value="{{ old('title', $post->title) }}" placeholder="Mon titre">
    @error("title")
        {{ $message }}
    @enderror
  </div>
  <div class="col-auto">
    <label class="visually-hidden" for="autoSizingInputGroup">Content</label>
    <div class="input-group">
      <textarea rows="4" name="content" class="form-control" id="autoSizingInputGroup" value="{{ old('content', $post->content) }}" placeholder="Username"></textarea>
    </div>
    @error("content")
        {{ $message }}
    @enderror
  </div>
 
  <div class="col-auto">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

@endsection

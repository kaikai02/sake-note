@extends('layout')

@section('content')
<div class="container mt-4">
  <div class="border p-4">
    <h1 class="h5 mb-4">編集</h1>
    <form method="POST" action="{{ route('posts.edit', ['id' => $post->id]) }}">
    @csrf
      <fieldset class="mb-4">
        <div class="form-group">
	  <label for="name">店名</label>
	  <input id="name" name="name" class="form-control" value="{{ old('name', $post->name) }}" type="text">
	  @if($errors->has('name'))
	    <p class="text-danger">{{ $errors->first('name') }}</p>
	  @endif
	</div>
	<div class="form-group">
	  <label for="body">感想</label>
	  <textarea id="body" name="body" class="form-control" rows="6">{{ old('body', $post->body) }}</textarea>
	  @if($errors->has('body'))
	    <p class="text-danger">{{ $errors->first('body') }}</p>
	  @endif
	</div>
	<div class="text-right mt-5">
	  <a href="{{ route('top') }}" class="btn btn-secondary">キャンセル</a>
	  <button type="submit" class="btn btn-primary">送信</button>
	</div>
      </fieldset>
    </form>
  </div>
</div>
@endsection

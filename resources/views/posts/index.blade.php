@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="row mb-5">
        <div class="col-sm-10">
	    <form method="GET" action="" class="form-inline">
		<div class="form-group"><input type="text" name="keyword" class="form-control" value="{{ $keyword }}" placeholder="検索"></div>
		<input type="submit" value="検索" class="btn btn-info">
	    </form>
	</div>
        <div class="col-sm-2"><a href="{{ route('posts.create') }}" class="btn btn-warning" style="color:#fff;">新規作成する</a></div>
    </div>
    @foreach( $posts as $post )
	<div class="card mb-4">
	    <div class="card-header">{{ $post->name }}</div>
	    <div class="card-body">
		<p class="card-text">{!! nl2br(e($post->body)) !!}</p>
		<div class="text-right">
		  <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-primary">編集</a>
		  <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="POST" style="display:inline-block;">
		    @csrf
		      <input type="submit" value="削除" class="btn btn-danger btn-dell">
		  </form>
		</div>
	    </div>
	</div>
    @endforeach
    <div class="d-flex justify-content-center mb-5">{{ $posts->appends(['keyword' => $keyword])->links() }}</div>
</div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(function(){
  $('.btn-dell').click(function(){
    if(confirm("本当に削除しますか？")){

    }else{
      return false;
    }
  });
});
@endsection

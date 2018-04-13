@extends('layouts.app')

@section('content')

<h4>This is Your Selected Post</h4>
<br>
<li class="list-group-item">
    <h1>{{$post->title}}</h1>
    <center><img style="width:50%" src="/sitamvan/public/storage/cover_images/{{$post->cover_image}}"></center>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}} </small>
</li>
<br>
@if(!Auth::guest())
    @if(Auth::user()->id==$post->user_id)
    <a href="/sitamvan/public/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>
    {!!Form::open(['action' => ['PostsController@destroy', $post->id],'method'=>'POST','class'=>'btn btn-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}
    @endif
@endif
    <a href="http://localhost/sitamvan/public/posts/"  class="btn btn-primary">Go Back</a>

@endsection
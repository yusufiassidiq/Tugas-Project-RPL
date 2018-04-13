@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="http://localhost/sitamvan/public/posts/create" class="btn btn-primary">Create Post</a>
                    <br>
                    <br>
                    <h3>Your Blog Post</h3>
                    <hr>
                    @if(count($posts)>0)
                    <table class="table table-striped">
                        <tr> 
                            <th>
                                Title
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td> {{$post->title}} </td>
                                <td><a href="http://localhost/sitamvan/public/posts/{{$post->id}}/edit" class="btn btn-secondary" style="padding-left:10px">Edit</a></td>
                                <td>{!!Form::open(['action' => ['PostsController@destroy', $post->id],'method'=>'POST','style'=>'padding-left:10px'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p>You Have No Post</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

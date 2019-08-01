@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts._message')
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h3>Questions</h3>
                        <div class="ml-auto"><a href="{{route('questions.create')}}" class="btn btn-outline-secondary btn-sm">Ask Question</a></div>
                    </div>
                </div>

                <div class="card-body">
                   
                   @foreach ($questions as $question )

                    <div class="media">
                        <div class="d-flex flex-column counters"> 
                            <div class="vote">  
                                <strong>{{$question->votes}}</strong> {{ str_plural('vote', $question->votes)}}
                            </div>
                            <div class="status {{ $question->status }}">  
                                <strong>{{$question->answers_count}}</strong> {{ str_plural('answer', $question->answers_count)}}
                            </div>
                            <div class="view">  
                                {{$question->views .' '. str_plural('view', $question->views)}}
                            </div>
                         </div>
                         {{-- @if(Auth::user()-> --}}
                        <div class="media-body">
                            <div class="d-flex align-items-center">
                                 <h5 class="mt-0"><a href="{{$question->url}}"><strong>{{$question->title}}</strong></a></h5>
                                 <div class="ml-auto">
                                 
                                    {{-- @if(Auth::user()->can('update-question', $question)) --}}
                                    @can('update', $question)
                                         <a href="{{route('questions.edit', ['id' => $question->id])}}" class="btn btn-outline-secondary btn-sm">Edit</a>
                                    @endcan
                                    {{-- @endif --}}

                                    {{-- @if(Auth::user()->can('delete-question', $question)) --}}
                                    @can('delete', $question)
                                    <form class="form-delete" action="{{route('questions.destroy', $question->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to detete?')">Delete</button>
                                    </form>
                                    @endcan
                                    {{-- @endif --}}

                                </div>
                            </div>
                           
                            <p class="lead">Question by <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                 {{$question->created_date}}
                            </p>
                            {{str_limit($question->body, 50)}}
                        </div>
                    </div>
                       <hr>
                   @endforeach
                    <div class="text-center">
                        {{$questions->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

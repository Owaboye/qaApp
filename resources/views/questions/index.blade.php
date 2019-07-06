@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h3>Questions</h3>
                        <div class="ml-auto"><a href="{{route('questions.create')}}" class="btn btn-primary btn-sm">Ask Question</a></div>
                    </div>
                </div>

                <div class="card-body">
                   
                   @foreach ($questions as $question )

                    <div class="media">
                        <div class="flex flex-column counters"> 
                            <div class="vote">  
                                <strong>{{$question->votes}}</strong> {{ str_plural('vote', $question->votes)}}
                            </div>
                            <div class="status {{ $question->status }}">  
                                <strong>{{$question->answers}}</strong> {{ str_plural('answer', $question->answers)}}
                            </div>
                            <div class="view">  
                                {{$question->views .' '. str_plural('view', $question->views)}}
                            </div>
                         </div>
                        <div class="media-body">
                            <h4 class="mt-0"><a href="{{$question->url}}"><strong>{{$question->title}}</strong></a></h4>
                            <p class="lead">Question asked By <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                 {{$question->created_date}}
                            </p>
                            {{str_limit($question->body)}}
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

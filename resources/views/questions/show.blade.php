@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts._message')
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1>{{$question->title}}</h1>
                            <div class="ml-auto"><a href="{{route('questions.index')}}" class="btn btn-outline-secondary btn-sm">View Questions</a></div>
                        </div>
                        <hr>
                    </div>

                

                    <div class="media">
                        <div class="d-flex flex-column votes-control"> 
                            <a title="This question is useful" class="vote-up">Vote up </a>
                            <span class="votes-count"> 123 </span>
                            <a title="This question is not useful" class="vote-down off">Vote down</a>
                            <a title="click to mark as favourite question (click again to undo)" class="favourite mt-2 favourited">favourite</a>
                            <span class="favorite-count">1234</span>
                           
                         </div>
                        <div class="media-body">
                            
                            {!! $question->body_html !!}

                             <div class="float-right">
                                <span class="text-muted">Asked {{$question->created_date}}</span>
                                <div class="media mt-2">
                                    <a href="{{$question->user->url}}" class="pr-2">
                                        <img src="{{$question->user->avatar}}" alt="" width="32" height="32">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                       
                </div>
            </div>
        </div>
    </div>
   @include('answers._index', ['answers' => $question->answers, 'answerCount' => $question->answers_count])
   @include('answers._create')
</div>
@endsection

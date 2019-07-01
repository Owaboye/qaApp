@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Questions</div>

                <div class="card-body">
                   
                   @foreach ($questions as $question )

                    <div class="media">
                        <div class="media-body">
                            <h4 class="mt-0"><a href="{{$question->url}}"><strong>{{$question->title}}</strong></a></h4>
                            <p class="lead">Question asked By <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                on {{$question->created_date}}
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

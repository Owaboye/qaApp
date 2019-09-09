 <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $answerCount .' ' . str_plural('Answer', $answerCount) }}</h2>
                    </div>
                    <hr>
                    @foreach($answers as $answer)
                        <div class="media">
                             <div class="d-flex flex-column votes-control"> 
                            <a title="This answer is useful" class="vote-up">Vote up </a>
                            <span class="votes-count"> 123 </span>
                            <a title="This answer is not useful" class="vote-down off">Vote down</a>
                            @can('accept', $answer)
                                <a title="Mark as Best answer" onclick="event.preventDefault(); document.getElementById('accept-answer-{{$answer->id}}').submit()" class="{{$answer->status}} mt-2">favourite</a>
                                <form id="accept-answer-{{$answer->id}}" method="POST" style="display: hidden" action={{route('accept.answers', $answer->id)}}>
                                    @csrf
                                </form>
                                @else
                                @if($answer->is_best)
                                    <a title="This answer was marked as Best answer" class="{{$answer->status}} mt-2">favourite</a>
                                @endif
                            @endcan

                         </div>
                            <div class="media-body">
                                {!! $answer->body_html !!}

                                <div class="row">
                                    <div class="col-4">
                                            <div class="ml-auto">
                                 
                                                {{-- @if(Auth::user()->can('update-question', $question)) --}}
                                                @can('update', $answer)
                                                     <a href="{{route('questions.answers.edit', [$question->id, $answer->id])}}" class="btn btn-outline-secondary btn-sm">Edit</a>
                                                @endcan
                                                {{-- @endif --}}

                                                {{-- @if(Auth::user()->can('delete-question', $question)) --}}
                                                @can('delete', $answer)
                                                <form class="form-delete" action="{{route('questions.answers.destroy', [$question->id, $answer->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to detete?')">Delete</button>
                                                </form>
                                                @endcan
                                                {{-- @endif --}}

                                            </div>
                                    </div>
                                    <div class="col-4"></div>

                                    <div class="col-4">
                                        {{-- <div class="float-right"> --}}
                                            <span class="text-muted">Answered {{$answer->created_date}}</span>
                                            <div class="media mt-2">
                                                <a href="{{$answer->user->url}}" class="pr-2">
                                                    <img src="{{$answer->user->avatar}}" alt="" width="32" height="32">
                                                </a>
                                                <div class="media-body mt-1">
                                                    <a href="{{$answer->user->url}}">{{$answer->user->name}}</a>
                                                </div>
                                            </div>
                                        {{-- </div> --}}
                                    </div>
                                </div>

                              

                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
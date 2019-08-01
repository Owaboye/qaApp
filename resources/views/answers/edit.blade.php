@extends('layouts.app')

@section('content')
<div class="container">

   <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="card-title">
                        <h2>Edit answer for question: <strong>{{ $question->title }}</strong></h2>
                    </div>
                    <hr>
                    <form method="post" action="{{ route('questions.answers.update', [$question->id, $answer->id]) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <textarea name="body" id="" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}">
                                {{old('body', $answer->body )}}
                            </textarea>
                            @if($errors->has('body'))
                                <div class="invalid-feedback">
                                    {{$errors->first('body')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-outline-secondary">Update</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

</div>

@endsection
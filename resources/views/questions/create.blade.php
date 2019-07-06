@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h3>Create Question</h3>
                        <div class="ml-auto"><a href="{{route('questions.index')}}" class="btn btn-outline-secondary btn-sm">View All Questions</a></div>
                    </div>
                </div>

                <div class="card-body">
                   <form action="{{route('questions.store')}}" method="post">
                       @csrf()
                       <div class="form-group">
                           <label for="title">Title</label>
                           <input type="text" id="title" class="form-control {{$errors->has('title') ? 'is_invalid' : ''}}">
                           <div class="invalid-feedback">
                               @if($errors->has('title'))
                                    {{$errors->first('title')}}
                               @endif
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="body">Description</label>
                           <textarea name="" id="body" cols="30" rows="10" class="form-control {{$errors->has('body') ? 'is_invalid' : ''}}"></textarea>
                           <div class="invalid-feedback">
                               @if($errors->has('body'))
                                    {{$errors->first('body')}}
                               @endif
                           </div>
                       </div>
                       <input type="submit" class="btn btn-primary" value="Submit">
                   </form>
                   

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

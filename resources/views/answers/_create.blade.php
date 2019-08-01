 <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="card-title">
                        <h2>Your Answer</h2>
                    </div>
                    <hr>
                    <form method="post" action="{{ route('questions.answers.store', $question->id) }}">
                        @csrf
                        <div class="form-group">
                            <textarea name="body" id="" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}"></textarea>
                            @if($errors->has('body'))
                                <div class="invalid-feedback">
                                    {{$errors->first('body')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-outline-secondary">Submit</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
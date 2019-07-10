  @csrf()
     <div class="form-group">
         <label for="title">Title</label>
         <input type="text" id="title" name="title" value="{{old('title', $question->title)}}" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}">
           @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
     </div>
     <div class="form-group">
         <label for="body">Description</label>
         <textarea name="body" id="body" row="5" class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}"> {{old('body', $question->body)}} </textarea>
         @if($errors->has('body'))
         <div class="invalid-feedback">
             
           <strong>{{$errors->first('body')}}</strong> 
            
         </div>
          @endif
     </div>
     <input type="submit" class="btn btn-primary" value="{{ $buttonText }}">


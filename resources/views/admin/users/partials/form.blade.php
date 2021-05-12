@csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name address</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" 
    id="name" name="name" aria-describedby="name" 
    value="{{ old('name') }} @isset($user) {{ $user->name }} @endisset">
    @error('name')
      <span class="invalid-feedback" role="alert">
      {{$message}}
      </span>
    @enderror  
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" 
    id="email" name="email" aria-describedby="email" 
    value="{{ old('email') }} @isset($user) {{ $user->email }} @endisset">
    @error('email')
      <span class="invalid-feedback" role="alert">
      {{$message}}
      </span>
    @enderror
  </div>
  @isset($create)
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
    @error('password')
      <span class="invalid-feedback" role="alert">
      {{$message}}
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="password_confirmation" class="form-label">Password confirm</label>
    <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password">
    @error('password_confirmation')
      <span class="invalid-feedback" role="alert">
      {{$message}}
      </span>
    @enderror
  </div>
  @endisset
  
  </div class="mb-3">
  @foreach ($roles as $role)
      <div class="form-check">
        <input class="form-check-input" name="roles[]"
        type="checkbox" value="{{$role->id}}" id="{{$role->id}}"
        @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset>
        <label class="form-check-laber" for="{{$role->name}}">
          {{$role->name}}
        </label>
      </div>
  @endforeach
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
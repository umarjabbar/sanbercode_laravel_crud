@extends('layout.main')

@section('title', 'Buat user baru')

@section('content')
<h2>Buat User Baru</h2>
<form method="POST" action="{{ url('/user')}}">
  @csrf
  <div class="form-group">
    <label for="username">username</label>
    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Beri username" name="username" value="{{ old('username') }}">
    @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="form-group">
    <label for="email">email</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Beri email" name="email" value="{{ old('email') }}">
    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="form-group">
    <label for="password">password</label>
    <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Beri password" name="password" value="{{ old('password') }}">
    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <button class="btn btn-primary" type="submit">Buat</button>
</form>

@endsection
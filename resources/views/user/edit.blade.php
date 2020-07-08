@extends('layout.main')

@section('title', 'Buat user baru')

@section('content')
<h2>Lengkapi profile {{$user['name']}}</h2>
<form method="POST" action="/user/{{ $user->id }}">
  @method('PUT') @csrf
  <div class="form-group">
    <label for="full_name">Full name</label>
    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" placeholder="Beri nama lengkap" name="full_name" value="{{ $detail['name']}}">
    @error('full_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Beri description" name="description" value="{{ $detail['description'] }}">
    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="form-group">
    <label for="image">image</label>
    <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="Beri image" name="image" value="{{ $detail['image'] }}">
    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <button class="btn btn-primary" type="submit">{{ $detail['action']}}</button>
</form>

@endsection
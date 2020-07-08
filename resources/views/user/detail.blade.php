@extends('layout.main')

@section('title', 'Daftar User')

@section('content')

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{ $user['image'] }}" alt="{{ $user['image'] }}">
  <div class="card-body">
    <h5 class="card-title">{{ $user['name']}}</h5>
    <p class="card-text">{{ $user['description'] }}</p>
    <p class="card-text">{{ $user['email'] }}</p>
    <a href="/user/{{ $user['id']}}/edit" class="btn btn-warning">{{ $user['action'] }}</a>
    <form action="/user/{{$user['id']}}" method="POST" class="d-inline">
      @method('DELETE') @csrf
      <button class="btn btn-danger">Hapus</button>
    </form>
  </div>
</div>

@endsection
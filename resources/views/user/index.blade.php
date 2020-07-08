@extends('layout.main')

@section('title', 'Daftar User')

@section('content')
<a href="{{ url('/user/create') }}" class="btn btn-primary mb-3">Tambah</a>
  @if (session('message'))
    <div class="alert alert-info">
      {{ session('message') }}
    </div>
  @endif
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Join at</th>
      <th scope="col" width="32px"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->created_at }}</td>
      <td><a href="/user/{{ $user->id }}" class="btn btn-primary">Detail</a></td>
    </tr>
  @endforeach
  </tbody>
</table>

@endsection
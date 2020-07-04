@extends('layout.main')

@section('title', 'Daftar Jawaban')

@section('content')

<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-md-5">
        <h5 class="card-title btn btn-dark">{{ $question->judul_pertanyaan }}</h5>
      </div>
      <div class="col-md-3">
        <p class="">Dibuat pada: {{ $question->created_at }}</p>
      </div>
      <div class="col-md-4">
        <p class="">Diperbarui pada: {{ $question->created_at }}</p>
      </div>
    </div>
    <h3 class="card-text text-center">{{ $question->isi_pertanyaan }}</h3>
  </div>
  <div class="card-body">
    @if (session('message'))
      <div class="alert alert-info">
        {{ session('message') }}
      </div>
    @endif
  Jawaban:
  <ul class="list-group">
  @foreach($answers as $answer)
    <li class="list-group-item">{{ $answer->jawaban }}</li>
  @endforeach
  </ul>
  </div>
  <div class="card-footer text-right">
    <form method="POST" action="/jawaban/{{$question->id}}">
      @csrf
      <div class="form-group">
        <textarea class="form-control @error('jawaban') is-invalid @enderror" id="isi" placeholder="Tulis pertanyaan disini" name="jawaban"></textarea>
        @error('jawaban')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <button class="btn btn-warning">Jawab</button>
    </form>
  </div>
</div>

@endsection

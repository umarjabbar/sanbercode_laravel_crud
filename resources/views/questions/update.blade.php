@extends('layout.main')

@section('title', 'Buat Pertanyaan baru')

@section('content')
<h2>Buat Pertanyaan Baru</h2>
<form method="POST" action="/pertanyaan/{{$id->id}}">
  @method('PUT') @csrf
  <div class="form-group">
    <label for="judul">Judul</label>
    <input type="text" class="form-control @error('judul_pertanyaan') is-invalid @enderror" id="judul" placeholder="Beri judul" name="judul_pertanyaan" value="{{ $id->judul_pertanyaan }}">
    @error('judul_pertanyaan')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  
  <div class="form-group">
    <label for="isi">Isi</label>
    <textarea class="form-control @error('isi_pertanyaan') is-invalid @enderror" id="isi" placeholder="Tulis pertanyaan disini" name="isi_pertanyaan" rows="10">{{ $id->isi_pertanyaan }}</textarea>
    @error('isi_pertanyaan')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <button class="btn btn-primary" type="submit">Buat</button>
</form>
@endsection
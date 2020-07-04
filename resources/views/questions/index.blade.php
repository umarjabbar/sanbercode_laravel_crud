@extends('layout.main')

@section('title', 'Daftar Pertanyaan')

@section('content')

<div class="my-4">
  @if (session('message'))
    <div class="alert alert-info">
      {{ session('message') }}
    </div>
  @endif
  <div class="row">
    @foreach($questions as $question)
    <div class="col-md-4 my-2">
      <div class="card">
        <div class="card-body">
          <a href="pertanyaan/{{ $question->id }}">
            <h5 class="card-title text-warning">{{ $question-> judul_pertanyaan}}</h5>
          </a>
          <h6 class="card-subtitle mb-2 text-muted">{{ $question->created_at}}</h6>
          <p class="card-text">{{ $question->isi_pertanyaan}}</p>
          <div class="text-right">
            <a href="pertanyaan/{{ $question->id }}/edit" class="btn btn-warning">Ubah</a>
            <form action="/pertanyaan/{{$question->id}}" method="post" class=" d-inline">
            @method('delete') @csrf
              <button class="btn btn-danger">Hapus</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection

@push('script')
<script>
console.log("berhasil");
</script>
@endpush

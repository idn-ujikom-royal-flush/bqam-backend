@extends('admin.parent')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tampilan Berita</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Berita</a></li>
                    <li class="breadcrumb-item active">Tampilan</li>
                </ol>
            </nav>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif

            <div class="row g-3 mx-1">
                <div class="col-md-12">
                    <label for="inputNewsName" class="form-label"><strong>Judul Berita</strong></label>
                    <input type="text" class="form-control" id="inputNewsName" value="{{ $news->title }}" name="title"
                        readonly>
                </div>

                <div class="col-md-12">
                    <label for="inputAuthorName" class="form-label"><strong>Penulis Berita</strong></label>
                    <input type="text" class="form-control" id="inputAuthorName" value="{{ $news->author }}"
                        name="author" readonly>
                </div>

                <div class="col-md-12">
                    <label for="inputImageNews" class="form-label"><strong>Gambar</strong></label>
                    <img src="{{ $news->image }}" id="inputImageNews" class="w-50 form-control pt-4 pb-4 ps-4 pe-4 rounded"
                        alt="">
                </div>

                <div class="col-md-12">
                    <label class="form-label"><strong>Isi Berita</strong></label>
                    <div class="form-control p-3">
                        {!! $news->description !!}
                    </div>
                </div>

                <div class="text-end">
                    <a href="{{ route('news.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <a href="{{ route('news.edit', $news->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection

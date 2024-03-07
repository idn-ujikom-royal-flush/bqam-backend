@extends('admin.parent')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambahkan Berita</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Berita</a></li>
                    <li class="breadcrumb-item active">Tambahkan</li>
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

            <div class="p-2">
                <form class="row g-3" action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="col-md-12">
                        <label for="inputNewsName" class="form-label"><strong>Judul Berita</strong></label>
                        <input type="text" class="form-control" id="inputNewsName" value="{{ old('title') }}"
                            name="title" required>
                    </div>

                    <div class="col-md-12">
                        <label for="inputAuthorName" class="form-label"><strong>Penulis Berita</strong></label>
                        <input type="text" class="form-control" id="inputAuthorName" value="{{ old('author') }}"
                            name="author" required>
                    </div>

                    <div class="col-md-12">
                        <label for="inputImageNews" class="form-label"><strong>Gambar Berita</strong></label>
                        <input type="file" class="form-control" id="inputImageNews" value="{{ old('image') }}"
                            name="image" required>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label"><strong>Isi Berita</strong></label>
                        <textarea name="description" id="editor" cols="30" rows="10"></textarea>
                        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#editor'))
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="reset" onclick="window.location.reload()" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

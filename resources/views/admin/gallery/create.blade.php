@extends('admin.parent')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambahkan Gambar</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('gallery.index') }}">Galeri</a></li>
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
                <form class="row g-3" action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="col-md-12">
                        <label for="inputGalleriesName" class="form-label"><strong>Judul Gambar</strong></label>
                        <input type="text" class="form-control" id="inputGalleriesName" value="{{ old('title') }}"
                            name="title" required>
                    </div>

                    <div class="col-md-12">
                        <label for="inputImageGalleries" class="form-label"><strong>Gambar</strong></label>
                        <input type="file" class="form-control" id="inputImageGalleries" value="{{ old('image') }}"
                            name="image" required>
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

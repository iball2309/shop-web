@extends('layout.admin')
@section('admin')
  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Add Type</h4>
          </div>
          <div class="card-content">
            <div class="card-body">
              <form action="{{ route('type.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label class="font-weight-bold">Nama</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Kategori">


                  @error('name')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

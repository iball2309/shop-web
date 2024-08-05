@extends('layout.admin')
@section('admin')
  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              Edit Role
            </h4>
          </div>
          <div class="card-content">
            <div class="card-body">
              <form action="{{ route('role.update', $role->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label class="font-weight-bold">Nama</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name', $role->name) }}" placeholder="Masukkan Nama">
                  @error('name')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                  <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

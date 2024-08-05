@extends('layout.admin')
@section('admin')
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded">
          <div class="card-body">
            <p>{{ $type->name }}</p>
            <form onsubmit="return confirm('Are You Sure?')"
              action="{{ route('type.destroy', $type->id) }}" method="POST">
              <a href="{{ route('type.edit', $type->id) }}" class="btn btn-warning">Edit</a>
              <a href="{{ route('type.index') }}" class="btn btn-primary">Back</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

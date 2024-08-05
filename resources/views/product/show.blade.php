@extends('layout.admin')
@section('admin')
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded">
          <div class="card-body">
            <img src="{{ asset('/storage/product/' . $product->image) }}" class="rounded"
              style="width: 100%">
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded">
          <div class="card-body">
            <h3>{{ $product->name }}</h3>
            <hr />
            <p>{{ $product->types->name }}</p>
            <code>
              <p>{!! $product->detail !!}</p>
            </code>
            <hr />
            <p>{{ '$ ' . number_format($product->price, 2, ',', '.') }}</p>
            <hr />
            <p>Stock : {{ $product->stock }}</p>
            <hr />
            <form onsubmit="return confirm('Are You Sure?')"
              action="{{ route('product.destroy', $product->id) }}" method="POST">
              <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
              <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
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

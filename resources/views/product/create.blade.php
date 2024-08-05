@extends('layout.admin')

@section('admin')
  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Add Product</h4>
          </div>
          <div class="card-content">
            <div class="card-body">
              <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                  <div class="col-md-6 col-12">
                    {{-- image --}}
                    <div class="mb-3">
                      <label for="formFile" class="form-label">Upload Image Product</label>
                      <input class="form-control @error('image') is-invalid @enderror" name="image"
                        type="file" id="formFile">
                      <!-- error message -->
                      @error('image')
                        <div class="alert alert-danger mt-2">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  {{-- name --}}
                  <div class="col-md-6 col-12 mt-2">
                    <div class="form-group">
                      <label class="font-weight-bold">Nama</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" placeholder="Write Name Product">
                      @error('name')
                        <div class="alert alert-danger mt-2">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  {{-- type --}}
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-bold">Type Product</label>
                      <select class="form-select @error('type_id') is-invalid @enderror"
                        name="type_id" aria-label="Default select example">
                        <option value="">-- Select One --</option>
                        @foreach ($type as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                      </select>
                      @error('type_id')
                        <div class="alert alert-danger mt-2">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  {{-- stock --}}
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-bold">Stock</label>
                      <input type="text"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                        class="form-control @error('stock') is-invalid @enderror" name="stock"
                        value="{{ old('stock') }}" placeholder="Write Stock">
                      @error('stock')
                        <div class="alert alert-danger mt-2">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  {{-- price --}}
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-bold">Price</label>
                      <input type="text"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                        class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ old('price') }}" placeholder="Write Price Product">
                      @error('price')
                        <div class="alert alert-danger mt-2">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  {{-- detail --}}

                  <div class="form-group">
                    <label class="font-weight-bold">Detail</label>
                    <textarea class="form-control @error('detail') is-invalid @enderror" name="detail" rows="5"
                      placeholder="Write Detail Product">{{ old('detail') }}</textarea>
                    @error('detail')
                      <div class="alert alert-danger mt-2">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                </div>

                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                  <a href="{{ url('/product') }}" class="btn btn-danger me-1 mb-1">Back</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

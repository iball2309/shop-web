@extends('layout.admin')
@section('admin')
  <!-- Hoverable rows start -->
  <section class="section">
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title" style="text-align: center">
              Product
            </h4>
            <a href="{{ route('product.create') }}" class="btn btn-primary"><i
                class="bi bi-plus-square"></i></a>
            <div class="card-content">
              <div class="card-body">
              </div>
            </div>
            <!-- table hover -->
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Type Product</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @forelse ($items as $p)
                    <tr>
                      <td>
                        {{ $no++ }}
                      </td>
                      <td>
                        {{ $p->name }}
                      </td>
                      <td>
                        {{ $p->types ? $p->types->name : 'Empty' }}
                      </td>
                      <td>
                        {{ $p->stock }}
                      </td>
                      <td>
                        {{ '$ ' . number_format($p->price, 2, ',', '.') }}
                      </td>
                      <td>
                        <form onsubmit="return confirm('Are You Sure?')"
                          action="{{ route('product.destroy', $p->id) }}" method="POST">
                          <a href="{{ route('product.edit', $p->id) }}"
                            class="btn btn-warning rounded-pill"><i class="bi bi-pencil"></i></a>
                          <a href="{{ route('product.show', $p->id) }}"
                            class="btn btn-success rounded-pill"><i class="bi bi-eye"></i></a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger rounded-pill"><i
                              class="bi bi-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  @empty
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hoverable rows end -->
@endsection

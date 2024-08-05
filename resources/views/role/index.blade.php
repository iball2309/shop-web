@extends('layout.admin')
@section('admin')
  <!-- Hoverable rows start -->
  <section class="section">
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title" style="text-align: center">
              Role
            </h4>
            <a href="{{ route('role.create') }}" class="btn btn-primary"><i
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
                    <th>No
                    </th>
                    <th>Name
                    </th>
                    <th>Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($roles as $a)
                    <tr>
                      <td>
                        {{ $no++ }}
                      </td>
                      <td>
                        {{ $a->name }}
                      </td>
                      <td>
                        <form onsubmit="return confirm('Are You Sure?')"
                          action="{{ route('role.destroy', $a->id) }}" method="POST">
                          <a href="{{ route('role.edit', $a->id) }}"
                            class="btn btn-warning rounded-pill"><i class="bi bi-pencil"></i></a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger rounded-pill"><i
                              class="bi bi-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
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

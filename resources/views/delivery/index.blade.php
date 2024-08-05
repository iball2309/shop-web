@extends('layout.admin')
@section('admin')
  <!-- Hoverable rows start -->
  <section class="section">
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title" style="text-align: center">
              Delivery
            </h4>
            <a href="{{ route('delivery.create') }}" class="btn btn-primary"><i
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
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($deliverys as $d)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $d->name }}</td>
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

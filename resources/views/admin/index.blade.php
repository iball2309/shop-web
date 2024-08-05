@extends('layout.admin')
@section('admin')
     <!-- Hoverable rows start -->
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Account</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        </div>
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no =1;
                                    @endphp
                                 @foreach ($accounts as $d )
                                 <tr>
                                 <td>{{ $no++ }}</td>
                                 <td>{{ $d->name }}</td>
                                 <td>{{ $d->email }}</td>
                                 <td>{{ $d->role? $d->role->name : 'Empty' }}</td>
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
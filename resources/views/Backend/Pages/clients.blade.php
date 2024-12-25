@extends('Backend.Common.MainLayout')
@push('setTitle')
    Clients - ZeroOneInfinity.
@endpush

@section('content')
    @include('Backend.Common.successMessagae')
    <section class="section">
        @include('Backend.Common.breadcrumb')
        <div class="row">
            <div class="col-sm-12">
                <div class="card">  
                    <div class="card-header mb-4 d-flex justify-content-between" style="background-color:  #7884f1; border-left: 5px solid #7884f1;">
                        <h5 class="mb-0 text-white">
                            <i class="bi bi-people "></i>
                            <span>Clients Details</span>
                        </h5>
                        <a href="{{ route('admin.addClient') }}" class="btn btn-outline-light btn-sm" style="font-weight: bold;">Add Client</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="ZeroOneInfinityTable">
                                <thead style="border-top: 1px solid gray;">
                                    <tr>
                                        <th>#Sn</th>
                                        <th>Client Name</th>
                                        <th>Business Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>Pin No</th>
                                        <th>GST No</th>
                                        <th>Pan No</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($clients->isEmpty())
                                        <tr class="text-center">
                                            <td colspan="14">There are currently no clients in the database.</td>
                                        </tr>
                                    @else
                                        @foreach ($clients as $key => $client)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $client->contact_name }}</td>
                                                <td>{{ $client->business_name }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->phone }}</td>
                                                <td>{{ $client->city }}</td>
                                                <td>{{ $client->state }}</td>
                                                <td>{{ $client->country }}</td>
                                                <td>{{ $client->pin }}</td>
                                                <td>{{ $client->gst_no }}</td>
                                                <td>{{ $client->pan_no }}</td>
                                                <td>
                                                    @if($client->status == 1)
                                                        <a href="{{ route('admin.toggleStatus', $client->id) }}" class="btn btn-success btn-sm">Active</a>
                                                    @else
                                                        <a href="{{ route('admin.toggleStatus', $client->id) }}" class="btn btn-danger btn-sm">Inactive</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.editClient', $client->id) }}" class="btn btn-success btn-sm">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.deleteClient', $client->id) }}" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash3"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#ZeroOneInfinityTable').DataTable();
        });
    </script>
@endsection
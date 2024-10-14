@extends('Backend.Common.MainLayout')
@push('setTitle')
    Clients - BharatX Technologies.
@endpush

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="border-left: 5px solid #7884f1; ">
                    <div class="card-body">
                        <div class="admin-title d-flex justify-content-between px-2">
                            <div class="d-flex admin-title-box">
                                <h2 class="mb-0 pt-3" style="margin-bottom: 0;">{{ $title }}</h2>
                                <div class="breadcrumbs">
                                    <ol class="breadcrumb bg-white ms-3 mb-0 pt-4">
                                        @foreach ($breadcrumbs as $breadcrumb)
                                            <li><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['text'] }}</a></li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>#Sn</th>
                                        <th>Client Name</th>
                                        <th>Business Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>Pin No</th>
                                        <th>GST No</th>
                                        <th>Pan No</th>
                                        <th>Status</th>
                                        <th>Action</th>
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
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->business_name }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->mobile_number }}</td>
                                                <td>{{ $client->address }}</td>
                                                <td>{{ $client->city }}</td>
                                                <td>{{ $client->state }}</td>
                                                <td>{{ $client->country }}</td>
                                                <td>{{ $client->pin_no }}</td>
                                                <td>{{ $client->gst_no }}</td>
                                                <td>{{ $client->pan_no }}</td>
                                                <td>
                                                    @if($client->status == 1)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-success btn-sm">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <a href="" class="btn btn-danger btn-sm">
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
@endsection
@extends('Backend.Common.MainLayout')
@push('setTitle')
    Add client - BharatX Technologies
@endpush

@section('content')
    @include('Backend.Common.alert')
    <section class="section">
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="border-left: 5px solid #7884f1; ">
                    <div class="card-body">
                        <div class="admin-title d-flex justify-content-between px-2">
                            <div class="d-flex admin-title-box">
                                <h2 class="mb-0 pt-3" style="margin-bottom: 0;">{{ $title }}</h2>
                                <div class="breadcrumbs">
                                    <ol class="breadcrumb bg-white ms-3 mb-0 pt-4">
                                        @foreach ($breadcrumbs as $breadcrumb)
                                            <li>
                                                <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['text'] }}</a>
                                                <span>&nbsp; > &nbsp;</span>
                                            </li>
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
                        <a href="{{ route('admin.clients') }}" class="btn btn-outline-light btn-sm" style="font-weight: bold;">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.storeClient') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="Client_name" class="mb-2">Client Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Client Name..." required name="name"/>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Business_name" class="mb-2">Business Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Business Name..." required name="business_name"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="email" class="mb-2">Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Client Email..." required name="email"/>
                                </div>
                                <div class="col-sm-6">
                                    <label for="phone" class="mb-2">Mobile Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Mobile No..." required name="phone"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="city" class="mb-2">City</label>
                                    <input type="text" class="form-control" placeholder="Enter City..." name="city"/>
                                </div>
                                <div class="col-sm-6">
                                    <label for="state" class="mb-2">State</label>
                                    <input type="text" class="form-control" placeholder="Enter State..." name="state"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="pin" class="mb-2">Pin Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Pin Number..." name="pin"/>
                                </div>
                                <div class="col-sm-6">
                                    <label for="gst" class="mb-2">GST Number</label>
                                    <input type="text" class="form-control" placeholder="Enter GST Number..." name="gst"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="pan" class="mb-2">Pan Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Pan Number..." name="pan"/>
                                </div>
                                <div class="col-sm-6">
                                    <label for="status" class="mb-2">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" placeholder="Enter Client Address..." name="address"></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" name="country" placeholder="Enter Country name..."/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" value="Save Client data" class="btn btn-primary" name="save"/>
                                    <input type="reset" value="Cancel" class="btn btn-secondary" name="reset"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@extends('Backend.Common.MainLayout')
@push('setTitle')
    {{ $title }} - ZeroOneInfinity
@endpush

@section('content')
    <section class="section">
        @include('Backend.Common.breadcrumb')
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header mb-4 d-flex justify-content-between" style="background-color:  #7884f1; border-left: 5px solid #7884f1;">
                        <h5 class="mb-0 text-white">
                            @if ($clientData)
                                <i class="bi bi-person-plus-fill"></i>
                                <span>Edit Client Details</span>
                            @else
                                <i class="bi bi-person-plus-fill"></i>
                                <span>Add Client Details</span>
                            @endif
                        </h5>
                        <a href="{{ route('admin.clients') }}" class="btn btn-outline-light btn-sm" style="font-weight: bold;">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ $clientData ? route('admin.updateClient', $clientData->id) : route('admin.storeClient') }}" method="post">
                            @csrf
                            @if($clientData) 
                                @method('PUT') 
                            @endif
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="Client_name" class="mb-2">Client Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Client Name..." required name="name" 
                                           value="{{ old('name', $clientData->contact_name ?? '') }}"/>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Business_name" class="mb-2">Business Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Business Name..." required name="business_name" 
                                           value="{{ old('business_name', $clientData->business_name ?? '') }}"/>
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="email" class="mb-2">Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Client Email..." name="email" 
                                           value="{{ old('email', $clientData->email ?? '') }}"/>
                                </div>
                                <div class="col-sm-6">
                                    <label for="phone" class="mb-2">Mobile Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Mobile No..." name="phone" 
                                           value="{{ old('phone', $clientData->phone ?? '') }}"/>
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="city" class="mb-2">City</label>
                                    <input type="text" class="form-control" placeholder="Enter City..." name="city" 
                                           value="{{ old('city', $clientData->city ?? '') }}"/>
                                </div>
                                <div class="col-sm-6">
                                    <label for="state" class="mb-2">State</label>
                                    <input type="text" class="form-control" placeholder="Enter State..." name="state" 
                                           value="{{ old('state', $clientData->state ?? '') }}"/>
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="pin" class="mb-2">Pin Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Pin Number..." name="pin" 
                                           value="{{ old('pin', $clientData->pin ?? '') }}"/>
                                </div>
                                <div class="col-sm-6">
                                    <label for="gst" class="mb-2">GST Number</label>
                                    <input type="text" class="form-control" placeholder="Enter GST Number..." name="gst" 
                                           value="{{ old('gst', $clientData->gst_no ?? '') }}"/>
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="pan" class="mb-2">Pan Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Pan Number..." name="pan" 
                                           value="{{ old('pan', $clientData->pan_no ?? '') }}"/>
                                </div>
                                <div class="col-sm-6">
                                    <label for="status" class="mb-2">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1" {{ old('status', $clientData->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $clientData->status ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="address" class="mb-2">Address</label>
                                    <textarea class="form-control" placeholder="Enter Client Address..." name="address">{{ old('address', $clientData->address ?? '') }}</textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label for="country" class="mb-2">Country</label>
                                    <input type="text" class="form-control" name="country" placeholder="Enter Country name..." 
                                           value="{{ old('country', $clientData->country ?? '') }}"/>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" value="{{ $clientData ? 'Update Client' : 'Save Client data' }}" class="btn btn-primary" name="save"/>
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
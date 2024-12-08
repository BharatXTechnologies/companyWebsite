@extends('Backend.Common.MainLayout')
@push('setTitle')
    Clients - BharatX Technologies.
@endpush

@section('content')
    @include('Backend.Common.successMessagae')
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
        </div>
        <div class="col-sm-12">
            <div class="card">  
                <div class="card-header mb-4 d-flex justify-content-between" style="background-color:  #7884f1; border-left: 5px solid #7884f1;">
                    <h5 class="mb-0 text-white">
                        <i class="bi bi-motherboard"></i>
                        <span>{{ $title }}</span>
                    </h5>
                    <a href="{{ route('admin.add-technology') }}" class="btn btn-outline-light btn-sm" style="font-weight: bold;">Add Technology</a>
                </div>
                <div class="card-body">
                
                </div>
            </div>
        </div>
    </section>
@endsection
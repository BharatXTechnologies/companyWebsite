@extends('Backend.Common.MainLayout')
@push('setTitle')
    {{ $title }} - ZeroOneInfinity.
@endpush
@section('content')
    <section class="section">
        @include('Backend.Common.breadcrumb')
        <div class="col-sm-12">
            <div class="card">  
                <div class="card-header mb-4 d-flex justify-content-between" style="background-color:  #7884f1; border-left: 5px solid #7884f1;">
                    <h5 class="mb-0 text-white">
                        <i class="bi bi-plus-circle-dotted"></i>
                        <span>{{ $title }}</span>
                    </h5>
                    <p class="p-0 m-0">
                        <a href="{{ route('admin.services') }}" class="btn btn-outline-light btn-sm" style="font-weight: bold;">Back</a>
                    </p>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </section>
@endsection
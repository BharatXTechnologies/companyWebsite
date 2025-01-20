@extends('Backend.Common.MainLayout')
@push('setTitle')
    {{ $title }} - ZeroOneInfinity.
@endpush

@section('content')
    <section class="section">
        @include('Backend.Common.breadcrumb')
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header mb-4 d-flex justify-content-between"
                        style="background-color:  #7884f1; border-left: 5px solid #7884f1;">
                        <h5 class="mb-0 text-white">
                            <i class="bi bi-tags"></i>
                            <span>{{ $title }}</span>
                        </h5>
                        <p class="p-0 m-0">
                            <a href="{{ route('admin.trashed', ['module' => 'technologies']) }}"
                                class="btn btn-outline-light btn-sm" style="font-weight: bold;">Trash</a>
                            <a href="{{ route('admin.addCategory') }}" class="btn btn-outline-light btn-sm"
                                style="font-weight: bold;">Add Category</a>
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="ZeroOneInfinityTable">
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header mb-4 d-flex justify-content-between"
                        style="background-color:  #7884f1; border-left: 5px solid #7884f1;">
                        <h5 class="mb-0 text-white">
                            <i class="bi bi-tags"></i>
                            <span>{{ $title }}</span>
                        </h5>
                        <p class="p-0 m-0">
                            <a href="{{ route('admin.trashed', ['module' => 'technologies']) }}"
                                class="btn btn-outline-light btn-sm" style="font-weight: bold;">Trash</a>
                            <a href="{{ route('admin.addCategory') }}" class="btn btn-outline-light btn-sm"
                                style="font-weight: bold;">Add Category</a>
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="ZeroOneInfinityTable">
                                
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

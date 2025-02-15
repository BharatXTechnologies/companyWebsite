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
                        <i class="bi bi-motherboard"></i>
                        <span>{{ $title }}</span>
                    </h5>
                    <p class="p-0 m-0">
                        <a href="{{ route('admin.addService') }}" class="btn btn-outline-light btn-sm" style="font-weight: bold;">Add Service</a>
                    </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="ZeroOneInfinityTable">
                            <thead style="border-top: 1px solid gray;">
                                <tr>
                                    <th>#Sn</th>
                                    <th>Service Name</th>
                                    <th>Service Icon</th>
                                    <th>Service Small Desc</th>
                                    <th>Features</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn = 1;
                                @endphp
                                @foreach ($servicesData as $serviceItem)
                                    <tr>
                                        <td>{{ $sn++; }}</td>
                                        <td> {{ $serviceItem->name }} </td>
                                        <td> <i class="fas {{ $serviceItem->icon }}"></i> </td>
                                        <td>{{ substr($serviceItem->small_desc, 0, 20) }}...</td>
                                        <td>{{ $serviceItem->feature_ids }}</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-sm toggle-status-btn {{ $serviceItem->status == 1 ? 'btn-success' : 'btn-danger' }}" data-url="{{ route('admin.serviceStatus', $serviceItem->id) }}">{{ $serviceItem->status == 1 ? 'Active' : 'Inactive' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.editService', $serviceItem->id) }}" class="btn btn-success btn-sm">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm delete-btn" data-url="{{ route('admin.deleteService', $serviceItem->id) }}">
                                                <i class="bi bi-trash3"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
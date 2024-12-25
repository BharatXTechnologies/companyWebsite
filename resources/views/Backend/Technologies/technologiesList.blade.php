@extends('Backend.Common.MainLayout')
@push('setTitle')
    Clients - ZeroOneInfinity.
@endpush

@section('content')
    @include('Backend.Common.successMessagae')
    <section class="section">
        @include('Backend.Common.breadcrumb')
        <div class="col-sm-12">
            <div class="card">  
                <div class="card-header mb-4 d-flex justify-content-between" style="background-color:  #7884f1; border-left: 5px solid #7884f1;">
                    <h5 class="mb-0 text-white">
                        <i class="bi bi-motherboard"></i>
                        <span>{{ $title }}</span>
                    </h5>
                    <a href="{{ route('admin.addTechnology') }}" class="btn btn-outline-light btn-sm" style="font-weight: bold;">Add Technology</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="ZeroOneInfinityTable">
                            <thead style="border-top: 1px solid gray;">
                                <tr>
                                    <th>#Sn</th>
                                    <th>Technology Name</th>
                                    <th>Technology Icon</th>
                                    <th>Technology Description</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$technologiesData->isEmpty())
                                    @foreach ($technologiesData as $key => $technology)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $technology->technology_name }}</td>
                                            <td>
                                                <img src="{{ URL::asset('assets/uploads/technologies/' . $technology->technology_icon) }}" alt="{{ $technology->technology_icon }}" style="width: 50px; border-radius: 50%;"/>
                                            </td>
                                            <td>{{ $technology->technology_description }}</td>
                                            <td>
                                                @if($technology->technology_status == 1)
                                                    <a href="{{ route('admin.toggleStatus', $technology->id) }}" class="btn btn-success btn-sm">Active</a>
                                                @else
                                                    <a href="{{ route('admin.toggleStatus', $technology->id) }}" class="btn btn-danger btn-sm">Inactive</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.editTechnology', $technology->id) }}" class="btn btn-success btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.deleteClient', $technology->id) }}" class="btn btn-danger btn-sm">
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
    </section>
    <script>
        $(document).ready(function() {
            $('#ZeroOneInfinityTable').DataTable();
        });
    </script>
@endsection
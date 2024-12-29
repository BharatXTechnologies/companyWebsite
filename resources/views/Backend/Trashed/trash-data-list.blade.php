@extends('Backend.Common.MainLayout')

@push('setTitle')
    {{ $title }} - ZeroOneInfinity
@endpush

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="border-left: 5px solid #7884f1;">
                    <div class="card-body">
                        <div class="admin-title d-flex justify-content-between px-2">
                            <div class="d-flex admin-title-box">
                                <h2 class="mb-0 pt-3" style="margin-bottom: 0;">{{ $title }}</h2>
                                <div class="breadcrumbs">
                                    <ol class="breadcrumb bg-white ms-3 mb-0 pt-4">
                                        @foreach ($breadcrumbs as $breadcrumb)
                                            <li><a href="{{ $breadcrumb['url'] }}" class="me-1">{{ $breadcrumb['text'] }}</a></li>
                                            @if (!$loop->last)
                                                <span class="me-1"> > </span>
                                            @endif
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
                        <i class="bi bi-trash text-danger"></i>
                        <span>{{ $title }}</span>
                    </h5>
                    <a href="{{ route('admin.technologies') }}" class="btn btn-outline-light btn-sm" style="font-weight: bold;">Cancel</a>
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
                                @if (!$trashedData->isEmpty())
                                    @foreach ($trashedData as $key => $technology)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $technology->technology_name }}</td>
                                            <td>
                                                <img src="{{ URL::asset('assets/uploads/technologies/' . $technology->technology_icon) }}" alt="{{ $technology->technology_icon }}" style="width: 50px; border-radius: 50%;"/>
                                            </td>
                                            <td>{{ $technology->technology_description }}</td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-sm toggle-status-btn {{ $technology->technology_status == 1 ? 'btn-success' : 'btn-danger' }}" data-url="{{ route('admin.toggleStatus', $technology->id) }}">
                                                    {{ $technology->technology_status == 1 ? 'Active' : 'Inactive' }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.editTechnology', $technology->id) }}" class="btn btn-success btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm trash-btn" data-url="{{ route('admin.deleteTechnology', $technology->id) }}">
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
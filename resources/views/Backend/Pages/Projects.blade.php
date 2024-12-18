@extends('Backend.Common.MainLayout')
@push('setTitle')
    Projects - BharatX Technologies.
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
                            <i class="bi bi-layout-text-sidebar"></i>
                            <span>Projects Details</span>
                        </h5>
                        <a href="{{ route('admin.addProject') }}" class="btn btn-outline-light btn-sm" style="font-weight: bold;">Add project</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="bharatXProjects">
                                <thead style="border-top: 1px solid gray;">
                                    <tr>
                                        <th>#Sn</th>
                                        <th>project Name</th>
                                        <th>Project Description</th>
                                        <th>Project Thumnail</th>
                                        <th>Client Name</th>
                                        <th>Status</th>
                                        <th>Technologies</th>
                                        <th>Budget</th>
                                        <th>Project URL</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($projectsData))
                                        @foreach ($projectsData as $key => $project)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $project->project_name }}</td>
                                                <td>{{ $project->project_description }}</td>
                                                <td>{{ $project->thumbnail }}</td>
                                                <td>{{ $project->client_id }}</td>
                                                <td>{{ $project->status }}</td>
                                                <td>{{ $project->technologies }}</td>
                                                <td>{{ $project->budget }}</td>
                                                <td>{{ $project->project_url }}</td>
                                                <td>
                                                    @if($project->status == 1)
                                                        <a href="{{ route('admin.toggleStatus', $project->id) }}" class="btn btn-success btn-sm">Active</a>
                                                    @else
                                                        <a href="{{ route('admin.toggleStatus', $project->id) }}" class="btn btn-danger btn-sm">Inactive</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.editProject', $project->id) }}" class="btn btn-success btn-sm">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.deleteProject', $project->id) }}" class="btn btn-danger btn-sm">
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
            $('#bharatXProjects').DataTable();
        });
    </script>
@endsection
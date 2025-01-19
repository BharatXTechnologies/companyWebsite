@extends('Backend.Common.MainLayout')
@push('setTitle')
    {{ $title }} - ZeroOneInfinity.
@endpush

@section('content')
    <section class="section">
        @include('Backend.Common.breadcrumb')
        <div class="row">
            <div class="col-sm-12">
                <div class="card">  
                    <div class="card-header mb-4 d-flex justify-content-between" style="background-color:  #7884f1; border-left: 5px solid #7884f1;">
                        <h5 class="mb-0 text-white">
                            <i class="bi bi-people "></i>
                            <span>Add Projects Details</span>
                        </h5>
                        <a href="{{ route('admin.projects') }}" class="btn btn-outline-light btn-sm" style="font-weight: bold;">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label for="project_name" class="mb-2">Project Name</label>
                                        <input type="text" class="form-control" id="project_name" name="project_name" required value="{{ old('project_name') }}">
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="client_name" class="mb-2">Client Name</label>
                                    <select class="form-control" name="client">
                                        <option hidden>Select Client</option>
                                        @if (!empty($clientsData))
                                            @foreach ($clientsData as $clients)
                                                <option value="{{ $clients->id }}">{{ $clients->contact_name }}</option>
                                            @endforeach
                                        @else
                                            <option>No Clients</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="technologies" class="mb-2">Technologies</label>
                                        <select class="form-control multiple-select" id="technologies" name="technologies[]" multiple>
                                            @if (!empty($technologiesData))
                                                @foreach ($technologiesData as $technologies)
                                                    <option value="{{ $technologies->id }}">{{ $technologies->technology_name }}</option>
                                                @endforeach
                                            @else
                                                <option>No Technologies</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="start_date" class="mb-2">Project Category</label>
                                        <select class="form-control" name="project_category">
                                            <option value="1" {{ old('project_category', '1') == '1'?'selected' : '' }}>Technology</option>
                                            <option value="2" {{ old('project_category', '2') == '2'?'selected' : '' }}>Infrastructure</option>
                                            <option value="3" {{ old('project_category', '3') == '3'?'selected' : '' }}>Marketing</option>
                                            <option value="4" {{ old('project_category', '4') == '4'?'selected' : '' }}>Finance</option>
                                            <option value="5" {{ old('project_category', '5') == '5'?'selected' : '' }}>Product Development</option>
                                            <option value="6" {{ old('project_category', '6') == '6'?'selected' : '' }}>Sales</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
     $(document).ready(function() {
        $('#technologies').selectize({
            plugins: ['remove_button'],
            delimiter: ',',
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input
                };
            }
        });
     })
</script>
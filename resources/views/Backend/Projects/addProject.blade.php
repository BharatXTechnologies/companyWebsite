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
                        <form action="{{ route('admin.storeProject') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label for="project_name" class="mb-2">Project Name
                                            @error('project_name')
                                                <span class="text-danger"> : {{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input type="text" class="form-control" id="project_name" name="project_name"  value="{{ old('project_name') }}">
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="client_name" class="mb-2">Client Name
                                        @error('client')
                                            <span class="text-danger"> : {{ $message }}</span>
                                        @enderror
                                    </label>
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
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="project_budgte" class="mb-2">Project Budget
                                            @error('project_budgte')
                                                <span class="text-danger"> : {{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input class="form-control" type="text" name="project_budgte" placeholder="Enter Project Budget..." value="{{ old('budget') }}"/>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="start_date" class="mb-2">Project Category
                                            @error('project_category')
                                                <span class="text-danger"> : {{ $message }}</span>
                                            @enderror
                                        </label>
                                        <select class="form-control" name="project_category">
                                            <option hidden>Select Category</option>
                                            @if (!empty($categoryData))
                                                @foreach ($categoryData as $category)
                                                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                                @endforeach
                                            @else
                                                <option>No Category</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="technologies" class="mb-2">Technologies
                                            @error('technologies')
                                                <span class="text-danger"> : {{ $message }}</span>
                                            @enderror
                                        </label>
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
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="status" class="mb-2">Status
                                            @error('status')
                                                <span class="text-danger"> : {{ $message }}</span>
                                            @enderror
                                        </label><br/>
                                        <input type="radio" value="1" class="me-2" id="active" name="status" checked /><label for="active" class="me-2">Active</label>
                                        <input type="radio" value="0" id="inactive" name="status" class="me-2" /><label for="inactive" class="me-2">Inactive</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="project_url mb-2">Project URL
                                            @error('project_url')
                                                <span class="text-danger"> : {{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input type="text" class="form-control" id="project_url" name="project_url" placeholder="Enter Project URL..."/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="project_image" class="mb-2">Project Image
                                            @error('project_image')
                                                <span class="text-danger"> : {{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input type="file" class="form-control" id="project_image" name="project_image"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description" class="mb-2">Description</label>
                                        <textarea class="form-control" id="editor" name="description" rows="5">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-primary btn-block" value="Save Projects"/>
                                    <input type="reset" class="btn btn-secondary btn-block" value="Cancel"/>
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
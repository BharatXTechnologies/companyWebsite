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
                            @if ($projectData)
                                <i class="bi bi-pencil-square"></i>
                                <span>Edit Project Details</span>
                            @else
                                <i class="bi bi-plus-circle-dotted"></i>
                                <span>Add Project Details</span>
                            @endif
                        </h5>
                        <a href="{{ route('admin.projects') }}" class="btn btn-outline-light btn-sm" style="font-weight: bold;">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ $projectData ? route('admin.updateProject', $projectData->id) : route('admin.storeProject') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($projectData)
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label for="project_name" class="mb-2">Project Name
                                            @error('project_name')
                                                <span class="text-danger"> : {{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input type="text" class="form-control" id="project_name" name="project_name"  value="{{ old('project_name', $projectData->project_name ?? '') }}">
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
                                            <option value="{{ $clients->id }}" 
                                                {{ isset($projectData->client_id) && $projectData->client_id == $clients->id ? 'selected' : '' }}>
                                                {{ $clients->contact_name }}
                                            </option>
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
                                        <input class="form-control" type="text" name="project_budgte" placeholder="Enter Project Budget..." value="{{ old('budget', $projectData->budget ?? '') }}"/>
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
                                                    <option value="{{ $category->id }}" {{ isset($projectData->category_id) && $projectData->category_id == $category->id ? 'selected': '' }}> {{ $category->name }}</option>
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
                                        @php
                                            // Convert the technology IDs string to an array once, outside the loop
                                            $technology_ids = !empty($projectData->technologies) 
                                                ? explode(', ', $projectData->technologies) 
                                                : [];
                                        @endphp

                                        <select class="form-control multiple-select" id="technologies" name="technologies[]" multiple>
                                            @if (!empty($technologiesData))
                                                @foreach ($technologiesData as $technology)
                                                    <option value="{{ $technology->id }}" 
                                                        {{ in_array($technology->id, $technology_ids) ? 'selected' : '' }}>
                                                        {{ $technology->technology_name }}
                                                    </option>
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
                                        <input type="radio" value="1" class="me-2" id="active" name="status" 
                                            {{ (isset($projectData) && isset($projectData->status) && $projectData->status == 1) || !isset($projectData) ? 'checked' : '' }} />
                                        <label for="active" class="me-2">Active</label>

                                        <input type="radio" value="0" id="inactive" name="status" class="me-2" 
                                            {{ isset($projectData) && isset($projectData->status) && $projectData->status == 0 ? 'checked' : '' }} />
                                        <label for="inactive" class="me-2">Inactive</label>
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
                                        <input type="text" class="form-control" id="project_url" name="project_url" value="{{ old('project_url', $projectData->project_url?? '') }}" placeholder="Enter Project URL..."/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="project_image" class="mb-2">Project Image
                                            @error('project_image')
                                                <span class="text-danger"> : {{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input type="file" class="form-control" id="project_image" name="project_image" onchange="previewImage(event)">
                                        <!-- Preview Section -->
                                        @if (!empty($projectData->thumbnail))
                                            <div class="mt-3">
                                                <img id="image_preview" src="{{ URL::asset('assets/uploads/projects/' . $projectData->thumbnail) }}" 
                                                    alt="Project Image" class="img-thumbnail" style="max-width: 200px;">
                                            </div>
                                        @else
                                            <div class="mt-3">
                                                <img id="image_preview" src="" alt="No Image" class="img-thumbnail" style="max-width: 200px; display: none;">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description" class="mb-2">Description</label>
                                        <textarea class="form-control" id="editor" name="description" rows="5">
                                            {{ old('description', $projectData->project_description?? '') }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-primary btn-block" value="{{ $projectData ? 'Update Project' : 'Save Project' }}"/>
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

     function previewImage(event) {
        const image = document.getElementById('image_preview');
        const file = event.target.files[0];
        if (file) {
            image.src = URL.createObjectURL(file);
            image.style.display = 'block';
        }
    }
</script>
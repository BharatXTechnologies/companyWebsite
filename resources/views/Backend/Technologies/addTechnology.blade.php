@extends('Backend.Common.MainLayout')
@push('setTitle')
    Technologies - ZeroOneInfinity.
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
                    <a href="{{ route('admin.technologies') }}" class="btn btn-outline-light btn-sm" style="font-weight: bold;">Cancel</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.storeTechnology') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-6 mb-2">
                                <label for="technology_name" class="mb-2">Technology Name</label>
                                <input type="text" class="form-control" id="technology_name" name="technology_name" required value="{{ old('technology_name') }}">
                            </div>
                            <div class="col-sm-6 mb-2">
                                <label for="status" class="mb-2">Status</label>
                                <select class="form-control" name="technology_status" required>
                                    <option value="1" {{ old('technology_status', '1') == '1'?'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('technology_status', '0') == '0'?'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="technology_description" class="mb-2">Description</label>
                                <textarea class="form-control" id="editor" name="technology_description" rows="5" required>{{ old('technology_description') }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <label for="logo" class="mb-2">Technology Icon</label>
                                <div class="image-preview-container">
                                    <img id="imagePreview" src="https://via.placeholder.com/150" alt="Image Preview"
                                        class="image-preview">
                                    <label for="logo" class="upload-icon">
                                        <i class="bi bi-camera"></i>
                                    </label>
                                </div>
                                <input type="file" class="form-control d-none" id="logo" name="logo" accept="image/*">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary btn-block" value="Save Technologies"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
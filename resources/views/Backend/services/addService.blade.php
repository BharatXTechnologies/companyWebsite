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
                    <div class="row">
                        <div class="col-md-12">
                            <form id="serviceFrom" action="{{ route('admin.storeService') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label for="service_name" class="mb-2">Service Name</label>
                                            <input type="text" class="form-control" id="service_name" name="service_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label for="service_icon" class="mb-2">Service Icon</label>
                                            <input type="text" class="form-control" id="service_icon" name="service_icon" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="service_image" class="mb-2">Service Image</label>
                                            <input type="file" class="form-control" id="service_image" name="service_image" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label for="service_s_desc" class="mb-2">Service Small Description</label>
                                            <textarea class="form-control" rows="2" id="service_s_desc" name="service_s_desc" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="service_icon" class="mb-2">Features</label>
                                            <select class="form-control" id="feature_ids" name="feature_ids[]" multiple>
                                                <option hidden>Selects Features</option>
                                                @if (!empty($features))
                                                    @foreach ($features as $feature)
                                                        <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label for="service_desc" class="mb-2">Service Description</label>
                                            <textarea class="form-control" id="editor" name="service_desc" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary btn-block" value="Save Project"/>
                                        <input type="reset" class="btn btn-secondary btn-block" value="Cancel"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
@endsection
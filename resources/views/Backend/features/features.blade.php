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
                        <a href="#" class="btn btn-outline-light btn-sm" style="font-weight: bold;"
                            id="importButton">Import</a>

                        <!-- Modal -->
                        <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog"
                                style="position: absolute; right: 10px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="importModalLabel">Import Features</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.importFeatures') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="importFile" class="form-label" style="text-align: left;">Select File</label>
                                                <input type="file" class="form-control" id="importFile" name="importFile" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="submit" class="btn btn-primary" value="Import"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="ZeroOneInfinityTable">
                                <thead>
                                    <tr>
                                        <th>#Sn</th>
                                        <th>Name</th>
                                        <th>Icon</th>
                                        <th>Description</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sn = 1;
                                    @endphp
                                    @foreach ($featuresData as $feature)
                                        <tr>
                                            <th>{{ $sn++ }}</th>
                                            <th>{{ $feature->name }}</th>
                                            <th><img src="{{ asset('assets/uploads/features/' . $feature->icon) }}"
                                                    alt="Feature Icon" width="50"></th>
                                            <th>{{ substr($feature->description, 0, 20) }}...</th>
                                            <th>
                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm trash-btn" data-url="{{ route('admin.deleteFeature', $feature->id) }}">
                                                    <i class="bi bi-trash3"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header mb-4 d-flex justify-content-between"
                        style="background-color:  #7884f1; border-left: 5px solid #7884f1;">
                        <h5 class="mb-0 text-white">
                            <i class="bi bi-plus-circle-dotted"></i>
                            <span>Add Feature</span>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.storeFeature') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-12 mb-2">
                                    <div class="form-group">
                                        <label for="feature_name" class="mb-2">
                                            Feature Name
                                            @error('feature_name')
                                                <span class="text-danger"> : {{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input type="text" class="form-control" id="feature_name" name="feature_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12 mb-2">
                                    <div class="form-group">
                                        <label for="feature_icon" class="mb-2">
                                            Feature Icon
                                            @error('feature_icon')
                                                <span class="text-danger"> : {{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input type="file" class="form-control" id="feature_icon" name="feature_icon">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12 mb-2">
                                    <div class="form-group">
                                        <label for="feature_desc" class="mb-2">
                                            Feature Description
                                            @error('feature_desc')
                                                <span class="text-danger"> : {{ $message }}</span>
                                            @enderror
                                        </label>
                                        <textarea name="feature_desc" id="feature_desc" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12 mb-2">
                                    <input type="submit" class="btn btn-primary pe-3" value="Save" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#ZeroOneInfinityTable').DataTable();
        });

        // modal
        document.getElementById('importButton').addEventListener('click', function(e) {
            e.preventDefault();
            var myModal = new bootstrap.Modal(document.getElementById('importModal'));
            myModal.show();
        });
    </script>
@endsection

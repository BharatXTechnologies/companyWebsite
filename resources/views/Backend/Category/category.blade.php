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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="ZeroOneInfinityTable">
                                <thead>
                                    <tr>
                                        <th>#Sn</th>
                                        <th>Category Name</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sn = 1;
                                    @endphp
                                    @foreach ($categories as $category)
                                        <tr>
                                            <th>{{ $sn++; }}</th>
                                            <th>{{ $category->name }}</th>
                                            <th><a href="{{ route('admin.deleteCategory', $category->id) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a></th>
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
                            <span>Add Category</span>
                        </h5>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('admin.storeCategory') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-12 mb-2">
                                    <div class="form-group">
                                        <label for="category_name" class="mb-2">Category Name</label>
                                        <input type="text" class="form-control" id="category_name" name="category_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12 mb-2">
                                    <input type="submit" class="btn btn-primary pe-3" value="Save"/>
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
    </script>
@endsection

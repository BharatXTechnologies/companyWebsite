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
                    <p class="p-0 m-0">
                        <a href="javascript:void(0);" class="btn btn-outline-light btn-sm restore-all-btn" data-url="{{ route('admin.restoreAll', ['module' => $module]) }}" style="font-weight: bold;">Restore All</a>
                        <a href="{{ route('admin.technologies') }}" class="btn btn-outline-light btn-sm" style="font-weight: bold;">Cancel</a>
                    </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="ZeroOneInfinityTable">
                            <thead style="border-top: 1px solid gray;">
                                <tr>
                                    <th>#Sn</th>
                                    @foreach($columns as $column)
                                        <th>{{ ucfirst(str_replace('_', ' ', $column)) }}</th>
                                    @endforeach
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$trashedData->isEmpty())
                                    @php
                                        $sn = 1;
                                    @endphp
                                    @foreach($trashedData as $data)
                                        <tr>
                                            <td> {{ $sn++ }} </td>
                                            @foreach($columns as $column)
                                                <td>{{ $data->$column ?? 'N/A' }}</td>
                                            @endforeach
                                            <td>
                                                <!-- Delete Button -->
                                                <a href="javascript:void(0);" 
                                                   class="btn btn-danger btn-sm p-delete-btn" 
                                                   data-url="{{ route('admin.deleteRecord', ['module' => $module, 'id' => $data->id]) }}">
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
    {{-- <script>
        document.querySelector('.restore-all-btn').addEventListener('click', function () {
            const url = this.getAttribute('data-url');
            if (confirm('Are you sure you want to restore all records?')) {
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert('An error occurred while restoring records.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
            }
        });
    </script> --}}
@endsection

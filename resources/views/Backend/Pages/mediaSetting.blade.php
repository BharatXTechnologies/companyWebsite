@extends('Backend.Common.MainLayout')
@push('setTitle')
    Website Setting - Media Settings
@endpush

@section('content')
    @include('Backend.Common.successMessagae')
    <section class="section">
        @include('Backend.Common.breadcrumb')
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header mb-4 d-flex justify-content-between"
                        style="background-color:  #7884f1; border-left: 5px solid #7884f1;">
                        <h5 class="mb-0 text-white pt-2">
                            <i class="bi bi-image "></i>
                            <span>Website Logo</span>
                        </h5>
                        <a href="javascript:void(0)" class="btn btn-outline-light btn-sm"
                            onclick="document.getElementById('logoForm').submit();">
                            <i class="bi bi-floppy" style="font-size: 1.2rem;"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <form id="logoForm" action="{{ route('admin.storeSocialMediaSetting', 'logo') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="currentLogo" value="">

                            <div class="form-group mb-2">
                                <label for="logo" class="form-label">Upload Logo</label>
                                <div class="image-preview-container">
                                    <img id="imagePreview" src="https://via.placeholder.com/150" alt="Image Preview"
                                        class="image-preview">
                                    <label for="logo" class="upload-icon">
                                        <i class="bi bi-camera"></i>
                                    </label>
                                </div>
                                <input type="file" class="form-control d-none" id="logo" name="logo"
                                    accept="image/*">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header mb-4 d-flex justify-content-between"
                        style="background-color:  #7884f1; border-left: 5px solid #7884f1;">
                        <h5 class="mb-0 text-white pt-2">
                            <i class="bi bi-image "></i>
                            <span>Website Favicon</span>
                        </h5>
                        <a href="" class="btn btn-outline-light btn-sm">
                            <i class="bi bi-floppy" style="font-size: 1.2rem;"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="currentBanner" value="">

                            <div class="form-group mb-2">
                                <label for="banner" class="form-label">Upload Website Banner</label>
                                <div class="banner-preview-container">
                                    <img id="bannerPreview" src="https://via.placeholder.com/600x200" alt="Banner Preview"
                                        class="banner-preview">
                                    <label for="banner" class="banner-upload-icon">
                                        <i class="bi bi-camera"></i>
                                    </label>
                                </div>
                                <input type="file" class="form-control d-none" id="banner" name="banner"
                                    accept="image/*">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

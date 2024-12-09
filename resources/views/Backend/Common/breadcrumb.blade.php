<div class="row">
    <div class="col-lg-12">
        <div class="card" style="border-left: 5px solid #7884f1; ">
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
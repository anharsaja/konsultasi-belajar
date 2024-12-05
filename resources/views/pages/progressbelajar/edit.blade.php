<x-layouts-dashboard>
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Progress Belajar Mahasiswa</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Progress Belajar</a></li>
                        <li class="breadcrumb-item">List Mahasiswa</li>
                        <li class="breadcrumb-item active">Form Progress Belajar</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> </h4>
                </div>
                <div class="card-body">
                    <div class="container-sm" style="max-width: 600px;">
                        <div class="mb-4 text-center">
                            <h5>Progress Belajar</h5>
                            <p>Tuliskan progress belajar mahasiswa</p>
                        </div>
                        <form action="{{ route('progressbelajarmhs.update', $progress->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row" id="catatan_konsultasi">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <p for="catatan_konsultasi" class="form-label">Progress Belajar Mahasiswa</p>
                                        @if ($progress->progress_detail !== null)
                                            <p class="badge badge-soft-warning font-size-12">Anda telah memberikan
                                                catatan hasil konsultasi</p>
                                        @endif
                                        <textarea name="progress_detail" class="form-control" rows="16">{{ $progress->progress_detail }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan <i
                                    class="bx bx-chevron-right ms-1"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

</x-layouts-dashboard>

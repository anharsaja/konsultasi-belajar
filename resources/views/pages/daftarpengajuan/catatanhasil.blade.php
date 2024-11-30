<x-layouts-dashboard>
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Pengajuan Konsultasi Mahasiswa</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Daftar Pengajuan</a></li>
                        <li class="breadcrumb-item">List Pengajuan Konsultasi</li>
                        <li class="breadcrumb-item active">Catatan Hasil Konsultasi</li>
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
                            <h5>Catatan Hasil Konsultasi</h5>
                            <p>Tuliskan catatan hasil konsultasi</p>
                        </div>
                        <form action="{{ route('addcatatankonsul', $consultation->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row" id="catatan_konsultasi">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="catatan_konsultasi" class="form-label">Catatan Konsultasi</label>
                                        <textarea name="note" class="form-control" rows="4"></textarea>
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

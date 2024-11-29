<x-layouts-dashboard>
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Biodata Diri</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pengajuan</li>
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
                                    <div class="text-center mb-4">
                                        <h5>Ajukan Pembelajaran</h5>
                                        <p class="card-title-desc">Fill all information below</p>
                                    </div>
                                    <form id="profileForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Nama
                                                        Lengkap</label>
                                                    <input name="name" type="text"
                                                        class="form-control disabled-input"
                                                        value="{{ Auth::user()->name }}" id="basicpill-firstname-input"
                                                        disabled placeholder="Masukkan Nama Lengkap"
                                                        style="background-color: #e9ecef; cursor: not-allowed;">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-phoneno-input"
                                                        class="form-label">Email</label>
                                                    <input name="email" type="text" class="form-control"
                                                        value="{{ Auth::user()->email }}"
                                                        style="background-color: #e9ecef; cursor: not-allowed;"
                                                        id="basicpill-phoneno-input" placeholder="Masukkan Email"
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input" class="form-label">Mata Kuliah</label>
                                                    <select name="gender" class="form-select"
                                                        id="basicpill-email-input">
                                                        <option disabled selected>Select</option>
                                                        <option value="male">Laki - Laki</option>
                                                        <option value="female">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input" class="form-label">Dosen Pembimbing</label>
                                                    <select name="gender" class="form-select"
                                                        id="basicpill-email-input">
                                                        <option disabled selected>Select</option>
                                                        <option value="male">Laki - Laki</option>
                                                        <option value="female">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="example-date-input" class="form-label">Tanggal Pengajuan</label>
                                                    <input name="tgl_lahir" class="form-control" type="date"
                                                        value="2019-08-19" id="example-date-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="basicpill-biografi-input" class="form-label">Note (opsional)</label>
                                                    <textarea name="biografi" id="basicpill-biografi-input" class="form-control" rows="4"
                                                        placeholder="Tambahkan catatan tambahan"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <button type="button" class="btn btn-primary">Simpan <i class="bx bx-chevron-right ms-1"></i></button> -->
                                        <a type="button" class="btn btn-primary" href="{{ route('pengajuan') }}">Simpan <i class="bx bx-chevron-right ms-1"></i></a>
                                    </form>
                                </div>
                            </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
</x-layouts-dashboard>

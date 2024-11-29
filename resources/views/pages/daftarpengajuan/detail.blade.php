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
                        <li class="breadcrumb-item active">Detail Pengajuan Konsultasi</li>
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
                            <h5>Ajukan Konsultasi</h5>
                        </div>
                        <form action="{{ route('daftarpengajuan.update', $consultation->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input" class="form-label">Nama
                                            Lengkap</label>
                                        <input name="name" type="text" class="form-control disabled-input"
                                            value="{{ $consultation->student_name }}" id="basicpill-firstname-input"
                                            disabled style="background-color: #e9ecef; cursor: not-allowed;">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-phoneno-input" class="form-label">Waktu yang
                                            diinginkan</label>
                                        <input name="email" type="text" class="form-control"
                                            value="{{ \Carbon\Carbon::parse($consultation->scheduled_time)->format('Y-m-d') }}"
                                            style="background-color: #e9ecef; cursor: not-allowed;"
                                            id="basicpill-phoneno-input" placeholder="Masukkan Email" disabled>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input" class="form-label">Mata Kuliah</label>
                                        <input name="name" type="text" class="form-control disabled-input"
                                            value="{{ $consultation->course_name }}" id="basicpill-firstname-input"
                                            disabled style="background-color: #e9ecef; cursor: not-allowed;">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" class="form-select" id="status_select">
                                            @foreach (['pending', 'approved', 'rejected', 'rescheduled'] as $value)
                                                <option value="{{ $value }}"
                                                    {{ $value == $consultation->status ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row d-none" id="tanggal_konsultasi">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-date-input" class="form-label">Tanggal Pengajuan</label>
                                        <input name="scheduled_time" class="form-control" type="date"
                                            id="example-date-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="basicpill-biografi-input" class="form-label">Issue</label>
                                        <textarea name="note" id="basicpill-biografi-input" disabled class="form-control" rows="4"
                                            style="background-color: #e9ecef; cursor: not-allowed;">{{ $consultation->note }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-none" id="alasan_ditolak">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="alasan_ditolak" class="form-label">Alasan Ditolak</label>
                                        <textarea name="reason_rejected" class="form-control" rows="4">{{ $consultation->reason_rejected }}</textarea>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('status_select');
            const rejectedReason = document.getElementById('alasan_ditolak');
            const rescheduleDate = document.getElementById('tanggal_konsultasi');

            function toggleFields() {
                const status = statusSelect.value;
                if (status === 'rejected') {
                    rejectedReason.classList.remove('d-none');
                    rescheduleDate.classList.add('d-none');
                } else if (status === 'rescheduled') {
                    rescheduleDate.classList.remove('d-none');
                    rejectedReason.classList.add('d-none');
                } else {
                    rejectedReason.classList.add('d-none');
                    rescheduleDate.classList.add('d-none');
                }
            }

            statusSelect.addEventListener('change', toggleFields);
            toggleFields();
        })
    </script>

</x-layouts-dashboard>

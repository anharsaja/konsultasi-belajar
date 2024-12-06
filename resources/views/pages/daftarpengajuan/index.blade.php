<x-layouts-dashboard>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Daftar Pengajuan Konsultasi Mahasiswa</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Daftar Pengajuan</a></li>
                        <li class="breadcrumb-item active">List Pengajuan Konsultasi</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- end row -->

                    <div class="table-responsive">

                        <table class="datatable dt-responsive table-check table align-middle"
                            style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                            <thead>
                                <tr class="bg-transparent">
                                    <th style="width: 120px;">No</th>
                                    <th>Mahasiswa</th>
                                    <th>Mata Kuliah</th>
                                    <th>Masalah</th>
                                    <th>Waktu yang Diinginkan</th>
                                    <th>Status</th>
                                    <th style="width: 90px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($consultations as $key => $consultation)
                                    <tr>
                                        <td><a href="javascript: void(0);"
                                                class="text-body fw-medium">{{ $key + 1 }}</a> </td>
                                        <td>
                                            {{ $consultation->student_name }}
                                        </td>
                                        <td>{{ $consultation->course_name }}</td>

                                        <td>
                                            {{ \Illuminate\Support\Str::limit($consultation->issue, 30, '...') }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($consultation->preferred_time)->format('Y-m-d') }}
                                        </td>
                                        @php
                                            $badgeClasses = [
                                                'pending' => 'badge badge-soft-warning', // Warna kuning untuk pending
                                                'approved' => 'badge badge-soft-success', // Warna hijau untuk approved
                                                'rejected' => 'badge badge-soft-danger', // Warna merah untuk rejected
                                                'rescheduled' => 'badge badge-soft-primary', // Warna biru untuk rescheduled
                                            ];
                                        @endphp

                                        <td>
                                            <span
                                                class="{{ $badgeClasses[$consultation->status] ?? 'badge badge-secondary' }} font-size-12">
                                                {{ ucfirst($consultation->status) }}
                                            </span>
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-link font-size-16 text-muted dropdown-toggle py-0 shadow-none"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('daftar-pengajuan.edit', $consultation->id) }}">Tanggapi</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('catatankonsultasi', $consultation->id) }}">Catatan
                                                            hasil</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- end table responsive -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</x-layouts-dashboard>

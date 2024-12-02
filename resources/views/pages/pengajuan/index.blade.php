<x-layouts-dashboard>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Daftar Pengajuan</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Daftar Pengajuan</li>
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
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-4">
                                <a href="{{ route('pengajuan.create')}}" class="btn btn-light waves-effect waves-light"> <i class="bx bx-plus me-1"></i> Tambah Ajuan </a>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="table-responsive">
                            <table class="datatable dt-responsive table-check nowrap table align-middle" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                <thead>
                                    <tr class="bg-transparent">
                                        <th style="width: 120px;">No</th>
                                        <th>Date</th>
                                        <th>Mata Kuliah</th>
                                        <th>Dosen Pembimbing</th>
                                        <th>Status</th>
                                        <th style="width: 90px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $counter = 1;
                                    @endphp
                                    @foreach ($consultations as $consultation) <tr>
                                        <td>
                                            <a href="javascript:void(0);" class="text-body fw-medium">{{ $counter }}</a>
                                        </td>
                                        <td> {{ explode('.',$consultation->scheduled_time)[0]}} </td>
                                        <td>{{ $consultation->course->course_name }}</td>

                                        <td> {{ $consultation->lecturer->name }} </td>
                                        @php
                                        $badgeClasses = [
                                        'pending' => 'badge
                                        badge-soft-warning', // Warna kuning untuk pending
                                        'approved' => 'badge
                                        badge-soft-success', // Warna hijau untuk approved
                                        'rejected' => 'badge
                                        badge-soft-danger', // Warna merah untuk rejected
                                        'rescheduled' => 'badge badge-soft-primary']; // Warna biru untuk rescheduled
                                        @endphp
                                        <td>
                                            <span class="{{ $badgeClasses[$consultation->status] ?? 'badge badge-secondary'}} font-size-12"> {{ ucfirst($consultation->status)}} </span>
                                        </td>
                                        <td class="d-flex justify-content-start">
                                            <button @if ($consultation->status == 'pending') disabled @endif class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRoom{{$consultation->id}}" data-bs-whatever="@mdo">Notes</button>


                                            <!-- Modallll -->
                                            <div class="modal fade" id="addRoom{{$consultation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form class="modal-content" method="POST">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Dosen Notes</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">Issue</label>
                                                                    <textarea name="issue" id="basicpill-biografi-input" disabled class="form-control" rows="4"
                                                                        style="background-color: #e9ecef; cursor: not-allowed;">{{ $consultation->Issue ?? "Mahasiswa tidak memiliki issue"}}</textarea>
                                                                </div>
                                                            </div>
                                                             <div>
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">Notes</label>
                                                                    <textarea name="issue" id="basicpill-biografi-input" disabled class="form-control" rows="4"
                                                                        style="background-color: #e9ecef; cursor: not-allowed;">{{ $consultation->note ?? "Tidak ada catatan dari dosen"}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                    $counter++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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

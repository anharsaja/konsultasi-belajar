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
                                <a href="{{ route('pengajuan.create') }}"
                                    class="btn btn-light waves-effect waves-light">
                                    <i class="bx bx-plus me-1"></i> Tambah Ajuan
                                </a>
                            </div>
                        </div>

                    <!-- end row -->

                    <div class="table-responsive">
                        <table class="datatable dt-responsive table-check nowrap table align-middle"
                            style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
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
                                @foreach ($consultations as $consultation)
                                    <tr>


                                        <td><a href="javascript: void(0);"
                                                class="text-body fw-medium">{{ $counter }}</a> </td>
                                        <td>
                                            {{ explode('.', $consultation->scheduled_time)[0] }}
                                        </td>
                                        <td>{{ $consultation->course->course_name }}</td>

                                        <td>
                                            Dr. Zarkasi Santonius
                                        </td>
                                        <td>
                                            <div class="badge badge-soft-warning font-size-12">pending</div>
                                        </td>





                                                <td class="d-flex justify-content-start">
    <a href="{{ route('pengajuan.create') }}" class="btn btn-primary waves-effect waves-light w-md me-2">
        <i class="fas fa-edit"></i> Edit
    </a>
    <a href="{{ route('pengajuan.create') }}" class="btn btn-danger waves-effect waves-light w-md">
        <i class="fas fa-trash"></i> Delete
    </a>
</td>

                                    </tr>
                                    <LeftMouse>@php
                                        $counter++;
                                    @endphp
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

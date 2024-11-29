<x-layouts-dashboard>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Invoice List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                        <li class="breadcrumb-item active">Pengajuan Details</li>
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


                        <div class="col-sm-auto">
                            <div class="d-flex align-items-center mb-4 gap-1">
                                <div class="input-group datepicker-range">
                                    <input type="text" class="form-control flatpickr-input" data-input
                                        aria-describedby="date1">
                                    <button class="input-group-text" id="date1" data-toggle><i
                                            class="bx bx-calendar-event"></i></button>
                                </div>
                                <div class="dropdown">
                                    <a class="btn btn-link text-muted font-size-16 dropdown-toggle py-1 shadow-none"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="table-responsive">
                        <table class="datatable dt-responsive table-check nowrap table align-middle"
                            style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                            <thead>
                                <tr class="bg-transparent">
                                    <th style="width: 30px;">
                                        <div class="form-check font-size-16">
                                            <input type="checkbox" name="check" class="form-check-input"
                                                id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th style="width: 120px;">No</th>
                                    <th>Date</th>
                                    <th>Mata Kuliah</th>
                                    <th>Dosen Pembimbing</th>
                                    <th>Status</th>
                                    <th style="width: 150px;">Download Pdf</th>
                                    <th style="width: 90px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($consultations as $consultation)
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input type="checkbox" class="form-check-input">
                                                <label class="form-check-label"></label>
                                            </div>
                                        </td>

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
                                        <td>
                                            <div>
                                                <button type="button"
                                                    class="btn btn-soft-light btn-sm w-xs waves-effect btn-label waves-light"><i
                                                        class="bx bx-download label-icon"></i> Pdf</button>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-link font-size-16 text-muted dropdown-toggle py-0 shadow-none"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Print</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
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

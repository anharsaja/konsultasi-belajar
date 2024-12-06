<x-layouts-dashboard>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Daftar Pengajuan Konsultasi Mahasiswa</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Progrss Belajar</li>
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
                                    <th>Mahasiswa</th>
                                    <th>Mata Kuliah</th>
                                    <th style="width: 90px;" class="mx-auto text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $key => $student)
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input type="checkbox" class="form-check-input">
                                                <label class="form-check-label"></label>
                                            </div>
                                        </td>

                                        <td><a href="javascript: void(0);"
                                                class="text-body fw-medium">{{ $key + 1 }}</a> </td>
                                        <td>
                                            {{ $student->student_name }}
                                        </td>
                                        <td>{{ $student->course_name }}</td>

                                        <td style="width: 200px" class="d-flex">
                                            <a class="btn btn-success btn-sm font-size-16 mx-auto px-8"
                                                href="{{ route('progressbelajarmhs.edit', ['studentId' => $student->student_id, 'courseId' => $student->course_id]) }}">Beri
                                                Progress</a>
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

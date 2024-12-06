<x-layouts-dashboard>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Progress</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Progress Belajar</a></li>
                        <li class="breadcrumb-item active">Progress Belajar</li>
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

                        <div class="table-responsive">
                            <table class="datatable dt-responsive table-check nowrap table align-middle"
                                style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                <thead>
                                    <tr class="bg-transparent">
                                        <th style="width: 120px;">No</th>
                                        <th>Mata Kuliah</th>
                                        <th>Pengampu</th>
                                        <th>Progress Detail</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 1;
                                    @endphp
                                    @foreach ($progress as $progres)
                                        <tr>
                                            <td>
                                                <a href="javascript:void(0);"
                                                    class="text-body fw-medium">{{ $counter }}</a>
                                            </td>
                                            <td> {{ $progres->course_name }} </td>
                                            <td>{{ $progres->dosen_name }}</td>

                                            <td> {{ $progres->progress_detail == null ? 'Belum ada penilaian progress dari dosen' : \Illuminate\Support\Str::limit($progres->progress_detail, 30, '...') }}
                                            </td>

                                            <td class="d-flex justify-content-start">
                                                <button class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#addRoom{{ $progres->id }}"
                                                    data-bs-whatever="@mdo">Detail</button>


                                                <!-- Modallll -->
                                                <div class="modal fade" id="addRoom{{ $progres->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form class="modal-content" method="POST">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Penilaian
                                                                    Dosen</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div>
                                                                    <div class="mb-3">
                                                                        <textarea name="issue" id="basicpill-biografi-input" disabled class="form-control" rows="12" ">{{ $progres->progress_detail == null ? 'Belum ada penilaian progress dari dosen' : $progres->progress_detail }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-dismiss="modal">Close</button>
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
                        <!-- end table responsive -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        <script>
            document.querySelectorAll('tr[data-url]').forEach(row => {
                row.addEventListener('click', () => {
                    window.location.href = row.getAttribute('data-url');
                });
            });
        </script>
</x-layouts-dashboard>

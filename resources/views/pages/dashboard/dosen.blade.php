<x-layouts-dashboard>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted lh-1 d-block mb-3">Mata Kuliah</span>
                            <h4 class="mb-3">
                                <span class="">{{ $courses }}</span>
                            </h4>
                        </div>
                        <div class="col-6">
                            <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                        </div>
                    </div>
                    <div class="text-nowrap">
                        <span class="text-muted font-size-13">Yang diampu</span>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col-->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted lh-1 d-block mb-3">Jumlah pengajuan konsultasi</span>
                            <h4 class="mb-3">
                                <span class="">{{ $consultations }}</span>
                            </h4>
                        </div>
                        <div class="col-6">
                            <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                        </div>
                    </div>
                    <div class="text-nowrap">
                        <span class="text-muted font-size-13">Yang diajukan mahasiswa</span>
                    </div>
                </div>
            </div><!-- end card -->
        </div><!-- end col-->

    </div><!-- end row-->

    </div>
    <hr>
    <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</x-layouts-dashboard>

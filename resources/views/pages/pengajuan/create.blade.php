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
                                    <form id="profileForm" action="{{ route('pengajuan.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Nama
                                                        Lengkap</label>
                                                    <input type="hidden" name="mahasiswa_id" value="{{ Auth::user()->id }}">
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
                                                    <label for="courses" class="form-label">Mata Kuliah</label>
                                                    <select name="course_id" class="form-select" id="courses">
                                                        <option disabled selected>Pilih Kursus</option>
                                                        @foreach($courses as $course)
                                                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="dosencourses" class="form-label">Dosen Pembimbing</label>
                                                    <select name="dosen_id" class="form-select" id="dosencourses">
                                                        <option disabled selected>Pilih Dosen Pembimbing</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="example-date-input" class="form-label">Tanggal Pengajuan</label>
                                                    <input name="scheduled_time" class="form-control" type="date" id="example-date-input" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="basicpill-biografi-input" class="form-label">Note (opsional)</label>
                                                    <textarea name="note" id="basicpill-biografi-input" class="form-control" rows="4"
                                                        placeholder="Tambahkan catatan tambahan"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan <i class="bx bx-chevron-right ms-1"></i></button>
                                    </form>
                                </div>
                            </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

<script>
    document.getElementById('courses').addEventListener('change', function () {
    const courseId = this.value; // Ambil course_id dari dropdown
    const dosenSelect = document.getElementById('dosencourses');

    // Kosongkan dropdown dosencourses
    dosenSelect.innerHTML = '<option disabled selected>Pilih Dosen Pembimbing</option>';

    // Lakukan AJAX request untuk mendapatkan dosencourses
    fetch(`/dosen/${courseId}`)
        .then(response => response.json())
        .then(data => {
            // Tambahkan opsi dosen yang relevan
            data.forEach(dosencourse => {
                const option = document.createElement('option');
                option.value = dosencourse.id;
                option.textContent = dosencourse.lecturer.name; // Jika lecturer memiliki kolom name
                dosenSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching dosen:', error));
});

// Saat halaman dimuat, muat pilihan sebelumnya
window.addEventListener('DOMContentLoaded', function () {
    const selectedCourse = document.getElementById('courses');

    if (selectedCourse.value) {
        // document.getElementById('courses').value = selectedCourse;
        // Lakukan fetch untuk dosencourses
        fetch(`/dosen/${selectedCourse.value}`)
            .then(response => response.json())
            .then(data => {
                const dosenSelect = document.getElementById('dosencourses');
                dosenSelect.innerHTML = '<option disabled selected>Pilih Dosen Pembimbing</option>';
                data.forEach(dosencourse => {
                    const option = document.createElement('option');
                    option.value = dosencourse.id;
                    option.textContent = dosencourse.lecturer.name;
                    dosenSelect.appendChild(option);
                });
            });
    }

       // Ambil elemen input
    const dateInput = document.getElementById('example-date-input');
    
    // Dapatkan tanggal hari ini dalam format yyyy-mm-dd
    const today = new Date().toISOString().split('T')[0];
    
    // Tetapkan nilai awal pada input
    dateInput.value = today;
});


</script>
</x-layouts-dashboard>

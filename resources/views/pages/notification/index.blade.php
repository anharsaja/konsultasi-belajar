<x-layouts-dashboard>
    <!-- start page title -->

    <div class="mx-auto w-full max-w-3xl" style="max-width: 768px">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0" style="font-size: 2rem; font-weight:bold">Notification</h4>
                    @if ($hasUnreadNotifications)
                        <form action="{{ route('markasreadnotif') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-soft-secondary waves-effect waves-light">Mark As
                                read</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <!-- end page title -->

        @foreach ($notifications as $notification)
            <div
                class="notification-item rounded-3 {{ $notification->is_read ? 'bg-light text-dark' : 'bg-secondary text-light' }} mb-2">
                <div class="d-flex">
                    <div class="avatar-sm me-3">
                        @if ($notification->title == 'Dijadwalkan Ulang')
                            <span class="avatar-title bg-success rounded-circle font-size-16">
                                <i class="bx bx-info-circle"></i>
                            </span>
                        @elseif ($notification->title == 'Disetujui')
                            <span class="avatar-title bg-success rounded-circle font-size-16">
                                <i class="bx bx-check"></i>
                            </span>
                        @else
                            <span class="avatar-title bg-danger rounded-circle font-size-16">
                                <i class="bx bx-x"></i>
                            </span>
                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-1">{{ $notification->title }}</h6>
                        <div class="font-size-13 text-muted">
                            <p class="mb-1">{{ $notification->message }}</p>
                            <span>{{ $notification->created_at }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</x-layouts-dashboard>

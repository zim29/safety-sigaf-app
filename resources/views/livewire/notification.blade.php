<!-- Start::header-element -->
<div class="header-element notifications-dropdown">
    <!-- Start::header-link|dropdown-toggle -->
    <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
        <i class="bx bx-bell header-link-icon"></i>
        @if($newNotificationCount > 0)
            <span class="badge bg-secondary rounded-pill header-icon-badge pulse pulse-secondary" id="notification-icon-badge">{{ $newNotificationCount }}</span>
        @endif
    </a>
    <!-- End::header-link|dropdown-toggle -->
    <!-- Start::main-header-dropdown -->
    <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
        <div class="p-3">
            <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 fs-17 fw-semibold">{{ __('Notificaciones') }}</p>
                @if($newNotificationCount > 0)
                    <span class="badge bg-secondary-transparent" id="notifiation-data" wire:model="newNotificationCount"> {{ $newNotificationCount }} {{__('Notificaciones sin leer') }}</span>
                @endif
            </div>
        </div>
        <div class="dropdown-divider"></div>
        <ul class="list-unstyled mb-0" id="header-notification-scroll" >
            @foreach($notificationsMessages as $message)
                <li class="dropdown-item" >
                    <div class="d-flex align-items-start">
                         <div class="pe-2">
                             <span class="avatar avatar-md bg-primary-transparent avatar-rounded">
                                @if( str_contains( $message['notification_type'], 'vehicle' ) )
                                    <i class="bx bxs-truck fs-18"></i>
                                @endif
                            </span>
                         </div>
                         <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                            <div>
                                @if( $message['notification_type'] === 'vehicle_trasnfer_request' )
                                    <p class="mb-0 fw-semibold">
                                        <a wire:click="markAsReaded({{$message['id']}})" href="{{ route('transfer-vehicle', $message['request_id']) }}">{{ __($message['notification_type']) }}</a>
                                    </p>
                                    @if(!$message['readed'])
                                        <p class="mb-0"> {{ __('Sin leer') }} </p>
                                    @endif
                                @endif
                            </div>
                            <div>
                                <a href="javascript:void(0);" class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i class="ti ti-x fs-16"></i></a>
                            </div>
                         </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="p-3 empty-header-item1 border-top">
            <div class="d-grid">
                <a href="notifications.html" class="btn btn-primary">Ver todo</a>
            </div>
        </div>
        <div class="p-5 empty-item1 d-none">
            <div class="text-center">
                <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                    <i class="ri-notification-off-line fs-2"></i>
                </span>
                <h6 class="fw-semibold mt-3">No New Notifications</h6>
            </div>
        </div>
    </div>
    <!-- End::main-header-dropdown -->
</div>
<!-- End::header-element -->

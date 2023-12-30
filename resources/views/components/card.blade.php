@props([
    'title' => '',
    ])

<div>
    <div class="card custom-card">
        <div class="card-header">
            <div class="card-title">
                {{ __($title) }}
            </div>
        </div>
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</div>
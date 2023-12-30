@props([
        'id' => null, 
        'title' => '',
        ])

<x-modal :id="$id"  {{ $attributes }}>
    <div class="modal-header">
        <h6 class="modal-title">{{ $title }}</h6>
        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
    </div>
    <div class="modal-body text-start">
        {{ $content }}
    </div>
    <div class="modal-footer">
        {{ $footer }}
    </div>

</x-modal>

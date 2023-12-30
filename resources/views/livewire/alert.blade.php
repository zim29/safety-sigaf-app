<div>
    <x-dialog-modal 
                    data-bs-backdrop="static"
                    id="alert" 
    >
        <x-slot name="title">
                {{ $title }}
        </x-slot>
        <x-slot name="content">
            <div class="mt-3">
                <p class="text-center "><i class="{{$icon}} text-{{$color}}" style="font-size: 5rem;"></i></p>
                <p class="text-center fs-40">{!! __($mainText) !!}</p>
                <p class="{{ !$center?: 'text-center'  }} fs-22 overflow-auto">{!! __($message) !!}</p>
            </div>
            
        </x-slot>

        <x-slot name="footer" >
            <div class="row w-100">
                <div class="col-12 vstack gap-1">
                    <button 
                            id="closeAlert" 
                            class="btn btn-{{$color}} w-100" 
                            data-bs-dismiss="modal"

                    >
                        {{ __('Cerrar') }}
                    </button>
                </div>         
            </div>
        </x-slot>
    </x-dialog-modal>
</div>

@push('scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:initialized', () => {
            @this.on('show-alert', ( ) => {
                bootstrap.Modal.getOrCreateInstance(document.getElementById('alert')).show();
                document.getElementById('closeAlert').focus()
            })
        })
    </script>
@endpush
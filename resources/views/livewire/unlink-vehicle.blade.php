<div>
    <x-dialog-modal 
                    data-bs-backdrop="static"
                    id="unlinkVehicle" 
    >
        <x-slot name="title">
                {{ __('Desvincular vehículo') }}
        </x-slot>
        <x-slot name="content">
            <div class="mt-3">
                <div class="mt-3">
                    <p class="text-center "><i class="bi bi-exclamation-circle text-warning" style="font-size: 5rem;"></i></p>
                    <p class="text-center fs-40">{{ __('Advertencia') }}</p>
                    <p class="text-center fs-22 overflow-auto">{!! __('Esta acción no puede revertirse, una vez retirado este vehículo de tu empresa se bloquearán todos los accesos solicitados por su empresa y no contará con permisos de accesos a la(s) estacione(s).') !!}</p>
                </div>
            </div>
            
        </x-slot>

        <x-slot name="footer" >
            <div class="row w-100">
                <div class="col-12 hstack gap-1">
                    <button 
                            id="approveTransfer" 
                            class="btn btn-danger w-100" 
                            data-bs-dismiss="modal"
                            wire:click="requestUnlink"
                    >
                        {{ __('Desvincular') }}
                    </button>

                    <button 
                            id="closeTransfer" 
                            class="btn btn-warning w-100" 
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
            @this.on('show-unlink-vehicle-modal', ( ) => {
                bootstrap.Modal.getOrCreateInstance(document.getElementById('unlinkVehicle')).show();
                document.getElementById('closeAlert').focus()
            })
        })
    </script>
@endpush
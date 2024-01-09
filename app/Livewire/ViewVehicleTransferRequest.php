<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

use App\Traits\ConfirmsToken;

use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\DB;

use App\Models\VehicleTransferRequest as VTR;
use App\Models\Authorization;

class ViewVehicleTransferRequest extends Component
{

    use ConfirmsToken;

    public VTR $request;

    public function approve () : void 
    {
        DB::beginTransaction();

        try {

            $this->authorize('update', $this->request->vehicle);

            Authorization::create(['user_id' => \Auth::id(), 'type' => 'approve_vehicle_transfer', 'request_id' => $this->request->id]);     

            $this->request->vehicle->company_id = $this->request->to_company_id;
            $this->request->vehicle->save();

            $this->request->status = 'approved_by_user';
            $this->request->save();


            if( $this->request->vehicle->wasChanged() && $this->request->wasChanged()) 
            {
                DB::commit();
            }
            else
            {
                $this->dispatch('error');
                return;
            }


            $this->dispatch('success');


        } catch ( AuthorizationException $e ) {

            $this->dispatch('unauthorized');
            
        } catch ( \Exception $e) {     

            DB::rollback();
            $this->dispatch( 'error' );
            \Log::channel('appexeceptions')->error('Error trafering vehicle transfer',['user_id' => \Auth::id(), 
                                                                            'fullname' => \Auth::user()->fullname, 
                                                                            'module' => get_class($this), 
                                                                            'message' => $e->getMessage()
                                                                            ]);

        }
        
    }

    public function decline () : void 
    {
        DB::beginTransaction();

        try {

            $this->authorize('update', $this->request->vehicle);

            Authorization::create(['user_id' => \Auth::id(), 'type' => 'reject_vehicle_transfer', 'request_id' => $this->request->id]);     

            $this->request->status = 'rejected_by_user';
            $this->request->save();


            if( $this->request->wasChanged() )  
            {
                DB::commit();
            }
            else
            {
                $this->dispatch('error');
                return;
            }


            $this->dispatch('success');


        } catch ( AuthorizationException $e ) {

            $this->dispatch('unauthorized');
            
        } catch ( \Exception $e) {     

            DB::rollback();
            $this->dispatch( 'error' );
            \Log::channel('appexeceptions')->error('Error rejecting vehicle transfer',['user_id' => \Auth::id(), 
                                                                            'fullname' => \Auth::user()->fullname, 
                                                                            'module' => get_class($this), 
                                                                            'message' => $e->getMessage()
                                                                            ]);

        }
        
    }

    public function mount (int $id) : void 
    {
        $this->request = VTR::findOrFail($id);
    }

    #[Title('Traspaso de vehículo')]
    public function render()
    {
        // $this->authorize('update', $this->request->vehicle);
        return view('livewire.view-vehicle-transfer-request');
    }
}

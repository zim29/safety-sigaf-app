<x-mail::message>
# {{ __('Notificación de Solicitud de Traspaso de Vehículo') }}

Estimado usuario,

Le informamos que se ha realizado una solicitud de traspaso para su vehículo en nuestra plataforma **Safety Sigaf**.

### Detalles de la Solicitud:
- **Número de Solicitud:** {{ $request->id }}
- **Vehículo:** {{ $request->vehicle->brand->name }} {{ $request->vehicle->model }}
- **Fecha de Solicitud:** {{ \Carbon\Carbon::parse($request->createdAt)->format('d/m/Y h:i:s') }}

<img  width="100%" src="{{ asset('storage/vehicle/'. $request->vehicle->id ) }}">

Esta notificación sirve para mantenerlo informado sobre las acciones realizadas en relación con vehículos vinculados a su cuenta.

Para más detalles o en caso de cualquier consulta, no dude en acceder a su cuenta en **Safety Sigaf**.

<x-mail::button :url="route('transfer-vehicle', $request->id)">
{{ __('Ver solicitud') }}
</x-mail::button>

Agradecemos su atención.

Saludos cordiales,  
{{ config('app.name') }}



</x-mail::message>

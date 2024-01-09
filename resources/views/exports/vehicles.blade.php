<table border="1" cellspacing="3" cellpadding="4">
    <thead>
        <tr>
            <th colspan="4" style="text-align: center;">
                <img style="display: inline;" src="assets/images/brand-logos/bypaulBrand.jpg" alt="logo" class="desktop-logo" width="120" height="120">
            </th>
        </tr>
        <tr>
            <th style="font-weight: bold; text-align: center; font-size: 20px" colspan="4">
                {{ __('Listado de vehículos') }}
            </th>
        </tr>
        <tr>
            <th style="font-weight: bold; text-align: center">{{ __('Placa del vehículo') }}</th>
            <th style="font-weight: bold; text-align: center">{{ __('Placa del trailer') }}</th>
            <th style="font-weight: bold; text-align: center">{{ __('Tipo de vehículo') }}</th>
            <th style="font-weight: bold; text-align: center">{{ __('Empresa') }}</th>
        </tr>
    </thead>

    <tbody>
        @foreach($vehicles as $vehicle)
            <tr>
                <td style="text-align: center; border-bottom: 1px solid black;"> {{ $vehicle->placard }} </td>
                <td style="text-align: center; border-bottom: 1px solid black;"> {{ $vehicle->t_placard }} </td>
                <td style="text-align: center; border-bottom: 1px solid black;"> {{ $vehicle->type->name }} </td>
                <td style="text-align: center; border-bottom: 1px solid black;"> {{ $vehicle->company->name ?? __('Desvinculado') }} </td>
            </tr>
        @endforeach
    </tbody>
</table>
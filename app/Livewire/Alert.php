<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Alert extends Component
{

    public string $title = '';
    public string $mainText = '';
    public string $message = '';
    public string $color = '';
    public string $icon = '';
    public bool $center = true;
    public string $type;

    #[On('error')]
    public function error (
                    string $title = 'Error', 
                    string $mainText = 'Error',
                    string $message = 'Ha ocurrido un error procesando su solicitud.',
                    bool   $center = true,
                    string $icon = 'bi bi-exclamation-circle',
                    string $color = 'danger'
    ) : void
    {
        $this->title = __($title);
        $this->mainText = __($mainText); 
        $this->message = __($message); 
        $this->color = $color;
        $this->icon = $icon;
        $this->center = $center;
        $this->dispatch('show-alert');
        $this->type = 'error';
    }

    #[On('warning')]
    public function warning (
                    string $title = 'Advertencia', 
                    string $mainText = 'Advertencia',
                    string $message = 'Su solicitud requiere revisión.',
                    bool   $center = true,
                    string $icon = 'bi bi-exclamation-circle',
                    string $color = 'warning'
    ) : void 
    {
        $this->title = __($title);
        $this->mainText = __($mainText); 
        $this->message = __($message); 
        $this->color = $color;
        $this->icon = $icon;
        $this->center = $center;
        $this->dispatch('show-alert');
        $this->type = 'warning';
    }

    #[On('success')]
    public function success (
                    string $title = 'Éxito', 
                    string $mainText = 'Éxito',
                    string $message = 'Solicitud realizada exitósamente.',
                    bool   $center = true,
                    string $icon = 'bi bi-check-circle-fill',
                    string $color = 'success'
    ) : void 
    {
        $this->title = __($title); 
        $this->mainText = __($mainText);
        $this->message = __($message); 
        $this->color = $color;
        $this->icon = $icon;
        $this->center = $center;
        $this->dispatch('show-alert');
        $this->type = 'success';
    }

    #[On('unauthorized')]
    public function unauthorized ( ) 
    {
        $this->error(
                    'Error',
                    'Sin privilegios', 
                    'No cuenta con privilegios para realizar esta acción.',
                );
    }

    #[On('validation-error')]
    public function validationError ( array $errors ) 
    {
        $errorMessages = [];
        $i = 1;
        foreach($errors as $key => $error)
        {
            $errorMessages[] = $i++ . ' - ' . $error[0];
        }

        $this->error(
                    'Error de validación',
                    'Error', 
                    'No ha completado todos los campos requeridos procesar su requerimiento. Favor validar lo siguiente: <br>' . implode('<br>', $errorMessages),
                );
    }

    public function render()
    {
        return view('livewire.alert');
    }
}

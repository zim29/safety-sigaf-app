<x-mail::message>
# {{ __('Invitación a plataforma Safety Sigaf') }}

Es un placer para nosotros extenderle una cordial invitación para unirse a nuestra innovadora plataforma Safety Sigaf. 

Queremos asegurarle que su privacidad y seguridad son nuestra máxima prioridad. Hasta este momento, no hemos almacenado ninguna de sus informaciones personales en nuestra base de datos. Respetamos plenamente su derecho a la privacidad y aseguramos que ninguna información será almacenada hasta que usted decida registrarse y acepte nuestros términos y condiciones.

El proceso de registro es sencillo y solo toma unos minutos. Al registrarse, podrá acceder al sistema y esperar a que le proporcionen los accesos. Le animamos a leer detenidamente nuestros términos y condiciones para entender completamente cómo manejamos y protegemos sus datos personales.

Para comenzar su registro, por favor visite el siguiente enlace:

<x-mail::button :url="route('register', $userData)">
{{ __('registrarse') }}
</x-mail::button>


Agradecemos su atención y esperamos darle la bienvenida a la comunidad de Safety Sigaf.

Saludos cordiales,  
{{ config('app.name') }}



</x-mail::message>
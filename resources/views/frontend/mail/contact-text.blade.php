{{ __('Tiene una nueva solicitud del formulario de contacto. A continuación los detalles:') }}

{{ __('Nombre Completo') }}: {{ $request->name }}
{{ __('Dirección de correo') }}: {{ $request->email }}
{{ __('Teléfono') }}: {{ $request->phone ?? __('No Disponible') }}
{{ __('Mensaje') }}: {{ $request->message }}

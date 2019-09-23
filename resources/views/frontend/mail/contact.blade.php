<p>
    {{ __('Tiene una nueva solicitud del formulario de contacto. A continuación los detalles:') }}
</p>

<p>
    <strong>
        {{ __('Nombre Completo') }}:
    </strong>
    {{ $request->name }}
</p>

<p>
    <strong>
        {{ __('Dirección de correo') }}:
    </strong>
    {{ $request->email }}
</p>

<p>
    <strong>
        {{ __('Teléfono') }}:
    </strong>
    {{ $request->phone ?? __('No Disponible') }}
</p>

<p>
    <strong>
        {{ __('Mensaje') }}:
    </strong>
    {{ $request->message }}
</p>

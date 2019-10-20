{{ html()->modelForm($logged_in_user, 'PATCH', route('frontend.user.profile.update.settings'))->class('form-horizontal')->open() }}
<div class="kt-form kt-form--label-right">
    <div class="kt-form__body">
        <div class="kt-section kt-section--first">
            <div class="kt-section__body">
                <div class="row">
                    <div class="col">
                        {{ html()->label()->for('email_notification')->class('col-xl-3') }}
                        <div class="col-lg-9 col-xl-6">
                            <h3 class="kt-section__title kt-section__title-sm">
                                {{ __('Configuración General') }}:
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-6 col-sm-12 offset-lg-3 offset-xl-3">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Formato de Fecha'))->for('date_format') }}

                                @php $dateformat = $logged_in_user->settings['date_format'] ?? ''; @endphp
                                <select class="form-control select2" data-live-search="true" name="settings[date_format]">
                                    <option value="d/m/Y" @if($dateformat == 'd/m/Y') selected @endif>15/05/2018</option>
                                    <option value="d.m.Y" @if($dateformat == 'd.m.Y') selected @endif>15.05.2018</option>
                                    <option value="d-m-Y" @if($dateformat == 'd-m-Y') selected @endif>15-05-2018</option>
                                    <option value="m/d/Y" @if($dateformat == 'm/d/Y') selected @endif>05/15/2018</option>
                                    <option value="Y/m/d" @if($dateformat == 'Y/m/d') selected @endif>2018/05/15</option>
                                    <option value="Y-m-d" @if($dateformat == 'Y-m-d') selected @endif>2018-05-15</option>
                                    <option value="M d Y" @if($dateformat == 'M d Y') selected @endif>Mayo 15 2018</option>
                                    <option value="d M Y" @if($dateformat == 'd M Y') selected @endif>15 Mayo 2018</option>
                                    <option value="jS M y" @if($dateformat == 'jS M y') selected @endif>15 Mayo 18</option>
                                    <option value="F j, Y" @if($dateformat == 'F j, Y') selected @endif>Junio 17, 2018</option>
                                    <option value="j F, Y" @if($dateformat == 'j F, Y') selected @endif>17 Junio, 2018</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Formato de Hora'))->for('time_format') }}

                                @php $timeformat = $logged_in_user->settings['time_format'] ?? ''; @endphp
                                <select class="form-control select2" data-live-search="true" name="settings[time_format]">
                                    <option value="g:i A" @if($timeformat == 'g:i A') selected @endif>1:30 PM</option>
                                    <option value="g:i a" @if($timeformat == 'g:i a') selected @endif>1:30 pm</option>
                                    <option value="g:i" @if($timeformat == 'g:i') selected @endif>1:30</option>
                                    <option value="G:i a" @if($timeformat == 'G:i a') selected @endif>13:30 pm</option>
                                    <option value="G:i A" @if($timeformat == 'G:i A') selected @endif>13:30 PM</option>
                                    <option value="G:i" @if($timeformat == 'G:i') selected @endif>13:30</option>
                                    <option value="Gi" @if($timeformat == 'Gi') selected @endif>1330</option>
                                    <option value="g:i:s" @if($timeformat == 'g:i:s') selected @endif>1:33:00</option>
                                    <option value="G:i:s" @if($timeformat == 'G:i:s') selected @endif>13:33:00</option>
                                    <option value="G:i:s A" @if($timeformat == 'G:i:s A') selected @endif>13:33:00 PM</option>
                                    <option value="G:i:s a" @if($timeformat == 'G:i:s a') selected @endif>13:33:00 pm</option>
                                    <option value="g:i:s A" @if($timeformat == 'g:i:s A') selected @endif>1:33:00 PM</option>
                                    <option value="g:i:s a" @if($timeformat == 'g:i:s a') selected @endif>1:33:00 pm</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Zona Horaria'))->for('timezone') }}
                                @php $timezone = $logged_in_user->settings['timezone'] ?? ''; @endphp
                                <select name="settings[timezone]" class="form-control select2" data-live-search="true">
                                    @foreach (timezones() as $value => $label)
                                    <option value="{{ $value }}" @if($timezone == $value) selected @endif>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div><!--form-group-->
                        </div><!--col-->
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Idioma por Defecto'))->for('language') }}
                                @php $language = $logged_in_user->settings['language'] ?? ''; @endphp
                                <select name="settings[language]" class="form-control select2">
                                    <option value="es" @if($language == 'es') selected @endif>{{ __('Español') }}</option>
                                    <option value="en" @if($language == 'en') selected @endif>{{ __('Inglés') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            {{ html()->label(__('Representante'))->for('representante') }}

                            {{ html()->text('settings[representante]')
                            ->class('form-control')
                            ->attribute('maxlength', 191)
                            ->attribute('disabled', 'disabled')
                            ->value($logged_in_user->settings['representante'] ?? '') }}
                        </div>

                        <div class="col-6">
                            {{ html()->label(__('Cargo'))->for('position') }}

                            {{ html()->text('settings[position]')
                            ->class('form-control')
                            ->placeholder(__('Ej.: Director'))
                            ->attribute('maxlength', 191)
                            ->value($logged_in_user->settings['position'] ?? '') }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        {{ html()->label()->for('email_notification')->class('col-xl-3') }}
                        <div class="col-lg-9 col-xl-6">
                            <h3 class="kt-section__title kt-section__title-sm">
                                {{ __('Configurar notificación de correo:') }}
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-sm row">
                    {{ html()->label(__('Notificación de Correo'))->for('email_notification')->class('col-xl-3 col-lg-3 col-form-label') }}

                    <div class="col-lg-9 col-xl-6">
                        <span class="kt-switch">
                            <label>
                                <input type="checkbox" checked="checked" name="email_notification">
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>

                <div class="form-group form-group-last row">
                    {{ html()->label(__('Enviar copia a correo personal'))->for('email_notification_copy')->class('col-xl-3 col-lg-3 col-form-label') }}

                    <div class="col-lg-9 col-xl-6">
                        <span class="kt-switch">
                            <label>
                                <input type="checkbox" name="email_notification_copy">
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
        <div class="kt-section kt-section--first">
            <div class="kt-section__body">
                <div class="row">
                    <label class="col-xl-3"></label>
                    <div class="col-lg-9 col-xl-6">
                        <h3 class="kt-section__title kt-section__title-sm">
                            {{ __('Actividades relacionadas al correo') }}:
                        </h3>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">
                        {{ __('Cuando enviar correo electrónico') }}
                    </label>

                    <div class="col-lg-9 col-xl-6">
                        <div class="kt-checkbox-list">
                            <label class="kt-checkbox kt-checkbox--brand">
                                <input type="checkbox">
                                {{ __('Nuevas notificaciones') }}
                                <span></span>
                            </label>

                            <label class="kt-checkbox kt-checkbox--brand">
                                <input type="checkbox">
                                {{ __('Cuando envien un mensaje directo') }}
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-last row">
                    <label class="col-xl-3 col-lg-3 col-form-label">
                        {{ __('Cuando escalar los correos') }}
                    </label>

                    <div class="col-lg-9 col-xl-6">
                        <div class="kt-checkbox-list">
                            <label class="kt-checkbox kt-checkbox--brand">
                                <input type="checkbox">
                                {{ __('Nuevas ordenes de compra') }}.
                                <span></span>
                            </label>

                            <label class="kt-checkbox kt-checkbox--brand">
                                <input type="checkbox">
                                {{ __('Nueva aprobación de membresía') }}
                                <span></span>
                            </label>

                            <label class="kt-checkbox kt-checkbox--brand">
                                <input type="checkbox" checked="checked">
                                {{ __('Registro de miembro') }}
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>

<div class="kt-section kt-section--first">
    <div class="kt-section__body">
        <div class="row">
            <label class="col-xl-3"></label>

            <div class="col-lg-9 col-xl-6">
                <h3 class="kt-section__title kt-section__title-sm">
                    {{ __('Seguridad') }}:
                </h3>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                {{ __('Verificación de Acceso') }}
            </label>

            <div class="col-lg-9 col-xl-6">
                <button type="button" class="btn btn-label-brand btn-bold btn-sm kt-margin-t-5 kt-margin-b-5">
                    {{ __('Configurar Verificación de Acceso') }}
                </button>

                <span class="form-text text-muted">
                    {{ __('Después de iniciar sesión, se le solicitará información adicional para confirmar su identidad y proteger su cuenta para que no se vea comprometida.') }}
                    <a href="#" class="kt-link">
                        {{ __('Leer más') }}
                    </a>.
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                {{ __('Verificación de restablecimiento de contraseña') }}
            </label>

            <div class="col-lg-9 col-xl-6">
                <div class="kt-checkbox-single">
                    <label class="kt-checkbox">
                        <input type="checkbox">
                        {{ __('Requerir información personal para restablecer su contraseña.') }}.
                        <span></span>
                    </label>
                </div>

                <span class="form-text text-muted">
                    {{ __('Para mayor seguridad, esto requiere que confirme su correo electrónico o número de teléfono cuando restablezca su contraseña') }}.
                    <a href="#" class="kt-link">
                        {{ __('Leer más') }}
                    </a>.
                </span>
            </div>
        </div>

        <div class="form-group row kt-margin-t-10 kt-margin-b-10">
            <label class="col-xl-3 col-lg-3 col-form-label"></label>

            <div class="col-lg-9 col-xl-6">
                <button type="button" class="btn btn-label-danger btn-bold btn-sm kt-margin-t-5 kt-margin-b-5">
                    {{ __('Desactivar mi cuenta') }}
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col text-right">
                {{ form_submit(__('Actualizar')) }}
            </div>
        </div>
    </div>
</div>
{{ html()->closeModelForm() }}

@push('after-scripts')
<script>
    @if(session()->get('flash_success'))
    $(window).on('load', function(){
        setTimeout(function() {
            $('#kt_scrolltop').trigger('click');
        }, 500);
    });
    @endif
</script>
@endpush

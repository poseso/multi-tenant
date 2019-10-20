{{ html()->form('PATCH', route('frontend.auth.password.update'))->class('form-horizontal')->open() }}
<div class="kt-form kt-form--label-right">
    <div class="kt-form__body">
        <div class="kt-section kt-section--first">
            <div class="kt-section__body">
                <div class="alert alert-solid-danger alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
                    <div class="alert-icon">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>

                    <div class="alert-text">
                        {{ __('Las contraseñas de los usuarios caducan periódicamente.') }}
                        <br>
                        {{ __('Los usuarios recibirán una advertencia de que sus contraseñas van a caducar, una vez caducada pasará a una vista para cambiar su contraseña.') }}
                    </div>

                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="la la-close"></i></span>
                        </button>
                    </div>
                </div>

                <div class="row">
                    <label class="col-xl-3"></label>

                    <div class="col-lg-9 col-xl-6">
                        <h3 class="kt-section__title kt-section__title-sm">
                            {{ __('Cambiar Contraseña para') }}: <strong class="text-muted">({{ $logged_in_user->name }})</strong>
                        </h3>
                    </div>
                </div>

                <div class="form-group row">
                    {{ html()->label(__('Contraseña Actual'))->class('col-xl-3 col-lg-3 col-form-label')->for('old_password') }}

                    <div class="col-lg-9 col-xl-6">
                        {{ html()->password('old_password')
                            ->class('form-control')
                            ->placeholder(__('Contraseña Actual'))
                            ->autofocus() }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ html()->label(__('Nueva Contraseña'))->class('col-xl-3 col-lg-3 col-form-label')->for('password') }}

                    <div class="col-lg-9 col-xl-6">
                        {{ html()->password('password')
                            ->class('form-control')
                            ->placeholder(__('Nueva Contraseña')) }}
                    </div>
                </div>

                <div class="form-group form-group-last row">
                    {{ html()->label(__('Confirmación de la Contraseña'))->class('col-xl-3 col-lg-3 col-form-label')->for('password_confirmation') }}

                    <div class="col-lg-9 col-xl-6">
                        {{ html()->password('password_confirmation')
                            ->class('form-control')
                            ->placeholder(__('Confirmación de la contraseña')) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-form__actions">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-lg-9 col-xl-6">
                {{ form_submit(__('Actualizar') . ' ' . __('Contraseña')) }}
            </div>
        </div>
    </div>
</div>
{{ html()->form()->close() }}

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

<div class="kt-form kt-form--label-right">
    <div class="kt-form__body">
        <div class="kt-section kt-section--first">
            <div class="kt-section__body">
                <div class="row">
                    <label class="col-xl-3"></label>

                    <div class="col-lg-9 col-xl-6">
                        <h3 class="kt-section__title kt-section__title-sm">
                            {{ __('Información de Usuario') }}:
                        </h3>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">
                        {{ __('Avatar') }}
                    </label>

                    <div class="col-lg-9 col-xl-6">
                        <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_apps_user_add_avatar">
                            <div class="kt-avatar__holder" style="background-image: url({{ $logged_in_user->picture }})"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    {{ html()->label(__('Nombre'))->class('col-xl-3 col-lg-3 col-form-label') }}

                    <div class="col-lg-9 col-xl-6">
                        {{ html()->text()->class('form-control')->value($logged_in_user->name)->attribute('disabled') }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ html()->label(__('Usuario'))->class('col-xl-3 col-lg-3 col-form-label') }}

                    <div class="col-lg-9 col-xl-6">
                        {{ html()->text()->class('form-control')->value($logged_in_user->username)->attribute('disabled') }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ html()->label(__('Dirección de Correo'))->class('col-xl-3 col-lg-3 col-form-label') }}

                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-at"></i>
                                </span>
                            </div>

                            {{ html()->text()->class('form-control')->value($logged_in_user->email)->attribute('disabled') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    {{ html()->label(__('Creación'))->class('col-xl-3 col-lg-3 col-form-label') }}

                    <div class="col-lg-9 col-xl-6">
                        {{ html()->text()->class('form-control')->value(timezone()->convertToLocal($logged_in_user->created_at) .' '. $logged_in_user->created_at->diffForHumans())->attribute('disabled') }}
                        <span class="form-text text-muted">
                            {{ __('Fecha de creación del usuario') }}: <strong>({{ $logged_in_user->name }})</strong>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    {{ html()->label(__('Fecha de verificación de correo'))->class('col-xl-3 col-lg-3 col-form-label') }}

                    <div class="col-lg-9 col-xl-6">
                        {{ html()->text()->class('form-control')->value(optional($logged_in_user->email_verified_at)->format(get_full_date()) ?? __('La dirección de correo no ha sido verificada.'))->attribute('disabled') }}
                        <span class="form-text text-muted">
                            {{ __('Fecha de verificación del correo para el usuario') }}: <strong>({{ $logged_in_user->name }})</strong>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    {{ html()->label(__('Última Actualización'))->class('col-xl-3 col-lg-3 col-form-label') }}

                    <div class="col-lg-9 col-xl-6">
                        {{ html()->text()->class('form-control')->value(timezone()->convertToLocal($logged_in_user->updated_at) .' '. $logged_in_user->updated_at->diffForHumans())->attribute('disabled') }}
                        <span class="form-text text-muted">
                            {{ __('Última actualización realizada al usuario') }}: <strong>({{ $logged_in_user->name }})</strong>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

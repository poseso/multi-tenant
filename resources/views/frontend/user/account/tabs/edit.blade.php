{{ html()->modelForm($logged_in_user, 'PATCH', route('frontend.user.profile.update'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
<div class="kt-form kt-form--label-right">
    <div class="kt-form__body">
        <div class="kt-section kt-section--first">
            <div class="kt-section__body">
                <div class="row">
                    <label class="col-xl-3"></label>
                    <div class="col-lg-9 col-xl-6">
                        <h3 class="kt-section__title kt-section__title-sm">
                            {{ __('Actualización de la Cuenta') }}:
                        </h3>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label"></label>

                    <div class="col-lg-9 col-xl-6">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('Avatar'))->class('font-weight-bold')->for('avatar') }}

                                    <div>
                                        <label class="kt-radio kt-radio--bold kt-radio--brand">
                                            <input type="radio" name="avatar_type" value="gravatar" {{ $logged_in_user->avatar_type == 'gravatar' ? 'checked' : '' }} />
                                            {{ __('Gravatar') }}
                                            <span></span>
                                        </label>
                                        &nbsp; &nbsp;
                                        <label class="kt-radio kt-radio--bold kt-radio--brand">
                                            <input type="radio" name="avatar_type" value="storage" {{ $logged_in_user->avatar_type == 'storage' ? 'checked' : '' }} />
                                            {{ __('Subir') }}
                                            <span></span>
                                        </label>

                                        @foreach($logged_in_user->providers as $provider)
                                            @if(strlen($provider->avatar))
                                                <input type="radio" name="avatar_type" value="{{ $provider->provider }}" {{ $logged_in_user->avatar_type == $provider->provider ? 'checked' : '' }} /> {{ ucfirst($provider->provider) }}
                                            @endif
                                        @endforeach
                                    </div>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div id="avatar_location" class="kt-avatar kt-avatar--outline kt-avatar--circle- hidden">
                            <div class="kt-avatar__holder">
                                <img id="previewFallback" width="120" height="120" src="{{ $logged_in_user->picture }}" alt="">
                            </div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="{{ __('Cambiar Avatar') }}">
                                <i class="fa fa-pen"></i>
                                {{ html()->file('avatar_location')->id('avatarPreview') }}
                            </label>

                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="{{ __('Cancelar Avatar') }}">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    {{ html()->label(__('Nombre'))->class('col-xl-3 col-lg-3 col-form-label') }}

                    <div class="col-lg-9 col-xl-6">
                        {{ html()->text('first_name')
                            ->class('form-control')
                            ->placeholder(__('Nombre'))
                            ->attribute('maxlength', 70) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ html()->label(__('Apellidos'))->class('col-xl-3 col-lg-3 col-form-label') }}

                    <div class="col-lg-9 col-xl-6">
                        {{ html()->text('last_name')
                            ->class('form-control')
                            ->placeholder(__('Apellidos'))
                            ->attribute('maxlength', 70) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ html()->label(__('Usuario'))->class('col-xl-3 col-lg-3 col-form-label') }}

                    <div class="col-lg-9 col-xl-6">
                        {{ html()->text('username')
                            ->class('form-control')
                            ->placeholder(__('Usuario'))
                            ->attribute('maxlength', 70) }}
                    </div>
                </div>

                @if ($logged_in_user->canChangeEmail())
                    <div class="col-6 offset-3">
                        <div class="alert alert-warning" role="alert">
                            <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                            </div>
                            <div class="alert-text">
                                {{ __('Si cambia su correo electrónico, se cerrará la sesión hasta que confirme su nueva dirección de correo electrónico.') }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('Dirección de correo'))->class('col-xl-3 col-lg-3 col-form-label') }}

                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-at"></i>
                                </span>
                                </div>

                                {{ html()->email('email')
                                    ->class('form-control')
                                    ->placeholder(__('Dirección de Correo'))
                                    ->attribute('maxlength', 191) }}
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-6 offset-3">
                        {{ form_submit(__('Actualizar')) }}
                    </div><!--col-->
                </div><!--row-->
            </div>
        </div>
    </div>
</div>
{{ html()->closeModelForm() }}

@push('after-scripts')
    <script>
        $(function() {
            var avatar_location = $("#avatar_location");

            if ($('input[name=avatar_type]:checked').val() === 'storage') {
                avatar_location.show();
            } else {
                avatar_location.hide();
            }

            $('input[name=avatar_type]').change(function() {
                if ($(this).val() === 'storage') {
                    avatar_location.show();
                } else {
                    avatar_location.hide();
                }
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewFallback').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#avatarPreview').change(function() {
            readURL(this);
        });
    </script>

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

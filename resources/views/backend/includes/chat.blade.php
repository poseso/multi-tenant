<!--Begin:: Chat-->
<div class="modal fade- modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="kt-chat">
                <div class="kt-portlet kt-portlet--last">
                    <div class="kt-portlet__head">
                        <div class="kt-chat__head ">
                            <div class="kt-chat__left">
                                <div class="kt-chat__label">
                                    <a href="#" class="kt-chat__title">
                                        {{ __('Carlos Sánchez') }}
                                    </a>
                                    <span class="kt-chat__status">
                                        <span class="kt-badge kt-badge--dot kt-badge--success"></span>
                                        {{ __('Activo') }}
                                    </span>
                                </div>
                            </div>
                            <div class="kt-chat__right">
                                <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flaticon-more-1"></i> </button>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-md">
                                        <!--begin::Nav-->
                                        <ul class="kt-nav">
                                            <li class="kt-nav__head">
                                                {{ __('Mensajería') }}
                                                <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="{{ __('Clic para aprender más...') }}"></i>
                                            </li>
                                            <li class="kt-nav__separator"></li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-group"></i>
                                                    <span class="kt-nav__link-text">
                                                        {{ __('Nuevo Grupo') }}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-open-text-book"></i>
                                                    <span class="kt-nav__link-text">
                                                        {{ __('Contactos') }}
                                                    </span>
                                                    <span class="kt-nav__link-badge">
                                                        <span class="kt-badge kt-badge--brand kt-badge--rounded-">
                                                            5
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-bell-2"></i>
                                                    <span class="kt-nav__link-text">
                                                        {{ __('Llamadas') }}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-dashboard"></i>
                                                    <span class="kt-nav__link-text">
                                                        {{ __('Ajustes') }}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-protected"></i>
                                                    <span class="kt-nav__link-text">
                                                        {{ __('Ayuda') }}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__separator"></li>
                                            <li class="kt-nav__foot">
                                                <a class="btn btn-label-brand btn-bold btn-sm" href="#">
                                                    {{ __('Actualizar Plan') }}
                                                </a>
                                                <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="{{ __('Clic para leer más...') }}">
                                                    {{ __('Leer más') }}
                                                </a>
                                            </li>
                                        </ul>
                                        <!--end::Nav-->
                                    </div>
                                </div>
                                <button type="button" class="btn btn-clean btn-sm btn-icon" data-dismiss="modal">
                                    <i class="flaticon2-cross"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <div class="kt-scroll kt-scroll--pull" data-height="410" data-mobile-height="300">
                            <div class="kt-chat__messages kt-chat__messages kt-chat__messages--modal">
                                <div class="kt-chat__message kt-bg-light-success">
                                    <div class="kt-chat__user">
                                        <span class="kt-userpic kt-userpic--circle kt-userpic--sm">
                                            <img src="{{ asset('assets/media/users/100_12.jpg') }}" alt="image">
                                        </span>
                                        <a href="#" class="kt-chat__username">
                                            Giancarlo Alfau
                                        </a>
                                        <span class="kt-chat__datetime">
                                            30 Segundos
                                        </span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Sup
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-bg-light-brand">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">Justo ahora</span>
                                        <a href="#" class="kt-chat__username">
                                            You
                                        </a>
                                        <span class="kt-userpic kt-userpic--circle kt-userpic--sm">
                                            <img src="{{ asset('assets/media/users/300_21.jpg') }}" alt="image">
                                        </span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Tranquilo y tu!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-chat__input">
                            <div class="kt-chat__editor">
                                <textarea placeholder="{{ __('Escriba aqui...') }}" style="height: 50px"></textarea>
                            </div>
                            <div class="kt-chat__toolbar">
                                <div class="kt_chat__tools">
                                    <a href="#">
                                        <i class="flaticon2-link"></i>
                                    </a>
                                    <a href="#">
                                        <i class="flaticon2-photograph"></i>
                                    </a>
                                    <a href="#">
                                        <i class="flaticon2-photo-camera"></i>
                                    </a>
                                </div>
                                <div class="kt_chat__actions">
                                    <button type="button" class="btn btn-brand btn-md btn-font-sm btn-upper btn-bold kt-chat__reply">
                                        {{ __('Responder') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--ENd:: Chat-->
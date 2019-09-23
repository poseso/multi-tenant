<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
    @foreach(array_keys(config('locale.languages')) as $lang)
        @if($lang != app()->getLocale())
            <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                <li class="kt-nav__item kt-nav__item--active">
                    <a href="{{ '/lang/'.$lang }}" class="kt-nav__link">
                    <span class="kt-nav__link-icon">
                        <img src="@if($lang != 'es') {{ asset('assets/media/flags/020-us.svg') }} @else {{ asset('assets/media/flags/021-dominican.svg') }}@endif" alt="" />
                    </span>

                        <span class="kt-nav__link-text">
                        {{ __('menus.language-picker.langs.'.$lang) }}
                    </span>
                    </a>
                </li>
            </ul>
        @endif
    @endforeach
</div>

@if (count($breadcrumbs))
    <div style="background-color:#fdfdfd;" class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <a href="{{ route('admin.dashboard') }}" class="kt-subheader__breadcrumbs-link" data-toggle="kt-tooltip-desktop" data-skin="brand" title="{{ __('Pantalla Principal') }}" data-placement="bottom">
                <i style="font-size: 2.0rem!important;" class="kt-subheader__breadcrumbs-link la la-home"></i>
            </a>

            <h3 class="kt-subheader__title"></h3>

            <span class="kt-subheader__separator kt-subheader__separator--v"></span>

            <div class="kt-subheader__title">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if ($breadcrumb->url && !$loop->last)
                        <a href="{{ $breadcrumb->url }}">
                            <span data-toggle="kt-tooltip-desktop" data-skin="brand" title="{{ $breadcrumb->title }}" data-placement="bottom">{{ $breadcrumb->title }}</span>
                        </a>

                        <span style="color:#cecece;">&nbsp;<i style="color: #5867dd !important;" class="fa fa-angle-double-right"></i>&nbsp;</span>
                    @else
                        <a class="kt-subheader__breadcrumbs-link">
                            <span class="kt-subheader__title">{{ $breadcrumb->title }}</span>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>

        @yield('breadcrumb-links')
    </div>
@endif

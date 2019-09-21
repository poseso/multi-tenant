@if ($breadcrumbs)
<div style="background-color:#fdfdfd;" class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($loop->last)
                    {{ $breadcrumb->title }}
                @endif
            @endforeach
        </h3>

        <span class="kt-subheader__separator kt-subheader__separator--v"></span>

        <a href="{{ route('admin.dashboard') }}" class="kt-subheader__breadcrumbs-link">
            <i class="kt-subheader__breadcrumbs-link la la-home"></i>
        </a>

        <h3 class="kt-subheader__title"></h3>

        <span class="kt-subheader__separator kt-subheader__separator--v"></span>

        <div class="kt-subheader__title">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($breadcrumb->url && !$loop->last)
                    <a href="{{ $breadcrumb->url }}">
                        <span>{{ $breadcrumb->title }}</span>
                    </a>

                    <span style="color:#cecece;">/</span>
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
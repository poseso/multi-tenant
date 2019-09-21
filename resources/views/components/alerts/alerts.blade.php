<div class="alert alert-{{ $type }}" role="alert">
    <div class="alert-icon">
        <i class="{{ $icon }}"></i>
    </div>

    <div class="alert-text">
        @if($type == 'success')
            @if(is_array(json_decode(session()->get('flash_success'), true)))
                {!! implode('', session()->get('flash_success')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_success') !!}
            @endif
        @elseif($type == 'warning')
            @if(is_array(json_decode(session()->get('flash_warning'), true)))
                {!! implode('', session()->get('flash_warning')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_warning') !!}
            @endif
        @elseif($type == 'info')
            @if(is_array(json_decode(session()->get('flash_info'), true)))
                {!! implode('', session()->get('flash_info')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_info') !!}
            @endif
        @elseif($type == 'danger')
            @if(is_array(json_decode(session()->get('flash_danger'), true)))
                {!! implode('', session()->get('flash_danger')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_danger') !!}
            @endif
        @elseif($type == 'message')
            @if(is_array(json_decode(session()->get('flash_message'), true)))
                {!! implode('', session()->get('flash_message')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_message') !!}
            @endif
        @endif
    </div>

    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
</div>
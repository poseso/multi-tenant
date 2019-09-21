@if($errors->any())
    @if(!\Request::is('admin/settings/*'))
        @component('components.alerts.default')
        @endcomponent
    @endif
@elseif(session()->get('flash_success'))
    @component('components.alerts.alerts',
        ['type' => 'success', 'icon' => 'fas fa-check'])
    @endcomponent
@elseif(session()->get('flash_warning'))
    @component('components.alerts.alerts',
        ['type' => 'warning', 'icon' => 'fas fa-exclamation-triangle'])
    @endcomponent
@elseif(session()->get('flash_info'))
    @component('components.alerts.alerts',
        ['type' => 'info', 'icon' => 'fas fa-info-circle'])
    @endcomponent
@elseif(session()->get('flash_danger'))
    @if(!\Request::is('admin/settings/*'))
        @component('components.alerts.alerts',
            ['type' => 'danger', 'icon' => 'fas fa-times'])
        @endcomponent
    @endif
@elseif(session()->get('flash_message'))
    @component('components.alerts.alerts',
        ['type' => 'message', 'icon' => 'fas fa-check'])
    @endcomponent
@endif

<div class="alert alert-danger" role="alert">
    <div class="alert-icon">
        <i class="fas fa-times"></i>
    </div>

    <div class="alert-text">
        @foreach($errors->all() as $error)
            {!! $error !!}<br/>
        @endforeach
    </div>
</div>
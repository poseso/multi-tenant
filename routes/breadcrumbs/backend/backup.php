<?php

Breadcrumbs::for('admin.backup.index', function ($trail) {
    $trail->push(__('Administración de Copias de Seguridad'), route('admin.backup.index'));
});

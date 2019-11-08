<?php

Breadcrumbs::for('admin.auth.logs.user.index', function ($trail) {
    $trail->push(__('Administración de Eventos'), route('admin.auth.logs.user.index'));
});

Breadcrumbs::for('admin.auth.logs.user.show', function ($trail, $id) {
    $trail->parent('admin.auth.logs.user.index');
    $trail->push(__("Visualizando Evento [ $id ]"), route('admin.auth.logs.user.show', $id));
});

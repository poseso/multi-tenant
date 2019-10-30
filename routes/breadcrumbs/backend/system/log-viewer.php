<?php

Breadcrumbs::for('log-viewer::dashboard', function ($trail) {
    $trail->push(__('Gestor de Logs'), url('admin/log-viewer'));
});

Breadcrumbs::for('log-viewer::logs.list', function ($trail) {
    $trail->parent('log-viewer::dashboard');
    $trail->push(__('Logs'), url('admin/log-viewer/logs'));
});

Breadcrumbs::for('log-viewer::logs.show', function ($trail, $date) {
    $trail->parent('log-viewer::logs.list');
    $trail->push($date, url('admin/log-viewer/logs/'.$date));
});

Breadcrumbs::for('log-viewer::logs.filter', function ($trail, $date, $filter) {
    $trail->parent('log-viewer::logs.show', $date);
    $trail->push(ucfirst($filter), url('admin/log-viewer/'.$date.'/'.$filter));
});

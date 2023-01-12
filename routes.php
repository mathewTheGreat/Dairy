<?php

require_once __DIR__.'/router.php';

get('/', 'Dairy/index.php');
get('/cattle', 'Dairy/api/getAllCattle.php');
get('/cattle/$id', 'Dairy/api/getCattle.php');
post('/cattle', 'Dairy/api/createCattle.php');
post('/cattle/$id', 'Dairy/api/updateCattle.php');
delete('/cattle/$id', 'Dairy/api/deleteCattle.php');
any('/404','views/404.php');
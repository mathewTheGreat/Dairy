<?php

require_once __DIR__.'/router.php';

get('/Dairy/cattle', 'Dairy_API/api/cattle/getAllCattle.php');
get('/Dairy/cattle/$id', 'Dairy_API/api/cattle/getCattle.php');
post('/Dairy/cattle', 'Dairy_API/api/cattle/createCattle.php');
post('/Dairy/cattle/$id', 'Dairy_API/api/cattle/updateCattle.php');
delete('/Dairy/cattle/$id', 'Dairy_API/api/cattle/deleteCattle.php');
any('/404','views/404.php');
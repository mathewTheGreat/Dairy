<?php

require_once __DIR__.'/router.php';

get('/Dairy/cattle', 'Dairy_API/api/getAllCattle.php');
get('/Dairy/cattle/$id', 'Dairy_API/api/getCattle.php');
post('/Dairy/cattle', 'Dairy_API/api/createCattle.php');
post('/Dairy/cattle/$id', 'Dairy_API/api/updateCattle.php');
delete('/Dairy/cattle/$id', 'Dairy_API/api/deleteCattle.php');
any('/404','views/404.php');
<?php

require_once __DIR__.'/router.php';

//breed routes
get('/Dairy/breed', 'Dairy_API/api/masters/breed/getAllBreeds.php');
get('/Dairy/breed/$id', 'Dairy_API/api/masters/breed/getBreed.php');
post('/Dairy/breed/$id', 'Dairy_API/api/masters/breed/updateBreed.php');
post('/Dairy/breed', 'Dairy_API/api/masters/breed/createBreed.php');
delete('/Dairy/breed/$id', 'Dairy_API/api/masters/breed/deleteBreed.php');

//cattle routes
get('/Dairy/cattle', 'Dairy_API/api/cattle/getAllCattle.php');
get('/Dairy/cattle/$id', 'Dairy_API/api/cattle/getCattle.php');
post('/Dairy/cattle', 'Dairy_API/api/cattle/createCattle.php');
post('/Dairy/cattle/$id', 'Dairy_API/api/cattle/updateCattle.php');
delete('/Dairy/cattle/$id', 'Dairy_API/api/cattle/deleteCattle.php');
any('/404','views/404.php');
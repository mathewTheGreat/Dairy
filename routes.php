<?php

require_once __DIR__.'/router.php';

//user routes
post('/Dairy/login', 'Dairy_API/api/usermanager/login.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/registration', 'Dairy_API/api/usermanager/registration.php', 'PUT_YOUR_SECRET_KEY_HERE');

//event type routes
get('/Dairy/eventtype', 'Dairy_API/api/masters/event_type/getAllEventTypes.php', 'PUT_YOUR_SECRET_KEY_HERE');
get('/Dairy/eventtype/$id', 'Dairy_API/api/masters/event_type/getEventType.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/eventtype/$id', 'Dairy_API/api/masters/event_type/updateEventType.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/eventtype', 'Dairy_API/api/masters/event_type/createEventType.php', 'PUT_YOUR_SECRET_KEY_HERE');
delete('/Dairy/eventtype/$id', 'Dairy_API/api/masters/event_type/deleteEventType.php');

//cattle group routes
get('/Dairy/cattlegroup', 'Dairy_API/api/masters/cattlegroup/getAllCattleGroup.php', 'PUT_YOUR_SECRET_KEY_HERE');
get('/Dairy/cattlegroup/$id', 'Dairy_API/api/masters/cattlegroup/getCattleGroup.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/cattlegroup/$id', 'Dairy_API/api/masters/cattlegroup/updateCattleGroup.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/cattlegroup', 'Dairy_API/api/masters/cattlegroup/createCattleGroup.php', 'PUT_YOUR_SECRET_KEY_HERE');
delete('/Dairy/cattlegroup/$id', 'Dairy_API/api/masters/cattlegroup/deleteCattleGroup.php');

//expense type routes
get('/Dairy/expensetype', 'Dairy_API/api/masters/expense_type/getAllExpenseType.php', 'PUT_YOUR_SECRET_KEY_HERE');
get('/Dairy/expensetype/$id', 'Dairy_API/api/masters/expense_type/getExpenseType.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/expensetype/$id', 'Dairy_API/api/masters/expense_type/updateExpenseType.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/expensetype', 'Dairy_API/api/masters/expense_type/createExpenseType.php', 'PUT_YOUR_SECRET_KEY_HERE');
delete('/Dairy/expensetype/$id', 'Dairy_API/api/masters/expense_type/deleteExpenseType.php');

//event routes
get('/Dairy/event', 'Dairy_API/api/event/getAllEvent.php', 'PUT_YOUR_SECRET_KEY_HERE');
get('/Dairy/event/$id', 'Dairy_API/api/event/getEvent.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/event/$id', 'Dairy_API/api/event/updateEvent.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/event', 'Dairy_API/api/event/createEvent.php', 'PUT_YOUR_SECRET_KEY_HERE');
delete('/Dairy/event/$id', 'Dairy_API/api/event/deleteEvent.php');

//farm routes
get('/Dairy/farm', 'Dairy_API/api/farm/getAllFarm.php', 'PUT_YOUR_SECRET_KEY_HERE');
get('/Dairy/farm/$id', 'Dairy_API/api/farm/getFarm.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/farm/$id', 'Dairy_API/api/farm/updateFarm.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/farm', 'Dairy_API/api/farm/createFarm.php', 'PUT_YOUR_SECRET_KEY_HERE');
delete('/Dairy/farm/$id', 'Dairy_API/api/farm/deleteFarm.php');


//expense routes
get('/Dairy/expense', 'Dairy_API/api/expense/getAllExpense.php', 'PUT_YOUR_SECRET_KEY_HERE');
get('/Dairy/expense/$id', 'Dairy_API/api/expense/getExpense.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/expense/$id', 'Dairy_API/api/expense/updateExpense.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/expense', 'Dairy_API/api/expense/createExpense.php', 'PUT_YOUR_SECRET_KEY_HERE');
delete('/Dairy/expense/$id', 'Dairy_API/api/expense/deleteExpense.php');

//income routes
get('/Dairy/income', 'Dairy_API/api/income/getAllIncome.php', 'PUT_YOUR_SECRET_KEY_HERE');
get('/Dairy/income/$id', 'Dairy_API/api/income/getIncome.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/income/$id', 'Dairy_API/api/income/updateIncome.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/income', 'Dairy_API/api/income/createIncome.php', 'PUT_YOUR_SECRET_KEY_HERE');
delete('/Dairy/income/$id', 'Dairy_API/api/income/deleteIncome.php');


//income type routes
get('/Dairy/incometype', 'Dairy_API/api/masters/income_type/getAllIncomeType.php', 'PUT_YOUR_SECRET_KEY_HERE');
get('/Dairy/incometype/$id', 'Dairy_API/api/masters/income_type/getIncomeType.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/incometype/$id', 'Dairy_API/api/masters/income_type/updateIncomeType.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/incometype', 'Dairy_API/api/masters/income_type/createIncomeType.php', 'PUT_YOUR_SECRET_KEY_HERE');
delete('/Dairy/incometype/$id', 'Dairy_API/api/masters/income_type/deleteIncomeType.php');


//milk production routes
get('/Dairy/milkproduction', 'Dairy_API/api/milk_production/getAllMilkProduction.php', 'PUT_YOUR_SECRET_KEY_HERE');
get('/Dairy/milkproduction/$id', 'Dairy_API/api/milk_production/getMilkProduction.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/milkproduction/$id', 'Dairy_API/api/milk_production/updateMilkProduction.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/milkproduction', 'Dairy_API/api/milk_production/createMilkProduction.php', 'PUT_YOUR_SECRET_KEY_HERE');
delete('/Dairy/milkproduction/$id', 'Dairy_API/api/milk_production/deleteMilkProduction.php');

//breed routes
get('/Dairy/breed', 'Dairy_API/api/masters/breed/getAllBreeds.php', 'PUT_YOUR_SECRET_KEY_HERE');
get('/Dairy/breed/$id', 'Dairy_API/api/masters/breed/getBreed.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/breed/$id', 'Dairy_API/api/masters/breed/updateBreed.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/breed', 'Dairy_API/api/masters/breed/createBreed.php', 'PUT_YOUR_SECRET_KEY_HERE');
delete('/Dairy/breed/$id', 'Dairy_API/api/masters/breed/deleteBreed.php');

//cattle routes
get('/Dairy/cattle', 'Dairy_API/api/cattle/getAllCattle.php', 'PUT_YOUR_SECRET_KEY_HERE');
get('/Dairy/cattle/$id', 'Dairy_API/api/cattle/getCattle.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/cattle', 'Dairy_API/api/cattle/createCattle.php', 'PUT_YOUR_SECRET_KEY_HERE');
post('/Dairy/cattle/$id', 'Dairy_API/api/cattle/updateCattle.php', 'PUT_YOUR_SECRET_KEY_HERE');
delete('/Dairy/cattle/$id', 'Dairy_API/api/cattle/deleteCattle.php');
any('/404','views/404.php');

//user routes


?>
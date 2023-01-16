<?php

require_once __DIR__.'/router.php';

//event type routes
get('/Dairy/eventtype', 'Dairy_API/api/masters/event_type/getAllEventTypes.php');
get('/Dairy/eventtype/$id', 'Dairy_API/api/masters/event_type/getEventType.php');
post('/Dairy/eventtype/$id', 'Dairy_API/api/masters/event_type/updateEventType.php');
post('/Dairy/eventtype', 'Dairy_API/api/masters/event_type/createEventType.php');
delete('/Dairy/eventtype/$id', 'Dairy_API/api/masters/event_type/deleteEventType.php');

//cattle group routes
get('/Dairy/cattlegroup', 'Dairy_API/api/masters/cattlegroup/getAllCattleGroup.php');
get('/Dairy/cattlegroup/$id', 'Dairy_API/api/masters/cattlegroup/getCattleGroup.php');
post('/Dairy/cattlegroup/$id', 'Dairy_API/api/masters/cattlegroup/updateCattleGroup.php');
post('/Dairy/cattlegroup', 'Dairy_API/api/masters/cattlegroup/createCattleGroup.php');
delete('/Dairy/cattlegroup/$id', 'Dairy_API/api/masters/cattlegroup/deleteCattleGroup.php');

//expense type routes
get('/Dairy/expensetype', 'Dairy_API/api/masters/expense_type/getAllExpenseType.php');
get('/Dairy/expensetype/$id', 'Dairy_API/api/masters/expense_type/getExpenseType.php');
post('/Dairy/expensetype/$id', 'Dairy_API/api/masters/expense_type/updateExpenseType.php');
post('/Dairy/expensetype', 'Dairy_API/api/masters/expense_type/createExpenseType.php');
delete('/Dairy/expensetype/$id', 'Dairy_API/api/masters/expense_type/deleteExpenseType.php');

//event routes
get('/Dairy/event', 'Dairy_API/api/event/getAllEvent.php');
get('/Dairy/event/$id', 'Dairy_API/api/event/getEvent.php');
post('/Dairy/event/$id', 'Dairy_API/api/event/updateEvent.php');
post('/Dairy/event', 'Dairy_API/api/event/createEvent.php');
delete('/Dairy/event/$id', 'Dairy_API/api/event/deleteEvent.php');

//farm routes
get('/Dairy/farm', 'Dairy_API/api/farm/getAllFarm.php');
get('/Dairy/farm/$id', 'Dairy_API/api/farm/getFarm.php');
post('/Dairy/farm/$id', 'Dairy_API/api/farm/updateFarm.php');
post('/Dairy/farm', 'Dairy_API/api/farm/createFarm.php');
delete('/Dairy/farm/$id', 'Dairy_API/api/farm/deleteFarm.php');


//expense routes
get('/Dairy/expense', 'Dairy_API/api/expense/getAllExpense.php');
get('/Dairy/expense/$id', 'Dairy_API/api/expense/getExpense.php');
post('/Dairy/expense/$id', 'Dairy_API/api/expense/updateExpense.php');
post('/Dairy/expense', 'Dairy_API/api/expense/createExpense.php');
delete('/Dairy/expense/$id', 'Dairy_API/api/expense/deleteExpense.php');

//income routes
get('/Dairy/income', 'Dairy_API/api/income/getAllIncome.php');
get('/Dairy/income/$id', 'Dairy_API/api/income/getIncome.php');
post('/Dairy/income/$id', 'Dairy_API/api/income/updateIncome.php');
post('/Dairy/income', 'Dairy_API/api/income/createIncome.php');
delete('/Dairy/income/$id', 'Dairy_API/api/income/deleteIncome.php');


//income type routes
get('/Dairy/incometype', 'Dairy_API/api/masters/income_type/getAllIncomeType.php');
get('/Dairy/incometype/$id', 'Dairy_API/api/masters/income_type/getIncomeType.php');
post('/Dairy/incometype/$id', 'Dairy_API/api/masters/income_type/updateIncomeType.php');
post('/Dairy/incometype', 'Dairy_API/api/masters/income_type/createIncomeType.php');
delete('/Dairy/incometype/$id', 'Dairy_API/api/masters/income_type/deleteIncomeType.php');


//milk production routes
get('/Dairy/milkproduction', 'Dairy_API/api/milk_production/getAllMilkProduction.php');
get('/Dairy/milkproduction/$id', 'Dairy_API/api/milk_production/getMilkProduction.php');
post('/Dairy/milkproduction/$id', 'Dairy_API/api/milk_production/updateMilkProduction.php');
post('/Dairy/milkproduction', 'Dairy_API/api/milk_production/createMilkProduction.php');
delete('/Dairy/milkproduction/$id', 'Dairy_API/api/milk_production/deleteMilkProduction.php');

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

?>
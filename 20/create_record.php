<?php


// require_once 'path/to/simplecrm/include/entryPoint.php';


$recordBean = BeanFactory::getBean('Accounts');
$recordBean->name = 'Krushna';
$recordBean->educaton = 'B-Tech(IT)';
$recordBean->industry = 'Information Technology';
$recordBean->phone_no = '9854789632';


$recordBean->save();

echo "new record created with ID: " . $recordBean->id;


?>
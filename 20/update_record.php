<?php

// require_once '/path/to/simplecrm/include/entryPoint.php';


$recordId = 'dfbd00a8-04c6-3cca-ef20-6010f1db645f'; 


$recordBean = BeanFactory::getBean('Accounts', $recordId);

if ($recordBean && !empty($recordBean->id)) 
{

    $recordBean->name = 'Updated Umesh Pawar';
    $recordBean->education = 'M-Tech(IT)';
    $recordBean->phone_no = '098-765-4321';
    
  
    $recordBean->save();

    echo "Record updated successfully.";
} 
else
{
    echo "Record not found.";
}
?>

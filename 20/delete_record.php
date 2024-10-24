<?php

// require_once '/path/to/simplecrm/include/entryPoint.php';


$recordId = 'dfbd00a8-04c6-3cca-ef20-6010f1db645f'; 

$recordBean = BeanFactory::getBean('Accounts', $recordId);

if ($recordBean && !empty($recordBean->id))
{
    
    $recordBean->mark_deleted($recordId);
    echo "record deleted ";
    
}
else
{
    echo "record not found.";
}
?>

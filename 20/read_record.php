<?php



// require_once '/path/to/simplecrm/include/entryPoint.php';


$recordId = 'dfbd00a8-04c6-3cca-ef20-6010f1db645f'; 


$recordBean = BeanFactory::getBean('Accounts', $recordId);

if ($recordBean && !empty($recordBean->id)) 
{
    
    echo "Name: " . $recordBean->name . "<br>";
    echo "Education: " . $recordBean->education . "<br>";
    echo "Industry: " . $recordBean->industry . "<br>";
    echo "Phone Number: " . $recordBean->phone_no . "<br>";
    
} 
else
{
    echo "Record not found.";
}
?>

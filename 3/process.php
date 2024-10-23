<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $dropdownValue = $_POST['dropdown'];
    $textFieldValue = $_POST['textField'];

    
    if ($dropdownValue === "Yes" && empty($textFieldValue)) 
    {
        echo "text field is required when Yes is selected.";
    } 
    else
    {
        echo "form submitted successfully";
        
    }
}
?>

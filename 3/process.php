<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $dropdownValue = $_POST['dropdown'];
    $textFieldValue = $_POST['textField'];

    
    if ($dropdownValue === "Yes" && empty($textFieldValue)) {
        echo "Text field is required when Yes is selected.";
    } else {
        echo "Form submitted successfully";
        
    }
}
?>

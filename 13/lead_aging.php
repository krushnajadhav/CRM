<?php


$agingThreshold = 30; 


$query = "SELECT id, email, created_at FROM leads 
          WHERE DATEDIFF(CURDATE(), created_at) > $agingThreshold 
          AND status != 'Converted'";

$result = $conn->query($query);

$leads = [];
while ($row = $result->fetch_assoc()) 
{
    $leads[] = $row;
}

if (!empty($leads)) 
{
    foreach ($leads as $lead) 
    {
        
        $to = $lead['email'];
        $subject = "Reminder: lead aging notification";
        $message = "Dear Lead,We noticed that you have not converted yet. Please let us know how we can assist you ";
        $headers = "From: no-reply@SimpleCRM.com";

        mail($to, $subject, $message, $headers);
        echo "Reminder email sent to: " . $to . "\n";

   
        $updateQuery = "UPDATE leads SET follow_up_date = CURDATE() WHERE id = " . $lead['id'];
        $conn->query($updateQuery);
    }
} 
else 
{
    echo "No leads are aging.";
}

?>



<!-- 

Tested Script
    php /path/to/your/script/lead_aging.php

crontab -e  
    0 8 * * * /usr/bin/php /path/to/your/script/send_reminders.php
    
-->

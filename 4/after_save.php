<?php 

$hook_array['after_save'][] = Array(
    1,
    'Send email',
    'custom/modules/ModuleName/LogicHooks.php',
    'LogicHooks',
    'sendEmail'
);

class LogicHooks {
    public function sendEmail($bean, $event, $arguments) 
    {
        // sendingn mail to admin that record has been saved
        mail('admin@example.com', 'Record Saved', "A record with ID {$bean->id} has been saved.");
    }
}

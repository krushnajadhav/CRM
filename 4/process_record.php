<?php 

$hook_array['process_record'][] = Array(
    1,
    'Capitalize name',
    'custom/modules/ModuleName/LogicHooks.php',
    'LogicHooks',
    'capitalizeName'
);

class LogicHooks 
{
    public function capitalizeName($bean, $event, $arguments) 
    {
        // capitalize the 'name' field before saving
        $bean->name = strtoupper($bean->name);
    }
}

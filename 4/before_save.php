<?php
$hook_array['before_save'][] = Array(
    1,
    'Set default value',
    'custom/modules/ModuleName/LogicHooks.php',
    'LogicHooks',
    'setDefaultValue'
);

class LogicHooks {
    public function setDefaultValue($bean, $event, $arguments) 
    {
        // If 'field_name' is empty set it to Default Value

        if (empty($bean->field_name)) 
        {
            $bean->field_name = 'Default Value';
        }
    }
}

?>



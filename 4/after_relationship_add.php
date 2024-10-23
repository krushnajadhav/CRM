<?php 

$hook_array['after_relationship_add'][] = Array(
    1,
    'Update related records',
    'custom/modules/ModuleName/LogicHooks.php',
    'LogicHooks',
    'updateRecords'
);

class LogicHooks {
    public function updateRecords($bean, $event, $arguments) 
    {
        // example logic to update a related record
        // $arguments contain information about the relationship
        
        $relatedBeanId = $arguments['related_id'];
        
    }
}

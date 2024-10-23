<?php


// the path is like = custom/modules/custom_module/LogicHooks.php
class LogicHooks {
    public function setAutoIncrementNumber($bean, $event, $arguments) 
    {
        
        if (empty($bean->id)) {
            
           
            $query = "SELECT MAX(custom_number) AS max_number FROM custom_module";
            $result = $GLOBALS['db']->query($query);
            $row = $GLOBALS['db']->fetchByAssoc($result);
            $maxNumber = !empty($row['max_number']) ? $row['max_number'] : 0;

            $bean->custom_number = $maxNumber + 1;

        }
    }
}

<?php 



$hook_array['after_login'][] = Array(
    1,
    'Log login',
    'custom/modules/ModuleName/LogicHooks.php',
    'LogicHooks',
    'logLogin'
);

class LogicHooks 
{
    public function logLogin($bean, $event, $arguments) 
    {
        // save Log the user's login 
        acces_log('user succesfully loged in','after_login');
    }
        
}

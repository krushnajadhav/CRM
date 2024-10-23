<?php

$hook_array['before_save'][] = Array(
    1,
    'Set auto-increment number',
    'custom/modules/YourCustomModule/LogicHooks.php',
    'LogicHooks',
    'setAutoIncrementNumber'
);

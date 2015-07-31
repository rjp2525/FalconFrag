<?php

if (!function_exists('active_route')) {
    function active_route($names, $activeClass = 'active', $inactiveClass = '')
    {
        return app('active')->route($names, $activeClass, $inactiveClass);
    }
}

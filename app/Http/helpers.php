<?php 

if (!function_exists('callName')) {
    function callName($key)
    {
       dd($key+1);
    }
}

if (!function_exists('test')) {
    function test()
    {
    
        return 'testing only';
    }
}
?>
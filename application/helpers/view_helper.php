<?php

use Jenssegers\Blade\Blade;

if (!function_exists('view')) {
    function view($view, $data = [])
    {
        $path  = APPPATH . 'modules';
        $blade = new Blade($path, APPPATH . 'views/cache');

        echo $blade->make($view, $data)->render();
    }
}

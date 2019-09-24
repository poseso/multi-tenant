<?php

use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Global Security Helpers Functions
|--------------------------------------------------------------------------
*/

if (! function_exists('sectoken')) {
    /**
     * Access the Security Token Helper.
     * @return string
     */
    function sectoken()
    {
        return strtoupper(hash('crc32', Carbon::now()->toDateTimeString()));
    }
}

<?php

if (!function_exists('PingFunction')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function PingFunction($ip)
    {
        exec("ping -n 1 -w 100 $ip", $output, $status);
        return $output;

    }
}

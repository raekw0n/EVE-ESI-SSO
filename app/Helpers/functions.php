<?php

if (!function_exists('is_32bit_unsigned_int'))
{
    function is_32bit_signed_int($value)
    {
        return (abs($value) & 0x7FFFFFFF) === abs($value);
    }
}

if (!function_exists('set_status_alert_level'))
{
    function set_status_alert_level($status)
    {
        $status = strtolower($status);
        if ($status === 'finished')
        {
            $level = 'alert-success';
        } else if ($status === 'deleted') {
            $level = 'alert-dark';
        } else if($status === 'outstanding') {
            $level = 'alert-warning';
        } else if ($status === 'failed') {
            $level = 'alert-danger';
        } else {
            $level = 'alert-info';
        }

        return $level;
    }
}

if (!function_exists('set_positive_negative_alert_level'))
{
    function set_positive_negative_alert_level($value)
    {
        if (substr($value, 0, 1) === "-") // lmao
        {
            return 'alert-danger';
        } else {
            return 'alert-success';
        }
    }
}


function set_completed_on_text($status)
{
    $status = strtolower($status);
    if ($status === 'outstanding' || $status === 'in_progress') {
        $text = 'TBC';
    } else {
        $text = 'N/A';
    }

    return $text;
}

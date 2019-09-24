<?php

use App\Helpers\General\TimezoneHelper;

if (! function_exists('timezone')) {
    /**
     * Access the timezone helper.
     */
    function timezone()
    {
        return resolve(TimezoneHelper::class);
    }
}

if (! function_exists('get_timezone')) {
    /**
     * Get settings timezone.
     * @return string
     */
    function get_timezone()
    {
        return Settings::get('timezone');
    }
}

if (! function_exists('get_full_date')) {
    /**
     * Get full date from settings.
     * @return string
     */
    function get_full_date()
    {
        $dateformat = Settings::get('dateformat');
        $timeformat = Settings::get('timeformat');

        return "$dateformat $timeformat";
    }
}

if (! function_exists('timezones')) {
    function timezones()
    {
        $timezoneIdentifiers = DateTimeZone::listIdentifiers();
        $utcTime = new DateTime('now', new DateTimeZone('UTC'));
        $tempTimezones = [];

        foreach ($timezoneIdentifiers as $timezoneIdentifier) {
            $currentTimezone = new DateTimeZone($timezoneIdentifier);
            $tempTimezones[] = [
                'offset' => (int) $currentTimezone->getOffset($utcTime),
                'identifier' => $timezoneIdentifier,
            ];
        }
        usort($tempTimezones, function ($a, $b) {
            return ($a['offset'] == $b['offset'])
                ? strcmp($a['identifier'], $b['identifier'])
                : $a['offset'] - $b['offset'];
        });
        $timezones = [];

        foreach ($tempTimezones as $tz) {
            $sign = ($tz['offset'] > 0) ? '+' : '-';
            $offset = gmdate('H:i', abs($tz['offset']));
            $timezones[$tz['identifier']] = '(UTC '.$sign.$offset.') '.
                $tz['identifier'];
        }

        return $timezones;
    }
}

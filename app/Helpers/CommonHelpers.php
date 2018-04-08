<?php

if (! function_exists('human_words')) {
    /**
     * Return human readable string from camel case or snake case string.
     *
     * @param $string
     * @return string
     */
    function human_words($string)
    {
        $string = snake_case($string);
        $string = ucwords(str_replace('_', ' ', $string));

        return $string;
    }
}

if (! function_exists('in_array_reverse')) {
    /**
     * Check if any value on the array matches the search string.
     *
     * @param $needle
     * @param $haystack
     * @return bool
     */
    function in_array_reverse($needle, $haystack)
    {
        if (!is_array($haystack))
            $haystack = array($haystack);

        if (in_array($needle, $haystack))
            return true;

        foreach ($haystack as $hay) {
            if (strpos($hay, '*') === false)
                continue;

            if (str_is($hay, $needle)) {
                return true;
            }
        }

        return false;
    }
}

if (! function_exists('storage_asset')) {
    /**
     * Generate an asset storage path for the application.
     *
     * @param  string  $path
     * @param  bool    $secure
     * @return string
     */
    function storage_asset($path, $secure = null)
    {
        return app('url')->asset('storage/'. $path, $secure);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 09/08/2018
 * Time: 13.47
 */

if (! function_exists('remove_words')) {
    /**
     * Remove words from the start of a string.
     *
     * @param $text
     * @param int $count
     * @return string
     */
    function remove_words($text, $count = 1)
    {
        if (str_word_count($text) > $count) {
            return explode (' ', $text, $count + 1)[$count];
        }

        return '';
    }
}

if (! function_exists('request')) {
    /**
     * Get an instance of the current request or an input item from the request.
     *
     * @param  array|string  $key
     * @param  mixed   $default
     * @return \Illuminate\Http\Request|string|array
     */
    function request($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('request');
        }

        if (is_array($key)) {
            return app('request')->only($key);
        }

        $value = app('request')->__get($key);

        return is_null($value) ? value($default) : $value;
    }
}

if (! function_exists('bcrypt')) {
    /**
     * Hash the given value against the bcrypt algorithm.
     *
     * @param  string  $value
     * @param  array  $options
     * @return string
     */

    function bcrypt($value, $options = []) {
        return app('hash')->driver('bcrypt')->make($value, $options);
    }
}

if (! function_exists('bcrypt_check')) {
    /**
     * Check the given value against bcrypt algorithm hashed value.
     *
     * @param  string  $plainText
     * @param  string  $bcryptText
     * @param  array  $options
     * @return string
     */

    function bcrypt_check($plainText, $bcryptText, $options = []) {
        return app('hash')->driver('bcrypt')->check($plainText, $bcryptText, $options);
    }
}
<?php

function dump($tab)
{
        echo '<pre style="background-color: #000; width: 200px; height: 100px; overflow: scroll; font-size: 0.5rem; padding: 0.6rem;  color: #fff; font-family: Consolas, Monospace;">';
        var_dump($tab);
        echo '</pre>';
}

function debug($tab)
{
    echo '<pre style="height: 100px; overflow: scroll; font-size: 0.5rem; padding: 0.6rem; font-family: Consolas, Monospace; background-color: #000; color: #fff;">';
    print_r($tab);
    echo '</pre>';
}

function dateFormat($data, string $format = 'd/m/Y à H:i'): string
{
    if ($data == null) {
	return '';
    }
    return date($format, strtotime($data));
}

function cleanXss(string $key)
{
	return trim(strip_tags($_POST[$key]));
}

function getError($e, $key)
{
	return (!empty($e[$key])) ? $e[$key] : '';
}

function get_post_value($key, $data = null)
{
    if (!empty($_POST[$key]))
	return $_POST[$key];
    else {
	if (!empty($data))
	    return $data;
    }
    return '';
}

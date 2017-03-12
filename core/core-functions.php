<?php
/*
 * Page for universal custom functions
 * Alec Dewitz
 */


##Gets current directory, if switches to different servers/directories
function currentdir($url) {
    // note: anything without a scheme ("example.com", "example.com:80/", etc.) is a folder
    // remove query (protection against "?url=http://example.com/")
    if ($first_query = strpos($url, '?')) $url = substr($url, 0, $first_query);
    // remove fragment (protection against "#http://example.com/")
    if ($first_fragment = strpos($url, '#')) $url = substr($url, 0, $first_fragment);
    // folder only
    $last_slash = strrpos($url, '/');
    if (!$last_slash) {
        return '/';
    }
    // add ending slash to "http://example.com"
    if (($first_colon = strpos($url, '://')) !== false && $first_colon + 2 == $last_slash) {
        return $url . '/';
    }
    return substr($url, 0, $last_slash + 1);
}

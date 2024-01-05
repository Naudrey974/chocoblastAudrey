<?php
function cleanInput(string $value): string
{
    return htmlspecialchars(strip_tags(trim($value)), ENT_NOQUOTES);
}
function print_info($content, $param = false)
{
    echo '<pre>';
    var_dump($content);
    echo '</pre>';
    if ($param) {
        die;
    }
}
function getFileExtension(string $file):string
{
    return substr(strrchr($file,'.'),1);
}

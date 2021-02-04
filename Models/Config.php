<?php

define('ROOT', realpath(dirname(__FILE__) . '/..'));

include_once 'Lib/Parsers/iParser.php';
include_once 'Lib/Parsers/ParserBase.php';
include_once 'Lib/Parsers/GoogleTrends.php';

class Config
{
    public function __construct() {
        try {
            $json = json_decode (file_get_contents("config.json"));
            foreach ($json as $key => $value) $this->{$key} = $value;
        } catch (Exception $e)
        {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}
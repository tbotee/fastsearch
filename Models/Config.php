<?php

if( !session_id() ) @session_start();
$_SESSION['script'] = '';

class Config
{
    public function __construct() {
        try {
            $json = json_decode (file_get_contents(ROOT . "/config.json"));
            foreach ($json as $key => $value) $this->{$key} = $value;
        } catch (Exception $e)
        {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}
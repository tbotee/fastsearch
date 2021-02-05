<?php

define('ROOT', realpath(dirname(__FILE__) . '/..'));

require_once(ROOT . '/Models/Config.php');
include_once ROOT . "/Lib/Parsers/iParser.php";
include_once ROOT . "/Lib/Parsers/ParserBase.php";
include_once ROOT . "/Models/Item.php";

if (isset($_GET["category"]) &&
    htmlspecialchars($_GET['category']) != "" &&
    isset($_GET["q"]) &&
    htmlspecialchars($_GET['q']) != "")
{
    $config= new Config();
    $category = htmlspecialchars($_GET['category']);
    $toParse = array();
    $results = array();

    foreach($config->parsers as $parser)
    {
        if ($parser->enabled && $parser->category == $category)
        {
            $className = $parser->className;
            include_once ROOT . "/Lib/Parsers/" . $className . ".php";
            $class = new $className($parser);
            $items = $class->getCachedIfExist(htmlspecialchars($_GET['q']));
            if ($items) {
                $results = array_merge($results, $items);
            } else {
                $toParse[] = $class;
            }
            // $toParse[] = $class;
        }
    }

    $node_count = count($toParse);
    if (count($toParse) > 0)
    {
        $results = array();
        $curl_arr = array();
        $master = curl_multi_init();

        for($i = 0; $i < $node_count; $i++)
        {
            $url =$toParse[$i]->url;
            $url =$toParse[$i]->url . $toParse[$i]->encode($_GET['q']);
            $curl_arr[$i] = curl_init($url);

            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CONNECTTIMEOUT => 5,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36"
            );
            curl_setopt_array($curl_arr[$i], $options);
            curl_multi_add_handle($master, $curl_arr[$i]);
        }

        do {
            curl_multi_exec($master,$running);
        } while($running > 0);

        for($i = 0; $i < $node_count; $i++)
        {
            $items = $toParse[$i]->getListFromString(curl_multi_getcontent  ( $curl_arr[$i]  ));
            $toParse[$i]->saveCache($items, $toParse[$i]->getFileName(htmlspecialchars($_GET['q'])));
            $results = array_merge($results, $items);
        }
    }

    foreach ($results as $item)
    {
        include ROOT . '/Views/Home/item.php';
    }
} else
{

}
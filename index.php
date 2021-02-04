<?php

define('ROOT', realpath(dirname(__FILE__)));

require_once('Models/Config.php');
require_once('Lib/Boostrap.php');

$config = new Config();

$bootStrap = new Boostrap($config);
$bootStrap->render();

//require_once('Lib/iParser.php');
//require_once('Lib/ParserBase.php');
//
//require_once('Models/Item.php');
//require_once('Lib/GoogleTrends.php');
//require_once('Lib/Reddit.php');
//require_once('Lib/Ello.php');
//require_once('Lib/ABCNews.php');
//require_once('Lib/CNN.php');
//require_once('Lib/BuzzFeed.php');
//require_once('Lib/EOnline.php');



//$gt = new GoogleTrends($config);
//print_r($gt->getGoogleTrends($config));

//$reddit = new Reddit($config);
//$reddits = $reddit->getItems("penguins");


//$abcNews = new ABCNews($config);
//print_r($abcNews->getItems("fbi"));

//$cnn = new CNN($config);
//print_r($cnn->getItems("fbi"));

//$buzzFeed = new BuzzFeed($config);
//print_r($buzzFeed->getItems("fbi"));

// $eOnline = new EOnline($config);
// print_r($eOnline->getItems("fbi"));

?>

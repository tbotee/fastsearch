<?php

// https://v2.sg.media-imdb.com/suggestion/f/fba_a.json

class IMDB extends ParserBase implements iParser
{
    public function __construct($parser)
    {
        $this->url = $parser->url;
        $this->config = $parser;
    }

    public function getItems(string $term)
    {
        $object = parent::getItemsFromSource($term);
        return $this->getListFromObject($object);
    }

    private function getListFromObject($object): array
    {
        $items = array();

        foreach ($object->data->children as $item) {
            $items[] = new Item(
//                (string)$item->data->title,
//                (string)$item->data->selftext,
//                "https://www.reddit.com/" . (string)$item->data->permalink,
//                in_array ((string)$item->data->thumbnail, $this->notImageArray) ? "" : (string)$item->data->thumbnail,
//                (string)$item->data->created_utc,
//                "Reddit"
            );
        }
        return $items;
    }


    public function getListFromString(string $html)
    {
        $object = json_decode($html);
        return $this->getListFromObject($object);
    }

    public function encode(string $url)
    {
        return strtolower( preg_replace('/[^a-zA-Z0-9_.]/', '_', htmlspecialchars($url))) . ".json";
    }

}
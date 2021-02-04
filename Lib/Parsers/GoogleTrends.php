<?php


class GoogleTrends extends ParserBase implements iParser
{

    public function __construct(Config $setting)
    {
        $this->url = $setting->googleTrendsParser->googleTrendsUrl;
        $this->config = $setting->googleTrendsParser;
    }

    public function getItems(string $term) {

        $file = simplexml_load_file($this->url);
        $items = array();
        foreach ($file->channel->item as $item)
        {
            $items[] = (string) $item->title;
        }

        return $items;
    }

}
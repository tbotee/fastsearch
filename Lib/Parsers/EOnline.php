<?php


class EOnline extends ParserBase implements iParser
{

    public function __construct(Config $setting)
    {
        $this->url = $setting->eOnlineUrl;
    }

    public function getItems(string $term)
    {
        $string = parent::getItemsFromSource($term);
        $obj = $this->resultObject($string);
        $items = array();

        foreach ($obj->items as $item)
        {
            $items[] = new Item(
                (string) $item->title,
                (string) $item->description,
                (string) $item->link,
                (string) $item->image
            );
        }
        return $items;
    }

    private function resultObject (string $res) {
        $startsAt = strpos($res, "JSON.parse('") + strlen("JSON.parse('");
        $endsAt = strpos($res, "queryly.ads", $startsAt);
        $result = str_replace(
            array('\\"', '\''), "\"",
            substr(trim(substr($res, $startsAt, $endsAt - $startsAt)), 0, -3));
        return json_decode($result);
    }
}
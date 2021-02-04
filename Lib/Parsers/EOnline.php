<?php


class EOnline extends ParserBase implements iParser
{

    public function __construct($parser)
    {
        $this->url = $parser->url;
        $this->config = $parser;
    }

    public function getItems(string $term)
    {
        $string = parent::getItemsFromSource($term);
        $obj = $this->resultObject($string);

        return $this->getListFromObject($obj);
    }

    public function getListFromString(string $html)
    {
        $obj = $this->resultObject($html);

        return $this->getListFromObject($obj);
    }

    private function getListFromObject($obj): array
    {
        $items = array();

        foreach ($obj->items as $item)
        {
            $items[] = new Item(
                (string) $item->title,
                (string) $item->description,
                (string) $item->link,
                (string) $item->image,
                (string) $item->pubdate,
                "EOnline"
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

    public function encode(string $url)
    {
        return urlencode(htmlspecialchars($url));
    }
}
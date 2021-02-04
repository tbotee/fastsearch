<?php


class ABCNews extends ParserBase implements iParser
{

    public function __construct($parser)
    {
        $this->url = $parser->url;
        $this->config = $parser;
    }

    public function getItems(string $term) {

        $object = parent::getItemsFromSource($term);
        return $this->getListFromObject($object);
    }

    public function getListFromString(string $html)
    {
        $object = json_decode($html);
        return $this->getListFromObject($object);
    }

    public function encode(string $url)
    {
        return str_replace("%", "%25", rawurlencode(htmlspecialchars($url)));
    }

    private function getListFromObject($object): array
    {
        $items = array();
        foreach ($object->item as $item)
        {
            $items[] = new Item(
                (string) $item->title,
                (string) $item->description,
                (string) $item->link,
                (string) $item->image,
                "",
                "ABCNews"
            );
        }
        return $items;
    }
}
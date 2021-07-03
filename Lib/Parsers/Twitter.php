<?php

class Twitter extends ParserBase implements iParser
{
//https://api.twitter.com/2/tweets/search/recent?expansions=attachments.media_keys,author_id,entities.mentions.username&media.fields=preview_image_url,type,url&tweet.fields=attachments,created_at&max_results=30&query="
    public function __construct($parser)
    {
        $this->url = $parser->url;
        $this->config = $parser;
        $this->header = "Authorization: Bearer AAAAAAAAAAAAAAAAAAAAALuzMQEAAAAA3BrRsCkBavi2s2PxjvNrYPKpPM8%3Dta9YDtcX1GZVf3FXSOzOTdfEEZkcsSCLqnq1AJuIzYdJYstQ8b";
    }

    public function getItems(string $term)
    {
        $object = parent::getItemsFromSource($term);
        return $this->getListFromObject($object);
    }

    public function getListFromString(string $html)
    {
        $object = json_decode($html);
        return $this->getListFromObject($object);
    }

    private function getListFromObject($object): array
    {
        $items = array();

        $mediaFiles = $this->getMediaItems($object);

        foreach ($object->data as $item) {
            $items[] = new Item(
                (string) $item->text,
                (string) $item->text,
                $this->getUserName($item),
                $this->getImage($item, $mediaFiles),
                $item->created_at,
                "Twitter"
            );
        }
        return $items;
    }

    private function getMediaItems($object)
    {
        return
            isset($object->includes) && isset($object->includes->media) && count($object->includes->media) ?
                $object->includes->media : array();
    }

    public function encode(string $url)
    {
        return urlencode(htmlspecialchars($url));
    }

    private function getImage($item, $mediaFiles) : string
    {
        $id = $this->getImageId($item);
        $image = "";

        if ($id != "")
        {
            foreach ($mediaFiles as $mf)
            {
                if ($mf->media_key == $id)
                {
                    $image = $mf->type == "video" ? $mf->preview_image_url : $mf->url;
                }
            }
        }

        return $image;
    }

    private function getUserName($item) : string
    {
        if (isset($item->entities) && isset($item->entities->mentions) && count($item->entities->mentions) > 0)
            return "https://twitter.com/" . (string) $item->entities->mentions[0]->username;

        preg_match_all('!https?://\S+!', (string) $item->text, $match);
        if (count($match[0]) > 0 && isset($match[0][0]))
        {
            return $match[0][0];
        }

        return "https://twitter.com/";
    }

    private function getImageId($item): string
    {
        if (isset($item->attachments) &&
            isset($item->attachments->media_keys) &&
            count($item->attachments->media_keys) > 0) {
            return (string)$item->attachments->media_keys[0];
        }

        return "";
    }

}
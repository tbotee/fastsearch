<?php


class Item
{

    public $title = "";
    public $description = "";
    public $url = "";
    public $image = "";
    public $created = "";
    public $source = "";

    public function __construct(string $title, string $description, string $url, string $image, string $created = "", string $source = "")
    {
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->image = $image;
        $this->created = $created;
        $this->source = $source;
    }
}
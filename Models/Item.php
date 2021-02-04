<?php


class Item
{

    public $title = "";
    public $description = "";
    public $url = "";
    public $image = "";

    public function __construct(string $title, string $description, string $url, string $image)
    {
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->image = $image;
    }
}
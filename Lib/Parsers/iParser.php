<?php

interface iParser
{
    public function getItems(string $term);

    public function __construct(Config $setting);
}
<?php


class ParserBase
{
    public $url = "";
    public $config;

    protected function getItemsFromSource($term)
    {
        $ch = curl_init($this->url . urlencode($term));

        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_USERAGENT => "'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';"
        );

        curl_setopt_array($ch, $options);

        $apiResponse = curl_exec($ch);
        $response = json_decode($apiResponse);

        if ($error = json_last_error()){
            $response = $apiResponse;
        }
        curl_close($ch);

        return $response;
    }

    public function getCachedItems($term)
    {
        $fileName = $this->getFileName($term);
        if (file_exists($fileName))
        {
            $obj = json_decode(file_get_contents($fileName));
            if ($obj->expiresAt < time())
            {
                return $this->fetchFromServerAndSaveToCache($term, $fileName);
            }
            else
            {
                return $obj->items;
            }
        }
        else
        {
            return $this->fetchFromServerAndSaveToCache($term, $fileName);
        }
    }

    private function fetchFromServerAndSaveToCache($term, $fileName)
    {
        $items = $this->getItems($term);
        $this->saveCache($items, $fileName);
        return $items;
    }

    public function getCachedIfExist($term)
    {
        $fileName = $this->getFileName($term);
        if (file_exists($fileName))
        {
            $obj = json_decode(file_get_contents($fileName));
            return $obj->expiresAt < time() ? false : $obj->items;
        } else
            return false;
    }

    public function getFileName($term): string
    {
        return ROOT . '/Cache/' . $this->config->className . '-' . md5($term) . '.json';
    }

    public function saveCache($items, $fileName)
    {
        $saveObject = new class {};
        $saveObject->expiresAt = time() + ($this->config->cacheTime * 60);
        $saveObject->items = $items;
        file_put_contents($fileName, json_encode($saveObject));
    }

}
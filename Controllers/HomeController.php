<?php


class HomeController
{

    public $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function render()
    {
        if (isset($_POST['submit']) && $_POST['q'])
        {
            $this->handleQuery(urlencode(htmlspecialchars($_POST['q'])));
        }
        else
        {
            $this->displayHome();
        }

    }

    private function handleQuery(string $q)
    {
        header("Location: {$this->config->baseUrl}?q={$q}");
    }

    private function displayHome()
    {
        $homeUrl = $this->config->baseUrl;
        if (isset($_GET["q"]))
        {
            $q = htmlspecialchars($_GET['q']);
            $inputVal = urldecode($q);
            include 'Views/Home/searchResults.php';
        }
        else
        {
            $trends = $this->getGoogleTrends();
            include 'Views/Home/index.php';
        }
    }

    private function getGoogleTrends()
    {
        $gt = new GoogleTrends($this->config);
        return $gt->getCachedItems("");
    }



}
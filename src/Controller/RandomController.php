<?php


namespace App\Controller;

class RandomController extends AbstractController
{
    public function gallery()
    {
        $data = $this->get('https://api.windy.com/api/webcams/v2/list?show=countries&key=' . APP_API_KEY . "&lang=fr");


        $arrayCount = count($data["result"]["countries"]) - 1;

        $random = rand(0, $arrayCount);


        var_dump($data["result"]["countries"][$random]);

        $country = $data["result"]["countries"][$random];
        $id = $country["id"];
        $name = urlencode($country["name"]);

        header('Location:/gallery/index/' . $id . '/' . $name);
    }
}

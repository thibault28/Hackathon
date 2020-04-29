<?php


namespace App\Controller;

class CountryController extends AbstractController
{
    public function index()
    {
        $data = $this->get('https://api.windy.com/api/webcams/v2/list?show=countries&key=' . APP_API_KEY . "&lang=fr");



        return $this->twig->render('Country/index.html.twig', [
            'data' => $data,
        ]);
    }
}

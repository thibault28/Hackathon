<?php


namespace App\Controller;

class CategoryController extends AbstractController
{
    public function index()
    {
        $data = $this->get('https://api.windy.com/api/webcams/v2/list?show=categories&key=' . APP_API_KEY . "&lang=fr");



        return $this->twig->render('Category/index.html.twig', [
            'data' => $data,
        ]);
    }
}

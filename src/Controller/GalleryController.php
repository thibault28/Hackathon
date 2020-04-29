<?php


namespace App\Controller;

class GalleryController extends AbstractController
{
    public function index($id, $pays, $filtre = null)
    {
        if (empty($filtre)) {
            $data = $this->get('https://api.windy.com/api/webcams/v2/list/
            country=' . $id .
                '/orderby=random?show=webcams:location,image&key=zFwzbczWuEnPI67QddSYs4E4D5SaBRQI&lang=fr'
                . APP_API_KEY);
        } else {
            $data = $this->get('https://api.windy.com/api/webcams/v2/list/country=' . $id .
                '/category=' . $filtre .
                '/orderby=random?show=webcams:location,image&key=zFwzbczWuEnPI67QddSYs4E4D5SaBRQI&lang=fr'
                . APP_API_KEY);
        }

        $filter = $this->get('https://api.windy.com/api/webcams/v2/list?show=categories&lang=fr&key=' . APP_API_KEY);


        return $this->twig->render('Gallery/index.html.twig', [
            'id' => $id,
            'pays' => $pays,
            'data' => $data,
            "filter" => $filter,
        ]);
    }
}

<?php


namespace App\Controller;

class DescriptionController extends AbstractController
{
    public function index($id = null)
    {
        $data = "";
        if (!empty($id)) {
            $data = $this->get('https://api.windy.com/api/webcams/v2/list/webcam='
                .$id.'?show=webcams:location,image&lang=fr&key=' .APP_API_KEY);
        } else {
            header("Location:/");
        }


        return $this->twig->render('Description/index.html.twig', [
            'data' => $data,
        ]);
    }
}

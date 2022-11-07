<?php

namespace App\Controllers;

use App\Entity\Artist;

class MainController extends Controller
{
    public function index()
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/search?q=vald&type=artist");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));
        $artists = [];
        foreach ($result->artists->items as $item) {
            if (empty($item->images)) {
                $picture = 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FUser_(computing)&psig=AOvVaw3baiXQH-s8hX5ZJ-QicfZJ&ust=1667901484961000&source=images&cd=vfe&ved=0CA0QjRxqFwoTCJDRg6_nm_sCFQAAAAAdAAAAABAI';
            } else {
                $picture = $item->images[0]->url;
            }
            $artist = new Artist($item->id, $item->name, $item->followers->total, $item->genres, $item->external_urls->spotify, $picture);
            array_push($artists, $artist);
        }
        $this->render('main/index', compact('artists'));

    }
}
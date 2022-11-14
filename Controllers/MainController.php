<?php

namespace App\Controllers;

use App\Entity\Album;
use App\Entity\Artist;

class MainController extends Controller
{
    public function index()
    {
        $allFavArtists = new Artist();
        $allFavArtists = $allFavArtists->findAll();
        $lastAlbumsFavs = [];

        if (!empty($allFavArtists)) {
            foreach ($allFavArtists as $allFavArtist) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/" . $allFavArtist->spotify_id . "/albums");

                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = json_decode(curl_exec($ch));
                if (empty($result->items[0]->images)) {
                    $picture = 'https://i.ebayimg.com/images/g/DW0AAOxykVNRw2xX/s-l400.jpg';
                } else {
                    $picture = $result->items[0]->images[0]->url;
                }

                $tempAlbum = new Album($result->items[0]->id, $result->items[0]->name, $result->items[0]->release_date, $result->items[0]->total_tracks, $result->items[0]->external_urls->spotify, $picture);
                array_push($lastAlbumsFavs, $tempAlbum);
            }
        }
        
        $this->render('main/index', compact('lastAlbumsFavs'));

    }
}
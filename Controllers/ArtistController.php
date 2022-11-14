<?php

namespace App\Controllers;

use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Track;

class ArtistController extends Controller
{

    public function albums($id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/" . $id . "/albums");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));
        $albums = [];

        if ($result->items == null) {
            $message = 'Cet artiste n\'a pas d\'album :/';
            $this->render('artist/albums', compact('message'));
        }
        foreach ($result->items as $item) {
            if (empty($item->images)) {
                $picture = 'https://i.ebayimg.com/images/g/DW0AAOxykVNRw2xX/s-l400.jpg';
            } else {
                $picture = $item->images[0]->url;
            }
            $album = new Album($item->id, $item->name, $item->release_date, $item->total_tracks, $item->external_urls->spotify, $picture);
            array_push($albums, $album);
        }
        $this->render('artist/albums', compact('albums'));
    }

    public function search()
    {
        $message = 'Cet artiste n\'existe pas ^^';
        if (empty($_POST['artist'])) {
            $this->render('artist/search', compact('message'));
        } else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/search?q=" . preg_replace('/\s+/', '_', $_POST['artist']) . "&type=artist");

            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = json_decode(curl_exec($ch));
            if ($result->artists->items == null) {
                $this->render('artist/search', compact('message'));
            }
            $artists = [];
            foreach ($result->artists->items as $item) {
                if (empty($item->images)) {
                    $picture = 'https://www.repaq.eu/wp-content/uploads/2022/03/repaq-blanco-328x328.1646994942.jpg';
                } else {
                    $picture = $item->images[0]->url;
                }
                $artist = new Artist($item->id, $item->name, $item->followers->total, $item->genres, $item->external_urls->spotify, $picture);
                array_push($artists, $artist);
            }
            $this->render('artist/search', compact('artists'));
        }
    }

    public function tracks($albumId){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/albums/" . $albumId . "/tracks");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));
        $tracks = [];
        foreach ($result->items as $item) {
            $track = new Track($item->id, $item->name, $item->track_number, $item->duration_ms, $item->external_urls->spotify);
            array_push($tracks, $track);
        }
        $this->render('artist/albumtracks', compact('tracks'));
    }

}
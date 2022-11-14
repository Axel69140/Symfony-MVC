<?php

namespace App\Controllers;


use App\Controllers\Controller;
use App\Entity\Artist;
use App\Entity\Track;

class FavoritesController extends Controller
{

    public function artists()
    {
        $this->render('favorites/favartists');
    }

    public function tracks()
    {
        $this->render('favorites/favtracks');
    }

    public function favArtists($artistId)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/" . $artistId);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));

        $tempArtist = new Artist();
        if ($tempArtist->findBy(['spotify_id' => $artistId])) {
            $tempArtist->delete($tempArtist->findBy(['spotify_id' => $artistId])[0]->id);
        } else {
            if (empty($result->images[0])) {
                $picture = 'https://www.repaq.eu/wp-content/uploads/2022/03/repaq-blanco-328x328.1646994942.jpg';
            } else {
                $picture = $result->images[0]->url;
            }
            $artist = new Artist($artistId, $result->name, $result->followers->total, $result->genres, $result->external_urls->spotify, $picture);
            $artist->create();
        }
        $this->render('favorites/favartists');
    }

    public function favTracks($trackId)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/tracks/" . $trackId);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));
        $tempTrack = new Track();
        if ($tempTrack->findBy(['spotify_id' => $trackId])) {
            $tempTrack->delete($tempTrack->findBy(['spotify_id' => $trackId])[0]->id);
        } else {
            $authors = "";

            foreach ($result->artists as $artist) {
                $authors = $authors . $artist->name . ' ';
            }
            $track = new Track($trackId, $result->name, $authors, $result->track_number, $result->duration_ms, $result->external_urls->spotify);
            $track->create();
        }
        $this->render('favorites/favtracks');
    }


    public function searchTrack()
    {
        $message = 'Cette musique n\'existe pas ^^';
        if (empty($_POST['trackinput'])) {
            $this->render('favorites/tracksearch', compact('message'));
        } else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/search?q=" . preg_replace('/\s+/', '_', $_POST['trackinput']) . "&type=track");

            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = json_decode(curl_exec($ch));
            if ($result->tracks->items == null) {
                $this->render('favorites/tracksearch', compact('message'));
            }

            $tracks = [];
            $authors = "";
            foreach ($result->tracks->items as $item) {
                foreach ($item->artists as $artist){
                    $authors = $authors . $artist->name . ' ';
                }
                $track = new Track($item->id, $item->name, $authors, $item->track_number, $item->duration_ms, $item->external_urls->spotify);
                array_push($tracks, $track);
                $authors = '';
            }

            $this->render('favorites/tracksearch', compact('tracks'));
        }
    }
}

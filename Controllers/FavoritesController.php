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
            $track = new Track($trackId, $result->name, $result->track_number, $result->duration_ms, $result->external_urls->spotify);
            $track->create();
        }
        $this->render('favorites/favtracks');
    }

}

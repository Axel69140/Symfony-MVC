<?php

namespace App\Entity;

class Album
{

    public function __construct(
        public string $id,

        public string $name,

        public string $releaseDate,

        public int    $totalTracks,

        public string $link,

        public string $picture
    )
    {
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    /**
     * @param string $releaseDate
     */
    public function setReleaseDate(string $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return int
     */
    public function getTotalTracks(): int
    {
        return $this->totalTracks;
    }

    /**
     * @param int $totalTracks
     */
    public function setTotalTracks(int $totalTracks): void
    {
        $this->totalTracks = $totalTracks;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture(string $picture): void
    {
        $this->picture = $picture;
    }

    public function display(): string
    {
        return "<div class=\"col-lg-4 mb-5\">
                    <div class=\"card shadow-sm\">
                        <img class=\"bd-placeholder-img card-img-top\"
                             src=\"$this->picture\"
                             alt=\"Image de l'album $this->name \">
                        <div class=\"card-body\">
                            <h2 class='mb-0'>$this->name</h2>
                            <p class=\"text-muted align-top\">($this->releaseDate)</p>
                                    
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div class=\"btn-group\">
                                    <a class='pr-2' href=\"$this->link\">
                                        <button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Spotify</button>
                                    </a>
                                    <a href=\"/artist/tracks/?albumid=" . $this->id . "\" class=\"ms-1\">
                                        <button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Voir les titres (" . $this->totalTracks . ")
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>";
    }

}
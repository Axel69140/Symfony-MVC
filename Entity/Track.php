<?php

namespace App\Entity;

class Track extends Model
{

    public function __construct(

        public ?string $spotify_id = null,

        public ?string $name = null,

        public ?int    $track_number = null,

        public ?int    $duration = null,

        public ?string $link = null,

        public ?int $id = null,
    )
    {
        $this->table = "favTracks";
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
     * @return int
     */
    public function gettrack_number(): int
    {
        return $this->track_number;
    }

    /**
     * @param int $track_number
     */
    public function settrack_number(int $track_number): void
    {
        $this->track_number = $track_number;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
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

    public function isFav($trackId)
    {
        $temp = new Track();
        return $temp->findBy(['spotify_id' => $trackId]);
    }

    public function display(): string
    {
        if ($this->isFav($this->spotify_id)){
            $btn = "<a href=\"/favorites/favTracks/$this->spotify_id\">
                                        <button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">️❤️
                                        </button>
                                    </a>";
        }else{
            $btn = "<a href=\"/favorites/favTracks/$this->spotify_id\">
                                        <button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">🤍
                                        </button>
                                    </a>";
        }
        return "
                <div class=\"col-1 themed-grid-col align-left\">$btn</div>
                <div class=\"col-4 themed-grid-col align-left\">$this->track_number. $this->name</div>
                <div class=\"col-3 themed-grid-col\">$this->duration</div>
                <div class=\"col-4 themed-grid-col\"><a href=" . $this->link . ">$this->link</a></div>";
    }
}
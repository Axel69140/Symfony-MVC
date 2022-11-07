<?php

namespace App\Entity;

class Track
{

    public function __construct(
        public string $id,

        public string $name,

        public int    $trackNumber,

        public int    $duration,

        public string $link,
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
     * @return int
     */
    public function getTrackNumber(): int
    {
        return $this->trackNumber;
    }

    /**
     * @param int $trackNumber
     */
    public function setTrackNumber(int $trackNumber): void
    {
        $this->trackNumber = $trackNumber;
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

    public function display(): string
    {
        return "
            <div class=\"col-4 themed-grid-col align-left\">$this->trackNumber. $this->name</div>
            <div class=\"col-4 themed-grid-col\">$this->duration</div>
            <div class=\"col-4 themed-grid-col\"><a href=" . $this->link . ">$this->link</a></div>";
    }
}
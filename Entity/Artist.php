<?php

namespace App\Entity;

class Artist
{

    public function __construct(
        public string $id,

        public string $name,

        public int    $followers,

        public array  $genders,

        public string $link,

        public string $picture,
    )
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setFollowers(int $followers): self
    {
        $this->followers = $followers;
        return $this;
    }

    public function getFollowers(): int
    {
        return $this->followers;
    }

    public function getGenders(): array
    {
        return $this->genders;
    }

    public function setGenders(array $genders): self
    {
        $this->genders = $genders;
        return $this;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }


    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;
        return $this;
    }

    public function display(): string
    {
        return "<div class=\"col-lg-4 mb-5\">
                    <div class=\"card shadow-sm\">
                        <img class=\"bd-placeholder-img card-img-top\"
                             src=\"$this->picture\"
                             alt=\"Image de l'artiste $this->name \">
                        <div class=\"card-body\">
                            <h2>$this->name</h2>
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div class=\"btn-group\">
                                    <a class=\"pr-2\" href=\"$this->link\">
                                        <button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Spotify</button>
                                    </a>
                                    <a href=\"/artist/albums/?artistid=$this->id\">
                                        <button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Voir plus...
                                        </button>
                                    </a>
                                    <a href=\"#\">
                                        <button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">🖤
                                        </button>
                                    </a>
                                    
                                </div>
                                <small class=\"text-muted\">$this->followers
                                    listeners</small>
                            </div>
                        </div>
                    </div>
        </div>";
    }

}
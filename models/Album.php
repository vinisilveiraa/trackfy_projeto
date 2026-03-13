<?php
class Album
{
    public function __construct(
        private int $id_album = 0,
        private string $title = '',
        private string $artist = '',
        private string $cover = '',
        private int $release_year = 0,
        private int $total_duration = 0,
        private ?string $created_at = null,
        private ?string $updated_at = null,
        private array $tracks = []
    ) {}

    // Getters
    public function getIdAlbum()
    {
        return $this->id_album;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getArtist()
    {
        return $this->artist;
    }
    public function getCover()
    {
        return $this->cover;
    }
    public function getReleaseYear()
    {
        return $this->release_year;
    }
    public function getTotalDuration()
    {
        return $this->total_duration;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    public function getTracks()
    {
        return $this->tracks;
    }

    // Setters
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setArtist($artist)
    {
        $this->artist = $artist;
    }
    public function setCover($cover)
    {
        $this->cover = $cover;
    }
    public function setReleaseYear($year)
    {
        $this->release_year = $year;
    }
    public function setTotalDuration($duration)
    {
        $this->total_duration = $duration;
    }
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    // Relacionamento com tracks
    public function addTrack(Track $track): void
    {
        $this->tracks[] = $track;
        $track->setAlbum($this); // atualiza o track para apontar para este álbum
    }
}

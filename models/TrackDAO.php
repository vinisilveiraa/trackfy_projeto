<?php
require "Connection.class.php";

class TrackDao extends Connection
{
    public function __construct()
    {
        return parent::__construct();
    }


    public function insert(Track $track)
    {
        $sql = "INSERT INTO tracks (album_id, title, artist, cover_url, release_year, duration_seconds)VALUES (?,?,?,?,?,?)";

        try {
            $stm = $this->db->prepare($sql);

            $stm->bindValue(1, $track->getAlbumId());
            $stm->bindValue(2, $track->getTitle());
            $stm->bindValue(3, $track->getArtist());
            $stm->bindValue(4, $track->getCover());
            $stm->bindValue(5, $track->getReleaseYear());
            $stm->bindValue(6, $track->getDurationSeconds());

            $stm->execute();
            $this->db = null;
        } catch (PDOException $e) {
            $this->db = null;
            return "Problema com o cadastro do usuario";
        }
    }
}

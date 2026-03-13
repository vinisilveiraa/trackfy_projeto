<?php
require "Connection.class.php";

class AlbumDAO extends Connection
{
    public function __construct()
    {
        return parent::__construct();
    }

    public function insert(Album $album)
    {
        $sql = "INSERT INTO albums (title, artist, cover, release_year, total_duration) VALUES (?,?,?,?,?)";

        try {
            $stm = $this->db->prepare($sql);

            $stm->bindValue(1, $album->getTitle());
            $stm->bindValue(2, $album->getArtist());
            $stm->bindValue(3, $album->getCover());
            $stm->bindValue(4, $album->getReleaseYear());
            $stm->bindValue(5, $album->getTotalDuration());

            $stm->execute();
            $this->db = null;
        } catch (PDOException $e) {
            $this->db = null;
        }
    }

    public function selectAllAlbums() {
        $sql = "SELECT id_album, title FROM albums";

        $stm = $this->db->prepare($sql);
        $stm->execute();
        $albums = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $albums;
    }
}

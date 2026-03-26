<?php
require_once "../models/Album.php";
require_once "../models/AlbumDAO.php";


class AlbumController
{
    public function addAlbum()
    {
        $msg_sucess = ["", "", ""];
        $msg_error = array("", "", "");

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $album = new Album();

            if (empty($_POST)) {
                $msg_error[1] = 'Voce deve preencher todos os campos';
                return;
            }

            $album->setTitle($_POST['title']);
            $album->setArtist($_POST['artist']);
            $album->setReleaseYear($_POST['release_year'] ?? 0);
            $album->setTotalDuration($_POST['total_duration'] ?? 0);

            if (!empty($_FILES['cover']['name'])) {
                $filename = uniqid() . "_" . basename($_FILES['cover']['name']);
                $path = "imgs/" . $filename;

                if (move_uploaded_file($_FILES['cover']['tmp_name'], $path)) {
                    $album->setCover($filename);
                }
            } else {
                $album->setCover('default-cover.png'); // capa padrão caso não envie
            }

            $albumDao = new AlbumDAO();

            try {
                $albumDao->insert($album);
                $msg_sucess[2] = "Álbum '{$album->getTitle()}' adicionado com sucesso!";
            } catch (PDOException $e) {
                $msg_error[1] = "Erro ao salvar no banco: " . $e->getMessage();
            }

            header("Location: /add_album");
            exit();
        }
        require "../views/add_album.php";
    }

    public function getAlbums() {
        
    }

    public function deleteAlbum($id) {

    }
}

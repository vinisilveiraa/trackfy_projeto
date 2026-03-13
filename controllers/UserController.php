<?php
require_once '../models/Connection.class.php';

class UserController extends Connection
{
    public function __construct()
    {
        parent::__construct(); // cria a conexão
    }

    public function show($username)
    {

        $sql = "SELECT * FROM users WHERE username = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            http_response_code(404);
            echo "Usuário não encontrado";
            exit;
        }


        // contagem de reviews
        // $sqlReviews = "SELECT COUNT(*) FROM reviews WHERE user_id = ?";
        // $stmt = $this->db->prepare($sqlReviews);
        // $stmt->execute([$user['id_user']]);
        // $reviewCount = $stmt->fetchColumn();

        // // músicas salvas
        // $sqlLibrary = "SELECT COUNT(*) FROM library WHERE user_id = ?";
        // $stmt = $this->db->prepare($sqlLibrary);
        // $stmt->execute([$user['id_user']]);
        // $savedTracks = $stmt->fetchColumn();

        // // média de nota
        // $sqlAvg = "SELECT AVG(rating) FROM reviews WHERE user_id = ?";
        // $stmt = $this->db->prepare($sqlAvg);
        // $stmt->execute([$user['id_user']]);
        // $avgRating = $stmt->fetchColumn();

        // // álbuns favoritos
        // $sqlAlbums = "
        // SELECT a.*
        // FROM albums a
        // JOIN favorite_albums f ON a.id = f.album_id
        // WHERE f.user_id = ?
        // LIMIT 4
        // ";

        // $stmt = $this->db->prepare($sqlAlbums);
        // $stmt->execute([$user['id_user']]);
        // $favoriteAlbums = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require "../views/profile.php";
    }
}

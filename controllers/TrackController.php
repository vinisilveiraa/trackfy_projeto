<?php


class TrackController
{


    public function show($id)
    {
        if (!$id) {
            echo "Track não encontrada";
            return;
        }

        // $track = :getTrackById($id);

        require "../views/track.php";
    }
}

<?php

class SearchController
{
    public function search()
    {
        $search_query = $_GET['q'] ?? '';
        $results = [];

        if (!empty($search_query)) {
            $page = $_GET['page'] ?? 1;
        }

        require "../views/search.php";
    }
}

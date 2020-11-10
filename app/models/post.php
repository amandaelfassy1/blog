<?php

use Carbon\Carbon;

function getAllPosts()
{
    $db = dbConnect();
    $statement = $db->query('SELECT id, title, DATE_FORMAT(created_at, "%d/%m/%Y") as created_at_fr FROM posts');
    return $statement->fetchAll(PDO::FETCH_OBJ);
}

function getPostById($id)
{
    $db = dbConnect();
    $statement = $db->prepare('SELECT * FROM posts WHERE id = :id');
    $statement->execute(['id' => $_GET['id']]);
    $post = $statement->fetchObject();
    $post->created_at = ucfirst(Carbon::parse($post->created_at)->locale('fr_FR')->diffForHumans());
    return $post;
}

function CreatePosts($informations){
    $db= dbConnect();
    $query = $db->prepare("INSERT INTO posts (title, created_at ) VALUES( :title, :created_at)");
    $result = $query->execute([
        'title' => $informations["title"],
        'created_at' => $informations["created_at"]
    ]);
    return $result;
}

function UpdatePost($id, $informations){

    $db= dbConnect();
    $query = $db->prepare("UPDATE posts SET title=?, created_at=? WHERE id =?");
    $result = $query->execute([
        $informations["title"],
        $informations["created_at"],
        $id,
    ]);
    return $result;
}

function deletePost($id)
{
    $db = dbConnect();
    $query = $db->prepare('DELETE FROM posts WHERE id = ?');
    $result = $query->execute(
        [
            $id
        ]
    );

    return $result;
}


<?php

function postIndex()
{
    $posts = getAllPosts();
    view('posts/index.php', compact('posts'));
}
function postCreate()
{
    $informations=[];
    $posts = CreatePosts($informations);
    view('posts/create.php', compact('posts'));
}


function postShow()
{
    if (empty($_GET['id'])) {
        http_response_code(400);
        echo "<html><body>Bad request</body></html>";
        return;
    }

    $post = getPostById($_GET['id']);

    if (!$post) {
        http_response_code(404);
        echo "<html><body>Post not found</body></html>";
        return;
    }

    view('posts/show.php', compact('post'));
}
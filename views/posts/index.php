<?php $title = "My blog"; ?>

<?php ob_start(); ?>

<a href="create">create</a>

<h1>My blog</h1>

<ul>
    <?php foreach ($posts as $post) : ?>
        <li><a href="/show?id=<?= $post->id ?>"><?= $post->created_at_fr ?> - <?= $post->title ?></a></li>
    <?php endforeach ?>
</ul>
<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . "/../layouts/default.php"; ?>   
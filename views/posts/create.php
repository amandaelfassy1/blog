<?php $title = "My blog"; ?>

<?php ob_start(); ?>


<h1>Creation de mon blog</h1>

<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Titre</label>
    <input type="text" class="form-control" id="title" aria-describedby="title">
  </div>
  <div class="form-group">
    <label for="body">Content</label>
    <input type="body" class="form-control" id="body">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . "/../layouts/default.php"; ?>   
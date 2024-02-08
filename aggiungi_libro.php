<?php
    include_once("header.php");
    include_once("navbar.php");

    
?>

<div class="container my-3">
    <h1 class="text-center">Aggiungi un nuovo libro</h1>
    <form method="post" action="controller.php" enctype="multipart/form-data" class="my-3">
        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="titolo" placeholder="Titolo..." name="titolo">
        </div>
        <div class="mb-3">
            <label for="autore" class="form-label">Autore</label>
            <input type="text" class="form-control" id="autore" placeholder="Autore..." name="autore">
        </div>
        <div class="mb-3">
            <label for="anno_pubblicazione" class="form-label">Anno di pubblicazione</label>
            <input type="text" class="form-control" id="anno_pubblicazione" placeholder="Anno di pubblicazione..." name="anno_pubblicazione">
        </div>
        <div class="mb-3">
            <label for="genere" class="form-label">Genere</label>
            <input type="text" class="form-control" id="genere" placeholder="Genere..." name="genere">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" placeholder="Image..." name="image">
        </div>
        <button type="submit" class="btn btn-dark">Register</button>
    </form>
</div>

<?php include_once('footer.php'); ?>
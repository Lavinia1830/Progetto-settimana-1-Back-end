<?php
    include_once('header.php'); 
    include_once('navbar.php'); 

    require_once 'config.php';
    //var_dump($mysqli);

    if(isset($_GET['id']) ) {
        $libro = getLibroByID($mysqli);
    }

    function getLibroByID($mysqli) {     
        $sql = "SELECT * FROM libri WHERE id = " . $_GET['id']; 
        $res = $mysqli->query($sql); // return un mysqli result
        if($res) { // Controllo se ci sono dei dati nella variabile $res 
            $result = $res->fetch_assoc(); // estraggo ogni singola riga che leggo dal DB e la inserisco in un array  
        }
        return $result;
    } 

?>

    <div class="container my-3">
        <h1 class="text-center">Register Page</h1>
        <form method="post" action="controller.php?action=update&id=<?=$_GET['id']?>" enctype="multipart/form-data" class="my-3">
            <div class="mb-3">
                <label for="titlo" class="form-label">Titolo</label>
                <input type="text" value="<?= $libro['titolo'] ?>" class="form-control" id="titolo" placeholder="Titolo..." name="titolo">
            </div>
            <div class="mb-3">
                <label for="autore" class="form-label">Autore</label>
                <input type="text" value="<?= $libro['autore'] ?>" class="form-control" id="autore" placeholder="Autore..." name="autore">
            </div>
            <div class="mb-3">
                <label for="anno_pubblicazione" class="form-label">Anno di pubblicazione</label>
                <input type="text" value="<?= $libro['anno_pubblicazione'] ?>" class="form-control" id="anno_pubblicazione" placeholder="Anno di pubblicazione..." name="anno_pubblicazione">
            </div>
            <div class="mb-3">
                <label for="genere" class="form-label">Genere</label>
                <input type="text" value="<?= $libro['genere'] ?>" class="form-control" id="genere" placeholder="Genere..." name="genere">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image URL</label>
                <input type="file" value="<?= $libro['image'] ?>" class="form-control" id="image" placeholder="Enter the URL of the image" name="image">
            </div>
            <button type="submit" class="btn btn-dark">Update</button>
        </form>
    </div>
<?php include_once('footer.php'); ?>
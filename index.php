<?php 
    require_once 'config.php';
    
    include_once('function.php');
    include_once("header.php");
    include_once('navbar.php');

    $contacts = getAllLibro($mysqli);
    
    
?>

<div class="container my-3">
    <h1 class="text-center">Lista libri</h1>
    <div class="my-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Autore</th>
                    <th scope="col">Anno pubblicazione</th>
                    <th scope="col">genere</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if($contacts){
                foreach ($contacts as $key => $contact) { 
                ?>
                    <tr>
                            <th scope="row"><?= $key+1 ?></th>
                            <!-- Assicurati che il percorso dell'immagine sia racchiuso tra virgolette -->
                            <td><img src="<?= $contact['image'] ?>" width="50" ></td>
                            <td><?= $contact['titolo'] ?></td>
                            <td><?= $contact['autore'] ?></td>
                            <td><?= $contact['anno_pubblicazione'] ?></td>
                            <td><?= $contact['genere'] ?></td>
                            <td>
                                <a class="btn btn-danger" href="controller.php?action=delete&id=<?= $contact['id'] ?>" role="button">X</a>
                                <a class="btn btn-warning" href="update.php?id=<?= $contact['id'] ?>" role="button">M</a>
                            </td>
                        </tr>
                <?php } }?>
            </tbody>
        </table>
    </div>
</div>

<?php
    include_once('footer.php');
?>
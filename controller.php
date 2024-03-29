<?php
    require_once 'config.php';
    include_once 'function.php';

    
    $target_dir = "uploads/";
    $image = $target_dir.'copertina_senza_nome.png';

    // Gestione del caricamento dell'immagine
    if (!empty($_FILES['image'])) {
        if ($_FILES['image']["type"] === 'image/png' || $_FILES['image']["type"] === 'image/jpeg') {
            if ($_FILES['image']["size"] < 4000000) { // 4MB limite di dimensione
                if(is_uploaded_file($_FILES['image']["tmp_name"]) && $_FILES['image']["error"] === UPLOAD_ERR_OK) {
                    $imageFileName = $_POST['titolo'] . '-' . $_POST['autore'] . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION); //funziona quando non scrivo niente dentro le quadre dopo $_REQUEST
                    if(move_uploaded_file($_FILES['image']["tmp_name"], $target_dir . $imageFileName)) {
                        $image = $target_dir . $imageFileName;
                        echo 'Caricamento avvenuto con successo';
                    } else {
                        echo 'Errore durante il caricamento dell\'immagine';
                    }
                }
            } else {
                echo 'Dimensione del file troppo grande';
            }
        } else {
            echo 'Tipo di file non supportato';
        }
    } 

    if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'delete') {
        removeLibro($mysqli, $_REQUEST['id']);
        exit(header('Location: http://localhost/Progetto-settimana-1-Back-end/index.php'));
    } else if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'update'){
        // fare i controlli di validazione dei campi
        $titolo = htmlspecialchars($_REQUEST['titolo']) > 2 ? htmlspecialchars($_REQUEST['titolo']) : exit();
        $autore = htmlspecialchars($_REQUEST['autore']) > 2 ? htmlspecialchars($_REQUEST['autore']) : exit();
        $anno_pubblicazione = htmlspecialchars($_REQUEST['anno_pubblicazione']) > 2 ? htmlspecialchars($_REQUEST['anno_pubblicazione']) : exit();
        $genere = htmlspecialchars($_REQUEST['genere']) > 2 ? htmlspecialchars($_REQUEST['genere']) : exit();
    
        // Qui stai passando $image come parte dell'aggiornamento del libro
        updateLibro($mysqli, $_REQUEST['id'], $titolo, $autore, $anno_pubblicazione, $genere, $image);
        exit(header('Location: http://localhost/Progetto-settimana-1-Back-end/index.php'));
    } else {

        $titolo = htmlspecialchars($_REQUEST['titolo'])> 2 ? htmlspecialchars($_REQUEST['titolo']) : exit();
        $autore = htmlspecialchars($_REQUEST['autore']) > 2 ? htmlspecialchars($_REQUEST['autore']) : exit();
        $anno_pubblicazione = htmlspecialchars($_REQUEST['anno_pubblicazione']) > 2 ? htmlspecialchars($_REQUEST['anno_pubblicazione']) : exit();
        $genere = htmlspecialchars($_REQUEST['genere']) > 2 ? htmlspecialchars($_REQUEST['genere']) : exit();


            createLibro($mysqli, $titolo, $autore, $anno_pubblicazione, $genere, $image);
    }
    exit(header('Location: http://localhost/Progetto-settimana-1-Back-end/index.php'));

?>

<?php
    function getAllLibro($mysqli)
    {
        $result = [];
        $sql = "SELECT * FROM libri;";
        $res = $mysqli->query($sql); // return un mysqli result
        if ($res) { // Controllo se ci sono dei dati nella variabile $res
            while ($row = $res->fetch_assoc()) { // Trasformo $res in un array associativo
                $result[] = $row; // estraggo ogni singola riga che leggo dal DB e la inserisco in un array
                //array_push($contacts, $row); // estraggo ogni singola riga che leggo dal DB e la inserisco in un array
            }
        }
        return $result;
    }  

    function removeLibro($mysqli, $id) {
        if(!$mysqli->query('DELETE FROM libri WHERE id = ' . $id)) { echo($mysqli->connect_error); }
        else { echo 'Record eliminato con successo!!!';}
    }
    
    function createLibro($mysqli, $titolo, $autore, $anno_pubblicazione, $genere, $image)
{
    $sql = "INSERT INTO libri (titolo, autore, anno_pubblicazione, genere, image) 
                VALUES ('$titolo', '$autore', '$anno_pubblicazione', '$genere', '$image');";
    if (!$mysqli->query($sql)) {
        echo ($mysqli->connect_error);
    } else {
        echo 'Record aggiunto con successo!!!';
    }
}
    
    function updateLibro($mysqli, $id, $titolo, $autore, $anno_pubblicazione, $genere, $image) {
        $sql = "UPDATE libri SET 
                            titolo = '" . $titolo . "', 
                            autore = '" . $autore. "', 
                            anno_pubblicazione = '" . $anno_pubblicazione. "', 
                            genere = '" . $genere. "',
                            image = '" . $image . "' 
                            WHERE id = " . $id;
            if(!$mysqli->query($sql)) { echo($mysqli->connect_error); }
            else { echo 'Record aggiornato con successo!!!';}
    }

    
    
?>
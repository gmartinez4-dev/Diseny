<?php

try {
    // Creem la connexió amb PDO
    $connexio = new PDO(
        'mysql:host=localhost;dbname=Pagina_MotoGP',
        'root',
        ''
    );

    // Configurem PDO perquè mostri els errors
    $connexio->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {
    // Si falla la connexió, aturem l'aplicació
    die("Error de connexió: " . $e->getMessage());
}

?>
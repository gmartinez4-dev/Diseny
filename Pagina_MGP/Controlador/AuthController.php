
<?php

session_start();

// Incloem la connexió i el model
require_once __DIR__ . '/../Config/conexio.php';
require_once __DIR__ . '/../Model/UserModel.php';

$model = new UserModel($connexio);

// Comprovem que la petició sigui POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../Index.html");
    exit;
}

$accio = $_POST['accio'] ?? '';

// REGISTRE
if ($accio === 'registre') {

    $usuari = trim($_POST['usuari'] ?? '');
    $correu = trim($_POST['correu'] ?? '');
    $contrasenya = $_POST['contrasenya'] ?? '';
    $data = $_POST['data-naixement'] ?? '';

    // Comprovem que els camps no estiguin buits
    if ($usuari === '' || $correu === '' ||
        $contrasenya === '' || $data === '') {
        die("Tots els camps són obligatoris.");
    }

    // Validem la longitud del nom d'usuari
    if (strlen($usuari) < 3 || strlen($usuari) > 30) {
        die("El nom d'usuari ha de tenir entre 3 i 30 caràcters.");
    }

    // Validem el format de la contrasenya
    $patro = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^a-zA-Z0-9]).{8,}$/';

    if (!preg_match($patro, $contrasenya)) {
        die("La contrasenya ha de tenir 8 caràcters com a mínim, una majúscula, una minúscula, un número i un símbol.");
    }

    // Validem el correu electrònic
    if (!filter_var($correu, FILTER_VALIDATE_EMAIL)) {
        die("El correu electrònic no és vàlid.");
    }

    // Comprovem si l'usuari ja existeix
    if ($model->existeixUsuari($usuari, $correu)) {
        die("Aquest nom d'usuari o correu ja està registrat.");
    }

    // Encriptem la contrasenya
    $hash = password_hash($contrasenya, PASSWORD_DEFAULT);

    // Guardem l'usuari
    try {
        $model->registrarUsuari($usuari, $correu, $hash, $data);

        // Creem la sessió de l'usuari
        session_regenerate_id(true);

        $_SESSION['user_id'] = $connexio->lastInsertId();
        $_SESSION['usuari'] = $usuari;

        // Redirigim a la pàgina principal registrada
        header("Location: ../Html_Si/Principal_Registrat.php");
        exit;

    } catch (PDOException $e) {
        die("No s'ha pogut completar el registre.");
    }
}

// INICI DE SESSIÓ
if ($accio === 'login') {

    $usuari = trim($_POST['usuari'] ?? '');
    $contrasenya = $_POST['contrasenya'] ?? '';

    if ($usuari === '' || $contrasenya === '') {
        die("Has d'omplir tots els camps.");
    }

    $dadesUsuari = $model->obtenirUsuari($usuari);

    if ($dadesUsuari &&
        password_verify($contrasenya, $dadesUsuari['contrasenya'])) {

        session_regenerate_id(true);

        $_SESSION['user_id'] = $dadesUsuari['id'];
        $_SESSION['usuari'] = $dadesUsuari['usuari'];

        header("Location: ../Html_Si/Principal_Registrat.php");
        exit;

    } else {
        die("El nom d'usuari o la contrasenya són incorrectes.");
    }
}

// Si l'acció no és vàlida
header("Location: ../Index.html");
exit;

?>

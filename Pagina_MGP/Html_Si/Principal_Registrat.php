
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../Html_No/Login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fan zone MotoGP">
    <title>MotoGP | Fans</title>
    <link rel="stylesheet" href="../Css/Styles.css">
</head>

<body>
    <a href="#contenido" class="saltar-contenido">
        Salta al contingut principal
    </a>

    <header class="capçelera">
        <img class="logo" src="../Img/Logotipo-MotoGP-de-velocidad-y-color.webp" alt="Logo MotoGP">

        <nav class="menu" aria-label="Navegació principal">
            <a href="./Principal_Registrat.php">Inici</a>
            <a href="./Fans-Zone.html">Fans Zone</a>
            <a href="./Historial.html">Historial de campions</a>
            <a href="./Circuits.html">Circuits</a>
            <a href="./Pilots.html">Pilots</a>
        </nav>

        <div class="acces">
            <span>
                Benvingut, <?= htmlspecialchars($_SESSION['usuari'], ENT_QUOTES, 'UTF-8') ?>
            </span>

            <a class="signup" href="../Controlador/LogoutController.php">
                Tancar sessió
            </a>
        </div>
    </header>

    <main id="contenido" class="contenido-principal" tabindex="-1">

        <section class="banner">

            <img src="../Img/Adelantamiento-MotoGP-a-toda-velocidad.webp" alt="Imagen principal de MotoGP">

            <div class="banner-contenido">

                <h1 class="banner-titulo">
                    <span>Bienvenido a la zona de fans de MotoGP</span>
                </h1>

                <a href="./Clasificació_carrera.html" class="banner-boton">
                    Descubre la clasificación del munial de MotoGP
                </a>

            </div>

        </section>

    </main>

    <nav class="menu-secundari" aria-label="Seccions destacades">

        <a href="./Calendari.html">
            <div>
                <h2>Calendari</h2>
                <p>Consulta el calendari de carreras</p>
            </div>
        </a>

        <a href="./Equips.html">
            <div>
                <h2>Equips</h2>
                <p>Consulta la información de los equipos de MotoGP</p>
            </div>
        </a>

        <a href="./Clasificació_carrera.html">
            <div>
                <h2>Clasificació Ultim Gran Premi</h2>
                <p>Consulta la clasificació del últim Gran Premi</p>
            </div>
        </a>

        <a href="./Noticias.html">
            <div>
                <h2>Noticies</h2>
                <p>Descubreix les últimes notícies del món de MotoGP</p>
            </div>
        </a>

    </nav>

    <section class="proxima-carrera">

        <h2 class="proxima-carrera-titulo">
            Pròxima Carrera
        </h2>

        <div class="targeta-carrera">

            <div class="foto-circuit">
                <img src="../Img/Australian-Motorcycle-Grand-Prix.webp" alt="Fotografía del circuito">
            </div>

            <div class="info-circuit">

                <h3 class="nom-circuit">
                    Australian Motorcycle Grand Prix
                </h3>

                <p class="dades-circuit">
                    25 de Octubre de 2026, 27 voltes, 4.448 km, 12 curvas
                </p>

            </div>

        </div>

    </section>

    <footer class="peu-pagina">

        <div class="peu-contingut">
            <h2>MotoGP Fans</h2>

            <nav aria-label="Enllaços del peu de pàgina">
                <a href="./Principal_Registrat.php">Inici</a>
                <a href="./Noticias.html">Notícies</a>
                <a href="./Equips.html">Equips</a>
                <a href="./Pilots.html">Pilots</a>
            </nav>
        </div>

        <p class="copyright">
            © 2026 MotoGP Fans - Tots els drets reservats
        </p>

    </footer>

</body>
</html>

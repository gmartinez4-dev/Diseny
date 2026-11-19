
<?php

class UserModel {

    private $connexio;

    public function __construct($connexio) {
        $this->connexio = $connexio;
    }

    // Comprovar si existeix l'usuari o el correu
    public function existeixUsuari($usuari, $correu) {

        $sql = "SELECT id FROM usuaris
                WHERE usuari = :usuari OR correu = :correu";

        $consulta = $this->connexio->prepare($sql);
        $consulta->execute([
            ':usuari' => $usuari,
            ':correu' => $correu
        ]);

        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    // Registrar un usuari
    public function registrarUsuari($usuari, $correu, $contrasenya, $data) {

        $sql = "INSERT INTO usuaris
                (usuari, correu, contrasenya, data_naixement)
                VALUES (:usuari, :correu, :contrasenya, :data)";

        $consulta = $this->connexio->prepare($sql);

        return $consulta->execute([
            ':usuari' => $usuari,
            ':correu' => $correu,
            ':contrasenya' => $contrasenya,
            ':data' => $data
        ]);
    }

    // Buscar usuari per nom
    public function obtenirUsuari($usuari) {

        $sql = "SELECT * FROM usuaris WHERE usuari = :usuari";

        $consulta = $this->connexio->prepare($sql);
        $consulta->execute([':usuari' => $usuari]);

        return $consulta->fetch(PDO::FETCH_ASSOC);
    }
}

?>

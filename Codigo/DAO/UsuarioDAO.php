<?

require_once "../lib/Conection.php";
require_once "../model/Usuario.class.php";

class UsuarioDAO {

    private $con;

    public function UsuarioDAO() {
        $this->con = new Conection();
        //Função para aparecer os erros e warnings
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}



?>
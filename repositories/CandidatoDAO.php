<?php 
    require_once __DIR__ . "../utils/conexao.php";
    require_once __DIR__ . "../models/Candidato.php";


  class CandidatoDAO {

    private PDO $pdo;

    public function __construct() {
        try {


            $this->pdo = Conexao::fazerConexao();

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, true);

        } catch(PDOException $e) {
            echo("Erro ao conectar a partir de Candidato DAO: " . $e->getMessage());
        }
    }
    
    public function registrarCandidato(Candidato $candidato) {
        
        try{

            $sql = "INSERT INTO candidato (
           funcionario_FK,
           foto_candidato,
           numero_candidato,
           cargo_candidato,
           data_registro_candidato,
           eleicao_FK,
           status_candidato_ata,
           quantidade_voto_candidato
           ) VALUES (
           :funcionario_FK,
           :foto_candidato,
           :numero_candidato,
           :cargo_candidato,
           :data_registro_candidato,
           :eleicao_FK,
           :status_candidato_ata,
           :quantidade_voto_candidato
           )";

           $stmt = $this->pdo->prepare($sql);

            $stmt->bindValue(":funcionario_FK", $candidato->getFuncionario_FK(), PDO::PARAM_INT);
            $stmt->bindValue(":foto_candidato", $candidato->getFoto_candidato(), PDO::PARAM_STR);
            $stmt->bindValue(":numero_candidato", $candidato->getNumero_candidato(), PDO::PARAM_STR);
            $stmt->bindValue(":cargo_candidato", $candidato->getCargo_candidato(), PDO::PARAM_STR);
            $stmt->bindValue(":data_registro_candidato", $candidato->getData_registro_candidato());
            $stmt->bindValue(":eleicao_FK", $candidato->getEleicao_FK(), PDO::PARAM_INT);
            $stmt->bindValue(":status_candidato_ata", $candidato->getStatus_candidato_ata(), PDO::PARAM_INT);
            $stmt->bindValue(":quantidade_voto_candidato", $candidato->getQuantidade_voto_candidato(), PDO::PARAM_INT);
        
        } catch (PDOException $e) {
            echo("Erro em Funcionario DAO: " . $e->getMessage());
            return false;
        } 
    }

    public function getAllCandidatos(): array {
    try {
        $sql = "SELECT * FROM candidato ORDER BY nome_funcionario, sobrenome_funcionario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $candidato = [];
        

        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $canditados[] = $data; 
        }

        return $canditados;

        } catch (PDOException $e) {
        
            error_log("Erro em Candidato DAO (getAllCandidatos): " . $e->getMessage());
            return [];
        }   
    }


  }
?>
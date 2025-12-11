<?php
    require_once __DIR__ . "/../repositories/CandidatoDAO.php";
    require_once __DIR__ . "/../models/Candidato.php";

    class CandidatoController {
        private CandidatoDAO $dao;
        public function __construct(){
            $this->dao = new CandidatoDAO();
        }

        public function create(string $method): string {

            if($method === "GET"){

                require __DIR__ . "/../views/CadastroCandidato.php";
                return "";
                

            }

            if($method === "POST") {

                //require __DIR__ . "/../views/cadastroFuncionarios.php";

                $funcionario = new Candidato(

                    0,
                    htmlspecialchars($_POST["nome_Candidato"]),
                    htmlspecialchars($_POST["Matricula_Candidato"]),
                    htmlspecialchars($_POST["Setor_Candidato"]),    
                    htmlspecialchars($_POST["Foto_candidato"]),
                    htmlspecialchars($_POST["Numero_candidato"]),
                    htmlspecialchars($_POST["Data_registro"]),
                    htmlspecialchars($_POST["matricula_funcionario"]),
                    htmlspecialchars($_POST["Data_registro"]),
                    htmlspecialchars($_POST["ADM_funcionario"])
                    htmlspecialchars($_POST["Eleição_vinculada"]),
                    htmlspecialchars($_POST["Cargo_pretendido"])                

                );

                $response = $this->dao->registrarCandidato($candidato);
                if ($response) {   
                    /*(Código para quando clicaar no botão criar ir para a pagina de listagem)  - >  header('Location: index.php?view=ListaFuncionarios');
                    exit;*/           
                    return true;
                    
                }
                return false;

            }

        }

        public function list(string $method): array {
            if ($method === "GET") {
        
                // 1. Busca os dados
                $funcionarios = $this->dao->listaCandidato();
                //echo("List: " . "<br>");
                //var_dump($funcionarios);
                return $funcionarios;
                
            }
            return "Método não suportado.";
        }



    }
?>
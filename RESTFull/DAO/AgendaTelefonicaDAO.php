<?php

include 'config/db.php';

class AgendaTelefonicaDAO extends DB{

    /**
     * LISTAR TODOS OS REGISTROS
     */
    public function getListarContatos(){
        $sql = "
                SELECT 
                    id,
                    nome,
                    telefone,
                    celular
                FROM 
                    tb_agenda_telefonica 
                ORDER BY 
                    id DESC 
        ";
        $query = DB::Executar($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * INSERIR UM REGISTRO
     */
    public function inserir($arrContato){
        
    	$sql = "
                INSERT INTO tb_agenda_telefonica ( 
                    nome, 
                    telefone, 
                    celular
                ) VALUES ( 
                    :nome,
                    :telefone, 
                    :celular
                )";

    	$query = DB::Executar($sql);
        $query->bindValue('nome',       $arrContato['nome']       );
        $query->bindValue('telefone',   $arrContato['telefone']   );
        $query->bindValue('celular',    $arrContato['celular']    );

    	return $query->execute();

	}

    /**
     * ATUALIZAR UM REGISTRO
     */
	public function atualizar($arrContato, $id){
		
        $sql = "
                UPDATE 
                    tb_agenda_telefonica 
                SET 
                    nome        = :nome, 
                    telefone    = :telefone, 
                    celular     = :celular
                WHERE 
                    id = :id ";
                
            
                $celular        = explode ('name', $arrContato);
                $celular3       = explode ('="celular"', $celular[2]);
                $celular4       = explode ('----------------------------', $celular3[1]);  

                $nome           = explode ('name', $arrContato);
                $nome3          = explode ('="nome"', $nome[1]);
                $nome4          = explode ('----------------------------', $nome3[1]);  

                $telefone       = explode ('name', $arrContato);
                $telefone3      = explode ('="telefone"', $telefone[3]);
                $telefone4      = explode ('----------------------------', $telefone3[1]);  

                $nome4[0]       = str_replace("\r\n", '', $nome4[0]);
                $telefone4[0]   = str_replace("\r\n", '', $telefone4[0]);
                $celular4[0]    = str_replace("\r\n", '', $celular4[0]);

                $query = DB::Executar($sql);
                $query->bindValue('id',         $id             );
                $query->bindValue('nome',       $nome4[0]       );
                $query->bindValue('telefone',   $telefone4[0]   );
                $query->bindValue('celular',    $celular4[0]    );
            

    
        return $query->execute();
	}

    /**
     * APAGAR UM REGISTRO
     */ 
	public function apagar($id){
		
        $sql =  "
                DELETE FROM tb_agenda_telefonica 
                WHERE id = :id" ;

		$query = DB::Executar($sql);
		$query->bindValue('id', $id);
		$query->execute();

        return true;
	}

    /**
     * METODO PARA RETORNAR UM CONTATO, PASSANDO O ID COMO PARAMETRO
     */
	public function getListarContatosPorId($id){

        $sql = "
                SELECT 
                    id,
                    nome,
                    telefone,
                    celular
                FROM 
                    tb_agenda_telefonica 
                WHERE 
                    id = :id
                ORDER BY 
                    id DESC ";

        $query = DB::Executar($sql);
        $query->bindValue('id', $id);
        $query->execute();

        return $query->fetchAll();
	}
}

?>
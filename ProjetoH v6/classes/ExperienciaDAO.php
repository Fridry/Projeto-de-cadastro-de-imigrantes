<?php

/**
 * Description of ExperienciaDAO
 *
 * @author fridr
 */
class ExperienciaDAO {
     function create(ExperienciaVO $exp, $conexao) {
        $inicio = $exp->getData_inicio();
        $termino = $exp->getData_termino();
        $empresa = $exp->getEmpresa();
        $pais = $exp->getPais();
        $funcoes = $exp->getFuncoes();
        $cargo = $exp->getCargo();
        $nome_referencia= $exp->getNome_referencia();
        $telefone_referencia = $exp->getTelefone_referencia();
        $id_pessoa = $exp->getId_pessoa();

        $sql = "INSERT INTO tbexperiencia (data_inicio, data_termino, empresa, pais, cargo, funcoes, nome_referencia, telefone_referencia, id_pessoa) VALUES ('$inicio', '$termino', '$empresa', '$pais', '$cargo', '$funcoes', '$nome_referencia', '$telefone_referencia', '$id_pessoa')";

        return mysqli_query($conexao, $sql);
    }

    function read($conexao, $id_exp) {
        $expVO = new ExperienciaVO();
        
        $return = array();

        $sql = "SELECT * FROM tbexperiencia WHERE id_pessoa = $id_exp";

        $resultado = mysqli_query($conexao, $sql);

        while ($row_exp = mysqli_fetch_array($resultado)) {
            $expVO->setId_experiencia($row_exp['id_experiencia']);
            $expVO->setData_inicio($row_exp['data_inicio']);
            $expVO->setData_termino($row_exp['data_termino']);
            $expVO->setEmpresa($row_exp['empresa']);
            $expVO->setPais($row_exp['pais']);
            $expVO->setFuncoes($row_exp['funcoes']);
            $expVO->setCargo($row_exp['cargo']);
            $expVO->setNome_referencia($row_exp['nome_referencia']);
            $expVO->setTelefone_referencia($row_exp['telefone_referencia']);
            $expVO->setId_pessoa($row_exp['id_pessoa']);

            $return[] = clone $expVO;
        }
        return $return;
    }

    function readAll($conexao) {
        $expVO = new ExperienciaVO();

        $return = array();

        $sql = "SELECT * FROM tbexperiencia";

        $resultado = mysqli_query($conexao, $sql);

        while ($row_exp = mysqli_fetch_array($resultado)) {
            $expVO->setId_experiencia($row_exp['id_experiencia']);
            $expVO->setData_inicio($row_exp['data_inicio']);
            $expVO->setData_termino($row_exp['data_termino']);
            $expVO->setEmpresa($row_exp['empresa']);
            $expVO->setPais($row_exp['pais']);
            $expVO->setFuncoes($row_exp['funcoes']);
            $expVO->setCargo($row_exp['cargo']);
            $expVO->setNome_referencia($row_exp['nome_referencia']);
            $expVO->setTelefone_referencia($row_exp['telefone_referencia']);
            $expVO->setId_pessoa($row_exp['id_pessoa']);

            $return[] = clone $expVO;
        }
        return $return;
    }

    function update(ExperienciaVO $exp, $conexao) {
        $id_experiencia = $exp->getId_experiencia();
        $inicio = $exp->getData_inicio();
        $termino = $exp->getData_termino();
        $empresa = $exp->getEmpresa();
        $pais = $exp->getPais();
        $funcoes = $exp->getFuncoes();
        $cargo = $exp->getCargo();
        $nome_referencia= $exp->getNome_referencia();
        $telefone_referencia = $exp->getTelefone_referencia();
        $id_pessoa = $exp->getId_pessoa();

        $sql = "UPDATE tbexperiencia SET data_inicio = '$inicio', data_termino = '$termino', empresa = '$empresa', pais = '$pais', cargo = '$cargo', funcoes = '$funcoes', nome_referencia = '$nome_referencia', telefone_referencia = '$telefone_referencia' WHERE id_experiencia = '$id_experiencia' AND id_pessoa = '$id_pessoa'";

        return mysqli_query($conexao, $sql);
    }

    function delete(ExperienciaVO $exp, $conexao) {
        $id_exp = $exp->getId_experiencia();

        $sql = "DELETE FROM tbexperiencia WHERE id_experiencia = $id_exp";

        return mysqli_query($conexao, $sql);
    }

    public function getIdBanco($conexao) {
        return mysqli_insert_id($conexao);
    }

}

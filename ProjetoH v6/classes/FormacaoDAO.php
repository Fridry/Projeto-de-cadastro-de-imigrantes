<?php

/**
 * Description of FormacaoDAO
 *
 * @author fridr
 */
class FormacaoDAO {
    function create(FormacaoVO $form, $conexao) {
        $profissao = $form->getProfissao();
        $descricao = $form->getDescricao();
        $escolaridade = $form->getEscolaridade();
        $ano_formacao = $form->getAno_formacao();
        $instituicao = $form->getInsituicao();
        $cidade = $form->getCidade();
        $pais = $form->getPais();
        $id_pessoa = $form->getId_pessoa();
        
        $sql = "INSERT INTO tbformacao (profissao, descricao, escolaridade, ano_formacao, instituicao, cidade, pais, id_pessoa) VALUES ('$profissao', '$descricao', '$escolaridade', '$ano_formacao', '$instituicao', '$cidade', '$pais', '$id_pessoa')";

        return mysqli_query($conexao, $sql);
    }

    function read($conexao, $id_form) {
        $formVO = new FormacaoVO();

        $sql = "SELECT * FROM tbformacao WHERE id_pessoa = $id_form";

        $resultado = mysqli_query($conexao, $sql);

        while ($row_exp = mysqli_fetch_array($resultado)) {
            $formVO->setId_formacao($row_exp['id_formacao']);
            $formVO->setProfissao($row_exp['profissao']);
            $formVO->setDescricao($row_exp['descricao']);
            $formVO->setEscolaridade($row_exp['escolaridade']);
            $formVO->setAno_formacao($row_exp['ano_formacao']);
            $formVO->setInsituicao($row_exp['instituicao']);
            $formVO->setCidade($row_exp['cidade']);
            $formVO->setPais($row_exp['pais']);
            $formVO->setId_pessoa($row_exp['id_pessoa']);

            $return = clone $formVO;
        }
        
        return $return;
    }

    function readAll($conexao) {
        $formVO = new FormacaoVO();

        $return = array();

        $sql = "SELECT * FROM tbformacao";

        $resultado = mysqli_query($conexao, $sql);

        while ($row_exp = mysqli_fetch_array($resultado)) {
            $formVO->setId_formacao($row_exp['id_formacao']);
            $formVO->setProfissao($row_exp['profissao']);
            $formVO->setDescricao($row_exp['descricao']);
            $formVO->setEscolaridade($row_exp['escolaridade']);
            $formVO->setAno_formacao($row_exp['ano_formacao']);
            $formVO->setInsituicao($row_exp['instituicao']);
            $formVO->setCidade($row_exp['cidade']);
            $formVO->setPais($row_exp['pais']);
            $formVO->setId_pessoa($row_exp['id_pessoa']);

            $return[] = clone $formVO;
        }
        return $return;
    }

    function update(FormacaoVO $form, $conexao) {
        $id_formacao = $form->getId_formacao();
        $profissao = $form->getProfissao();
        $descricao = $form->getDescricao();
        $escolaridade = $form->getEscolaridade();
        $ano_formacao = $form->getAno_formacao();
        $instituicao = $form->getInsituicao();
        $cidade = $form->getCidade();
        $pais = $form->getPais();
        $id_pessoa = $form->getId_pessoa();

        $sql = "UPDATE tbformacao SET profissao = '$profissao', descricao = '$descricao', escolaridade = '$escolaridade', ano_formacao = '$ano_formacao', instituicao = '$instituicao', cidade = '$cidade', pais = '$pais' WHERE id_pessoa = '$id_pessoa'";

        return mysqli_query($conexao, $sql);
    }

    function delete(FormacaoVO $form, $conexao) {
        $id_form = $form->getId_formacao();

        $sql = "DELETE FROM tbformacao WHERE id_formacao = $id_form";

        return mysqli_query($conexao, $sql);
    }

    public function getIdBanco($conexao) {
        return mysqli_insert_id($conexao);
    }
}

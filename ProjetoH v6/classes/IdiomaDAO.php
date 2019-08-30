<?php

/**
 * Description of IdiomaDAO
 *
 * @author fridr
 */
class IdiomaDAO {
    
    function create(IdiomaVO $idioma, $conexao) {
        $lingua = $idioma->getIdioma();
        $fluencia = $idioma->getFluencia();
        $id_pessoa = $idioma->getId_pessoa();

        $sql = "INSERT INTO tbidioma (idioma, fluencia, id_pessoa) VALUES ('$lingua', '$fluencia', '$id_pessoa')";
        
        return mysqli_query($conexao, $sql);
    }

    function read($conexao, $id) {
        $idiomaVO = new IdiomaVO();
        
        $return = array();

        $sql = "SELECT * FROM tbidioma WHERE id_pessoa = $id";

        $resultado = mysqli_query($conexao, $sql);

        while ($row_idioma = mysqli_fetch_array($resultado)) {
            $idiomaVO->setId_idioma($row_idioma['id_idioma']);
            $idiomaVO->setIdioma($row_idioma['idioma']);
            $idiomaVO->setFluencia($row_idioma['fluencia']);
            $idiomaVO->setId_pessoa($row_idioma['id_pessoa']);

            $return[] = clone $idiomaVO;
        }
        return $return;
    }

    function readAll($conexao) {
        $idiomaVO = new IdiomaVO();

        $return = array();

        $sql = "SELECT * FROM tbidioma";

        $resultado = mysqli_query($conexao, $sql);

        while ($row_idioma = mysqli_fetch_array($resultado)) {
            $idiomaVO->setId_idioma($row_idioma['id_idioma']);
            $idiomaVO->setIdioma($row_idioma['idioma']);
            $idiomaVO->setFluencia($row_idioma['fluencia']);
            $idiomaVO->setId_pessoa($row_idioma['id_pessoa']);

            $return[] = clone $idiomaVO;
        }
        return $return;
    }

    function update(IdiomaVO $idioma, $conexao) {
        $id_idioma = $idioma->getId_idioma();
        $lingua = $idioma->getIdioma();
        $fluencia = $idioma->getFluencia();

        $sql = "UPDATE tbidioma SET idioma = '$lingua', fluencia = '$fluencia' WHERE id_idioma = '$id_idioma'";


        return mysqli_query($conexao, $sql);
    }

    function delete(IdiomaVO $idioma, $conexao) {
        $id_idioma = $idioma->getId_idioma();

        $sql = "DELETE FROM tbidioma WHERE id_idioma = $id_idioma";

        return mysqli_query($conexao, $sql);
    }

    public function getIdBanco($conexao) {
        return mysqli_insert_id($conexao);
    }
}

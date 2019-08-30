<?php

class FamiliaDAO {
    function create(FamiliaVO $familia, $conexao) {
        $parentesco = $familia->getParentesco();
        $data_nasc_familia = $familia->getData_nasc_familiar();
        $mora_junto = $familia->getMora_junto();
        $id_pessoa = $familia->getId_pessoa();

        $sql = "INSERT INTO tbfamilia (parentesco, data_nasc_familia, mora_junto, id_pessoa) VALUES ('$parentesco', '$data_nasc_familia', '$mora_junto', '$id_pessoa')";

        return mysqli_query($conexao, $sql);
    }

    function read($conexao, $id) {
        $familiaVO = new FamiliaVO();
        
        $return = array();

        $sql = "SELECT * FROM tbfamilia WHERE id_pessoa = $id";

        $resultado = mysqli_query($conexao, $sql);

        while ($row_familia = mysqli_fetch_array($resultado)) {
            $familiaVO->setId_familia($row_familia['id_familia']);
            $familiaVO->setParentesco($row_familia['parentesco']);
            $familiaVO->setData_nasc_familiar($row_familia['data_nasc_familia']);
            $familiaVO->setMora_junto($row_familia['mora_junto']);
            $familiaVO->setId_pessoa($row_familia['id_pessoa']);

            $return[] = clone $familiaVO;
        }
        return $return;
    }

    function readAll($conexao) {
        $familiaVO = new FamiliaVO();

        $return = array();

        $sql = "SELECT * FROM tbfamilia";

        $resultado = mysqli_query($conexao, $sql);

        while ($row_familia = mysqli_fetch_array($resultado)) {
            $familiaVO->setId_familia($row_familia['id_familia']);
            $familiaVO->setParentesco($row_familia['parentesco']);
            $familiaVO->setData_nasc_familiar($row_familia['data_nasc_familia']);
            $familiaVO->setMora_junto($row_familia['mora_junto']);
            $familiaVO->setId_pessoa($row_familia['id_pessoa']);

            $return[] = clone $familiaVO;
        }
        return $return;
    }

    function update(FamiliaVO $familia, $conexao) {
        $id_familia = $familia->getId_familia();
        $parentesco = $familia->getParentesco();
        $data_nasc_familia = $familia->getData_nasc_familiar();
        $mora_junto = $familia->getMora_junto();
        $id_pessoa = $familia->getId_pessoa();

        $sql = "UPDATE tbfamilia SET parentesco = '$parentesco', data_nasc_familia = '$data_nasc_familia', mora_junto = '$mora_junto' WHERE id_familia = '$id_familia' AND id_pessoa = '$id_pessoa'";

        return mysqli_query($conexao, $sql);
    }

    function delete(FamiliaVO $familia, $conexao) {
        $id_familia = $familia->getId_idioma();

        $sql = "DELETE FROM tbfamilia WHERE id_idioma = $id_familia";

        return mysqli_query($conexao, $sql);
    }

    public function getIdBanco($conexao) {
        return mysqli_insert_id($conexao);
    }
}

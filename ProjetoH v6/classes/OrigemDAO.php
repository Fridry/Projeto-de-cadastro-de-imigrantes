<?php

/**
 * Description of OrigemDAO
 *
 * @author fridr
 */
class OrigemDAO {
    function create(OrigemVO $origem, $conexao) {
        $local = $origem->getOrigem();

        $sql = "INSERT INTO tborigem (origem) VALUES ('$local')";

        return mysqli_query($conexao, $sql);
    }

    function read($conexao, $id_origem) {
        $OrigemVO = new OrigemVO();

        $sql = "SELECT * FROM tborigem WHERE id_origem = $id_origem";

        $resultado = mysqli_query($conexao, $sql);

        while ($row_origem = mysqli_fetch_array($resultado)) {
            $OrigemVO->setId_origem($row_origem['id_origem']);
            $OrigemVO->setPais($row_origem['pais']);

            $return = clone $OrigemVO;
        }
        return $return;
    }

    function readAll($conexao) {
        $OrigemVO = new OrigemVO();

        $return = array();

        $sql = "SELECT * FROM tborigem";

        $resultado = mysqli_query($conexao, $sql);

        while ($row_origem = mysqli_fetch_array($resultado)) {
            $OrigemVO->setId_origem($row_origem['id_origem']);
            $OrigemVO->setPais($row_origem['pais']);

            $return[] = clone $OrigemVO;
        }
        return $return;
    }

    function update(OrigemVO $origem, $conexao) {
        $id_origem = $origem->getId_origem();
        $local = $origem->getOrigem();

        $sql = "UPDATE tborigem SET origem = '$local' WHERE id_origem = '$id_origem'";


        return mysqli_query($conexao, $sql);
    }

    function delete(OrigemVO $origem, $conexao) {
        $id_origem = $origem->getId_origem();

        $sql = "DELETE FROM tborigem WHERE id_origem = $id_origem";

        return mysqli_query($conexao, $sql);
    }

    public function getIdBanco($conexao) {
        return mysqli_insert_id($conexao);
    }
}

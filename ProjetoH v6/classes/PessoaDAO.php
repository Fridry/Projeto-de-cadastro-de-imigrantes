<?php

/**
 * Description of PessoaDAO
 *
 * @author fridr
 */
class PessoaDAO {

    function create(PessoaVO $pessoa, $conexao) {
        $nome = $pessoa->getNome();
        $data_nasc = $pessoa->getData_nasc();
        $sexo = $pessoa->getSexo();
        $estado_civil = $pessoa->getEstado_civil();
        $data_entrada_brasil = $pessoa->getData_entrada_brasil();
        $id_pessoa_contato = $pessoa->getId_contato();
        $id_pessoa_origem = $pessoa->getId_origem();

        $sql = "INSERT INTO tbpessoa (nome, data_nasc, sexo, estado_civil, data_entrada_brasil, id_contato, id_origem, criado_em) VALUES ('$nome', '$data_nasc', '$sexo', '$estado_civil', '$data_entrada_brasil', '$id_pessoa_contato', '$id_pessoa_origem', NOW())";

        return mysqli_query($conexao, $sql);
    }

    function read($conexao, $id_pessoa) {
        $pessoaVO = new PessoaVO();

        $sql = "SELECT * FROM tbpessoa WHERE id_pessoa = $id_pessoa";

        $resultado = mysqli_query($conexao, $sql);

        while ($row_pessoa = mysqli_fetch_array($resultado)) {
            $pessoaVO->setId_pessoa($row_pessoa['id_pessoa']);
            $pessoaVO->setNome($row_pessoa['nome']);
            $pessoaVO->setData_nasc($row_pessoa['data_nasc']);
            $pessoaVO->setSexo($row_pessoa['sexo']);
            $pessoaVO->setEstado_civil($row_pessoa['estado_civil']);
            $pessoaVO->setData_entrada_brasil($row_pessoa['data_entrada_brasil']);
            $pessoaVO->setId_contato($row_pessoa['id_contato']);
            $pessoaVO->setId_origem($row_pessoa['id_origem']);

            $return = clone $pessoaVO;
        }
        return $return;
    }

    function readAll($conexao) {
        $pessoaVO = new PessoaVO();

        $return = array();

        $sql = "SELECT * FROM tbpessoa";

        $resultado = mysqli_query($conexao, $sql);

        while ($row_pessoa = mysqli_fetch_array($resultado)) {
            $pessoaVO->setId_pessoa($row_pessoa['id_pessoa']);
            $pessoaVO->setNome($row_pessoa['nome']);
            $pessoaVO->setData_nasc($row_pessoa['data_nasc']);
            $pessoaVO->setSexo($row_pessoa['sexo']);
            $pessoaVO->setEstado_civil($row_pessoa['estado_civil']);
            $pessoaVO->setData_entrada_brasil($row_pessoa['data_entrada_brasil']);
            $pessoaVO->setId_contato($row_pessoa['id_contato']);
            $pessoaVO->setId_origem($row_pessoa['id_origem']);

            $return[] = clone $pessoaVO;
        }

        return $return;
    }

    function update(PessoaVO $pessoa, $conexao) {
        $id_pessoa = $pessoa->getId_pessoa();
        $nome = $pessoa->getNome();
        $data_nasc = $pessoa->getData_nasc();
        $sexo = $pessoa->getSexo();
        $estado_civil = $pessoa->getEstado_civil();
        $data_entrada_brasil = $pessoa->getData_entrada_brasil();

        $sql = "UPDATE tbpessoa SET nome = '$nome', data_nasc = '$data_nasc', sexo = '$sexo', estado_civil = '$estado_civil', data_entrada_brasil = '$data_entrada_brasil', modificado_em = NOW() WHERE id_pessoa = '$id_pessoa'";

        return mysqli_query($conexao, $sql);
    }

    function delete(PessoaVO $pessoa, $conexao) {
        $id_pessoa = $pessoa->getId_pessoa();

        $sql = "DELETE FROM tbpessoa WHERE id_pessoa = $id_pessoa";

        return mysqli_query($conexao, $sql);
    }

    function numRegistros($conexao) {
        $sql = "SELECT * FROM tbpessoa";

        $resultado = mysqli_query($conexao, $sql);

        $total_registros = mysqli_num_rows($resultado);

        return $total_registros;
    }

    function numRegistrosLike($conexao, $criterio) {
        $sql = "SELECT * FROM tbpessoa WHERE nome LIKE '%$criterio%'";

        $resultado = mysqli_query($conexao, $sql);

        $total_registros = mysqli_num_rows($resultado);

        return $total_registros;
    }

    function paginacao($conexao, $inicio, $qntd_pag) {
        $pessoaVO = new PessoaVO();

        $return = array();

        $sql = "SELECT * FROM tbpessoa LIMIT $inicio, $qntd_pag";

        $resultado = mysqli_query($conexao, $sql);

        while ($row_pessoa = mysqli_fetch_array($resultado)) {
            $pessoaVO->setId_pessoa($row_pessoa['id_pessoa']);
            $pessoaVO->setNome($row_pessoa['nome']);
            $pessoaVO->setData_nasc($row_pessoa['data_nasc']);
            $pessoaVO->setSexo($row_pessoa['sexo']);
            $pessoaVO->setEstado_civil($row_pessoa['estado_civil']);
            $pessoaVO->setData_entrada_brasil($row_pessoa['data_entrada_brasil']);
            $pessoaVO->setId_contato($row_pessoa['id_contato']);
            $pessoaVO->setId_origem($row_pessoa['id_origem']);

            $return[] = clone $pessoaVO;
        }

        return $return;
    }

    function paginacaoComLike($conexao, $inicio, $qntd_pag, $criterio) {
        $pessoaVO = new PessoaVO();

        $return = array();

        $sql = "SELECT * FROM tbpessoa WHERE nome LIKE '%$criterio%' LIMIT $inicio, $qntd_pag";

        $resultado = mysqli_query($conexao, $sql);

        while ($row_pessoa = mysqli_fetch_array($resultado)) {
            $pessoaVO->setId_pessoa($row_pessoa['id_pessoa']);
            $pessoaVO->setNome($row_pessoa['nome']);
            $pessoaVO->setData_nasc($row_pessoa['data_nasc']);
            $pessoaVO->setSexo($row_pessoa['sexo']);
            $pessoaVO->setEstado_civil($row_pessoa['estado_civil']);
            $pessoaVO->setData_entrada_brasil($row_pessoa['data_entrada_brasil']);
            $pessoaVO->setId_contato($row_pessoa['id_contato']);
            $pessoaVO->setId_origem($row_pessoa['id_origem']);

            $return[] = clone $pessoaVO;
        }

        return $return;
    }

    public function getIdBanco($conexao) {
        return mysqli_insert_id($conexao);
    }

}

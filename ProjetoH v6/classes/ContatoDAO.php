<?php

/**
 * Description of ContatoDAO
 *
 * @author fridr
 */
class ContatoDAO {

    function create(ContatoVO $contato, $conexao) {
        $email = $contato->getEmail();
        $telefone = $contato->getTelefone();
        $rua = $contato->getRua();
        $numero = $contato->getNumero();
        $bairro = $contato->getBairro();
        $cidade = $contato->getCidade();
        $cep = $contato->getCep();

        $sql = "INSERT INTO tbcontato ( email, telefone, cep, rua, numero, bairro, cidade) VALUES ('$email', '$telefone', '$cep', '$rua', '$numero', '$bairro', '$cidade')";

        return mysqli_query($conexao, $sql);
    }

    function read($conexao, $id_contato) {
        $contatoVO = new contatoVO();

        $sql = "SELECT * FROM tbcontato WHERE id_contato = $id_contato";

        $resultado = mysqli_query($conexao, $sql);

        while ($row_contato = mysqli_fetch_array($resultado)) {
            $contatoVO->setId_contato($row_contato['id_contato']);
            $contatoVO->setEmail($row_contato['email']);
            $contatoVO->setTelefone($row_contato['telefone']);
            $contatoVO->setRua($row_contato['rua']);
            $contatoVO->setNumero($row_contato['numero']);
            $contatoVO->setBairro($row_contato['bairro']);
            $contatoVO->setCidade($row_contato['cidade']);
            $contatoVO->setCep($row_contato['cep']);

            $return = clone $contatoVO;
        }
        return $return;
    }

    function readAll($conexao) {
        $contatoVO = new contatoVO();

        $return = array();

        $sql = "SELECT * FROM tbcontato";

        $resultado = mysqli_query($conexao, $sql);

        while ($row_contato = mysqli_fetch_array($resultado)) {
            $contatoVO->setId_contato($row_contato['id_contato']);
            $contatoVO->setEmail($row_contato['email']);
            $contatoVO->setTelefone($row_contato['telefone']);
            $contatoVO->setRua($row_contato['rua']);
            $contatoVO->setNumero($row_contato['numero']);
            $contatoVO->setBairro($row_contato['bairro']);
            $contatoVO->setCidade($row_contato['cidade']);
            $contatoVO->setCep($row_contato['cep']);

            $return[] = clone $contatoVO;
        }
        return $return;
    }

    function update(ContatoVO $contato, $conexao) {
        $id_contato = $contato->getId_contato();
        $email = $contato->getEmail();
        $telefone = $contato->getTelefone();
        $rua = $contato->getRua();
        $numero = $contato->getNumero();
        $bairro = $contato->getBairro();
        $cidade = $contato->getCidade();
        $cep = $contato->getCep();

        $sql = "UPDATE tbcontato SET email = '$email', telefone = '$telefone', cep = '$cep', rua = '$rua', numero = '$numero', bairro = '$bairro', cidade = '$cidade' WHERE id_contato = '$id_contato'";

        return mysqli_query($conexao, $sql);
    }

    function delete(ContatoVO $contato, $conexao) {
        $id_contato = $contato->getId_contato();

        $sql = "DELETE FROM tbcontato WHERE id_contato = $id_contato";

        return mysqli_query($conexao, $sql);
    }

    public function getIdBanco($conexao) {
        return mysqli_insert_id($conexao);
    }

}

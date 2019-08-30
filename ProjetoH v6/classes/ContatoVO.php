<?php

/**
 * Description of ContatoVO
 *
 * @author fridr
 */
class ContatoVO {

    private $id_contato;
    private $email;
    private $telefone;
    private $rua;
    private $numero;
    private $bairro;
    private $cep;
    private $cidade;
    
    function getCidade() {
        return $this->cidade;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }
    
    function getId_contato() {
        return $this->id_contato;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getRua() {
        return $this->rua;
    }

    function getNumero() {
        return $this->numero;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCep() {
        return $this->cep;
    }

    function setId_contato($id_contato) {
        $this->id_contato = $id_contato;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

}

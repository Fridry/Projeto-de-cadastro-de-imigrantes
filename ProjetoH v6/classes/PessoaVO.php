<?php

/**
 * Description of PessoaVO
 *
 * @author fridr
 */
class PessoaVO {

    //Atributos
    private $id_pessoa;
    private $nome;
    private $data_nasc;
    private $sexo;
    private $estado_civil;
    private $data_entrada_brasil;
    private $id_contato;
    private $id_origem;
    private $criado_em;
    private $modificado_em;

    function getId_pessoa() {
        return $this->id_pessoa;
    }

    function getNome() {
        return $this->nome;
    }

    function getData_nasc() {
        return $this->data_nasc;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getEstado_civil() {
        return $this->estado_civil;
    }

    function getData_entrada_brasil() {
        return $this->data_entrada_brasil;
    }

    function getId_contato() {
        return $this->id_contato;
    }

    function getId_origem() {
        return $this->id_origem;
    }

    function getCriado_em() {
        return $this->criado_em;
    }

    function getModificado_em() {
        return $this->modificado_em;
    }

    function setId_pessoa($id_pessoa) {
        $this->id_pessoa = $id_pessoa;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setData_nasc($data_nasc) {
        $this->data_nasc = $data_nasc;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setEstado_civil($estado_civil) {
        $this->estado_civil = $estado_civil;
    }

    function setData_entrada_brasil($data_entrada_brasil) {
        $this->data_entrada_brasil = $data_entrada_brasil;
    }

    function setId_contato($id_contato) {
        $this->id_contato = $id_contato;
    }

    function setId_origem($id_origem) {
        $this->id_origem = $id_origem;
    }

    function setCriado_em($criado_em) {
        $this->criado_em = $criado_em;
    }

    function setModificado_em($modificado_em) {
        $this->modificado_em = $modificado_em;
    }


}

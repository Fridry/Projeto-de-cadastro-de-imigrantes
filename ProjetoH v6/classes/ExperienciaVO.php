<?php

/* Description of ExperienciaVO
 *
 * @author fridr
 */

class ExperienciaVO {

    private $id_experiencia;
    private $data_inicio;
    private $data_termino;
    private $empresa;
    private $pais;
    private $funcoes;
    private $cargo;
    private $nome_referencia;
    private $telefone_referencia;
    private $id_pessoa;
    
    function getId_experiencia() {
        return $this->id_experiencia;
    }

    function getData_inicio() {
        return $this->data_inicio;
    }

    function getData_termino() {
        return $this->data_termino;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function getPais() {
        return $this->pais;
    }

    function getFuncoes() {
        return $this->funcoes;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getNome_referencia() {
        return $this->nome_referencia;
    }

    function getTelefone_referencia() {
        return $this->telefone_referencia;
    }

    function getId_pessoa() {
        return $this->id_pessoa;
    }

    function setId_experiencia($id_experiencia) {
        $this->id_experiencia = $id_experiencia;
    }

    function setData_inicio($data_inicio) {
        $this->data_inicio = $data_inicio;
    }

    function setData_termino($data_termino) {
        $this->data_termino = $data_termino;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setFuncoes($funcoes) {
        $this->funcoes = $funcoes;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setNome_referencia($nome_referencia) {
        $this->nome_referencia = $nome_referencia;
    }

    function setTelefone_referencia($telefone_referencia) {
        $this->telefone_referencia = $telefone_referencia;
    }

    function setId_pessoa($id_pessoa) {
        $this->id_pessoa = $id_pessoa;
    }

}

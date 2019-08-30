<?php

/**
 * Description of FormacaoVO
 *
 * @author fridr
 */
class FormacaoVO {
    private $id_formacao;
    private $profissao;
    private $descricao;
    private $escolaridade;
    private $ano_formacao;
    private $insituicao;
    private $cidade;
    private $pais;
    private $id_pessoa;
    
    function getId_formacao() {
        return $this->id_formacao;
    }

    function getProfissao() {
        return $this->profissao;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getEscolaridade() {
        return $this->escolaridade;
    }

    function getAno_formacao() {
        return $this->ano_formacao;
    }

    function getInsituicao() {
        return $this->insituicao;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getPais() {
        return $this->pais;
    }

    function getId_pessoa() {
        return $this->id_pessoa;
    }

    function setId_formacao($id_formacao) {
        $this->id_formacao = $id_formacao;
    }

    function setProfissao($profissao) {
        $this->profissao = $profissao;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setEscolaridade($escolaridade) {
        $this->escolaridade = $escolaridade;
    }

    function setAno_formacao($ano_formacao) {
        $this->ano_formacao = $ano_formacao;
    }

    function setInsituicao($insituicao) {
        $this->insituicao = $insituicao;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setId_pessoa($id_pessoa) {
        $this->id_pessoa = $id_pessoa;
    }  
    
}

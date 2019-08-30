<?php

class FamiliaVO {
    private $id_familia;
    private $parentesco;
    private $data_nasc_familiar;
    private $mora_junto;
    private $id_pessoa;
    
    function getId_familia() {
        return $this->id_familia;
    }

    function getParentesco() {
        return $this->parentesco;
    }

    function getData_nasc_familiar() {
        return $this->data_nasc_familiar;
    }

    function getMora_junto() {
        return $this->mora_junto;
    }

    function getId_pessoa() {
        return $this->id_pessoa;
    }

    function setId_familia($id_familia) {
        $this->id_familia = $id_familia;
    }

    function setParentesco($parentesco) {
        $this->parentesco = $parentesco;
    }

    function setData_nasc_familiar($data_nasc_familiar) {
        $this->data_nasc_familiar = $data_nasc_familiar;
    }

    function setMora_junto($mora_junto) {
        $this->mora_junto = $mora_junto;
    }

    function setId_pessoa($id_pessoa) {
        $this->id_pessoa = $id_pessoa;
    }
}

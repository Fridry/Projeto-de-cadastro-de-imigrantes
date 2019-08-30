<?php

/**
 * Description of OrigemVO
 *
 * @author fridr
 */
class OrigemVO {

    private $id_origem;
    private $pais;
    
    function getId_origem() {
        return $this->id_origem;
    }

    function getPais() {
        return $this->pais;
    }

    function setId_origem($id_origem) {
        $this->id_origem = $id_origem;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

}

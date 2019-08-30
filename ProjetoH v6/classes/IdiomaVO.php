<?php

/**
 * Description of IdiomaVO
 *
 * @author fridr
 */
class IdiomaVO {

    private $id_idioma;
    private $idioma;
    private $fluencia;
    private $id_pessoa;
    
    function getId_idioma() {
        return $this->id_idioma;
    }

    function getIdioma() {
        return $this->idioma;
    }

    function getFluencia() {
        return $this->fluencia;
    }

    function getId_pessoa() {
        return $this->id_pessoa;
    }

    function setId_idioma($id_idioma) {
        $this->id_idioma = $id_idioma;
    }

    function setIdioma($idioma) {
        $this->idioma = $idioma;
    }

    function setFluencia($fluencia) {
        $this->fluencia = $fluencia;
    }

    function setId_pessoa($id_pessoa) {
        $this->id_pessoa = $id_pessoa;
    } 
    
}

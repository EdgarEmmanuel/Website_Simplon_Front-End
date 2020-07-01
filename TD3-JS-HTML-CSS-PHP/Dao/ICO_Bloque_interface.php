<?php

include_once(SRC_MODELS."/ComptBloque_class.php");


interface ICOBloque {
    public function add(ComptBloque $compte);
    public function getFraisWithTypBloque();
}





?>
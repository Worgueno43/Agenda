<?php

if (!isset($_POST["idE"]))
    {
        $_POST["idE"] = $_SESSION['User']->IDCOMPTE;
    }

class employer extends Model{

    var $table = "compte";

    function getLast($num=6){
        return $this->find(array(
            "fields"=>'*',
            "limit"=>'LIMIT '.$num,
            "order"=>'IDCOMPTE ASC'
        ));
    }

    function getAll($num=99) {
        return $this->find(array(
            "fields"=>'*',
            "condition"=>'IDENTREPRISE = '.$_SESSION['User']->IDENTREPRISE,
            "limit"=>'LIMIT '.$num,
            "order"=>'IDCOMPTE ASC'
        ));
    }
}
?>
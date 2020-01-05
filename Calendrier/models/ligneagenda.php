<?php

date_default_timezone_set('Europe/Paris');
    if (!isset($_POST["id"]))
    {
        $_POST["id"] = date("W") ;
    }
    
class ligneagenda extends Model{

    var $table = "ligneagenda";

    function getLast($num=6){
        return $this->find(array(
            "fields"=>'*',
            "limit"=>'LIMIT '.$num
        ));
    }

    function getAll($num=99) {
        return $this->find(array(
            "fields"=>'*',
            "inner"=>'INNER JOIN ACTIONAFAIRE ON ACTIONAFAIRE.idAction = ligneagenda.IDACTION',
            "condition"=>'ligneagenda.IDSEMAINE = '.$_POST["id"].' and IDCOMPTE_CONCERNE = '.$_POST["idE"],
            "limit"=>'LIMIT '.$num,
            "order"=>'IDSEMAINE ASC'
        ));
    }
}
?>
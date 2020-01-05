<?php
class semaine extends Model{

    var $table = "semaine";

    function getLast($num=6){
        return $this->find(array(
            "fields"=>'*',
            "limit"=>'LIMIT '.$num,
            "order"=>'ordre ASC'
        ));
    }

    function getAll($num=99) {
        return $this->find(array(
            "fields"=>'*',
            "limit"=>'LIMIT '.$num,
            "order"=>'IDSEMAINE ASC'
        ));
    }
}
?>
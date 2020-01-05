<?php
class heure extends Model{

    var $table = "heure";

    function getLast($num=6){
        return $this->find(array(
            "fields"=>'*',
            "limit"=>'LIMIT '.$num
        ));
    }

    function getAll($num=99) {
        return $this->find(array(
            "fields"=>'*',
            "limit"=>'LIMIT '.$num,
            "order"=>'IDHEURE ASC'
        ));
    }
}
?>
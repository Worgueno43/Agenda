<?php
class jtableau extends Model{

    var $table = "jtableau";

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
            "order"=>'ID ASC'
        ));
    }
}
?>

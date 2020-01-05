<?php
class action extends Model{

    var $table = "actionafaire";

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
            "order"=>'IDACTION ASC'
        ));
    }
}
?>

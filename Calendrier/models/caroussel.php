<?php
class caroussel extends Model{

    var $table = "caroussel";

    function getLast($num=6){
        return $this->find(array(
            "fields"=>'*',
            "limit"=>'LIMIT '.$num,
        ));
    }

    function getAll($num=99) {
        return $this->find(array(
            "fields"=>'*',
            "limit"=>'LIMIT '.$num,
            "order"=>'id ASC'
        ));
    }

    function getCat($id){
        return $this->findFirst(array(
            "fields"=>'*',
            "condition"=>'id='.$id
        ));
    }

    function deleteCat($id){
        $this->id=$id;
        return $this->delete();
    }
}
?>
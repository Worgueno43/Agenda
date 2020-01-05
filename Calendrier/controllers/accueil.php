<?php
class accueil extends controller{
    
    function index(){
        //echo "méthode index de la classe vehicule <br/>";
        $d=array();
        //$d['cat']=array(
        //    "nom"=>"berline",
        //    "ordre"=>"4",
        //);
        $this->loadModel('caroussel');

        $d['car'] = $this->caroussel->getAll();
        $d['titre']="Liste des caroussels";

        $this->set($d);

        //on rend la vue
        $this->render('index');
    }

}
?>
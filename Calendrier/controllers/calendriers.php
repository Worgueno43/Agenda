<?php
class calendriers extends controller{
    
    function index(){

        //echo "méthode index de la classe category <br/>";
        $d=array();
        //$d['cat']=array(
        //    "nom"=>"berline",
        //    "ordre"=>"4",
        //);
        $this->loadModel('heure');
        $this->loadModel('jtableau');
        $this->loadModel('ligneagenda');
        $this->loadModel('semaine');
        $this->loadModel('action');
        $this->loadModel('employer');
        $this->loadModel('user');

        $d['jtableau'] = $this->jtableau->getAll();
        $d['action'] = $this->action->getAll();
        $d['ligneagenda'] = $this->ligneagenda->getAll();
        $d['heure'] = $this->heure->getAll();
        $d['semaine'] = $this->semaine->getAll();
        //$d['id']="1";
        $d['titre']="Calendrier";

        $this->set($d);

        //on rend la vue
        $this->render('index');
    }

    function adminIndex(){
        if ($this->Session->isLogged()){
            $this->loadModel('heure');
            $this->loadModel('jtableau');
            $this->loadModel('ligneagenda');
            $this->loadModel('semaine');
            $this->loadModel('action');
            $this->loadModel('employer');
            $this->loadModel('user');

            $d['jtableau'] = $this->jtableau->getAll();
            $d['action'] = $this->action->getAll();
            $d['ligneagenda'] = $this->ligneagenda->getAll();
            $d['heure'] = $this->heure->getAll();
            $d['semaine'] = $this->semaine->getAll();
            $d['employer'] = $this->employer->getAll();
            $d['user'] = $this->employer->getAll();
            $d['titre']="Administration Calendrier";

            $this->set($d);

            $this->layout='admin';
            //on rend la vue --> index
            $this->render('adminIndex');
        }
    }

    function adminDelete($id){
        if ($this->Session->isLogged()){
            $this->loadModel('heure');
            $this->loadModel('jtableau');
            $this->loadModel('ligneagenda');
            $this->loadModel('semaine');
            $this->loadModel('action');

            if (!$this->category->deleteCat($id)){
                $this->Session->SetFlash("Suppression impossible! Il y a des vehicule dans cette categorie", "danger");
            }else{
                $this->Session->SetFlash("Suppression effectuée", "success");
            }
            $d['jtableau'] = $this->jtableau->getAll();
            $d['action'] = $this->action->getAll();
            $d['ligneagenda'] = $this->ligneagenda->getAll();
            $d['heure'] = $this->heure->getAll();
            $d['semaine'] = $this->semaine->getAll();
            $d['titre']="Administration Calendrier";

            $this->set($d);

            $this->layout='admin';
            //on rend la vue --> adminindex
            $this->render('adminIndex');
        }
    }
    
    function adminEdit($id=null){
        if ($this->Session->isLogged()){
            $this->loadModel('heure');
            $this->loadModel('jtableau');
            $this->loadModel('ligneagenda');
            $this->loadModel('semaine');
            $this->loadModel('action');

            $this->layout='admin';
            if(!empty($_POST)) {
                //on est en insert ou update et on affiche la liste
                $this->category->save($_POST);
                $this->Session->setFlash("Votre mise à jour a bien été prise en compte");
                $d['jtableau'] = $this->jtableau->getAll();
                $d['action'] = $this->action->getAll();
                $d['ligneagenda'] = $this->ligneagenda->getAll();
                $d['heure'] = $this->heure->getAll();
                $d['semaine'] = $this->semaine->getAll();
                $d['titre']="Administration Calendrier";
                $this->set($d);
                //on rend la vue --> adminindex
                $this->render('adminIndex');
            } else {
                $d = array();
                // on remplit le formulaire et on l'affiche
                //si id est renseigné
                if (!empty($id)) {
                    // on remplit le formulaire   
                    // on récupère es données de mon id
                    $d['jtableau'] = $this->jtableau->getAll();
                    $d['action'] = $this->action->getAll();
                    $d['ligneagenda'] = $this->ligneagenda->getAll();
                    $d['heure'] = $this->heure->getAll();
                    $d['semaine'] = $this->semaine->getAll();
                    $d['titre']="Administration Calendrier";
                }
                $this->set($d);
                //on rend la vue --> adminEdit
                $this->render('adminedit');


            }
        }
    }  

}
?>
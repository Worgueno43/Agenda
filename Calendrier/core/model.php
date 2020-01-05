<?php
    //définir une classe
    class Model{
        //propriétés de la classe
        public $id;
        public $table;
        public $conf='default';
        public $db;

        function __construct(){
            //on fait appel a notre configuration BDD
            $conf = conf::$databases[$this->conf];
            try {
                $this->db = new PDO('mysql:
                host='.$conf['host'].';
                dbname='.$conf['database'],
                $conf['login'],
                $conf['password']);
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        // read : lecture d'une table par la CP --> renvoir une seule ligne
        function read($fields=null) {
            if ($fields==null){
                $fields="*";
            }
            // Exécute une requête préparée en passant un tableau de valeurs
            $sql = 'SELECT '.$fields .' FROM '.$this->table .' WHERE id = :id';
            //echo $sql;
            //préparation PDO
            $sth = $this->db->prepare($sql);
            //chargement du résultat
            if ($sth->execute(array(':id' => $this->id))){
                $data = $sth->fetch(PDO::FETCH_OBJ);
                //echo "<PRE>";
                //print_r($data);
                //echo"</PRE>"; 
                foreach ($data as $key=>$value){
                    //on peut crée "à la volée" les propriétés de la classe
                    $this->$key=$value;
                }
                //return $data;
            }else{
                echo "erreur SQL";
            }
        }
            
        //insertion ou modif d'une ligne dans la BDD
        function save($data) {
            //on verif si l'id existe
            if (empty($data["id"])){
                //echo "insert";
                unset($data['id']);
                //echo "<PRE>";
                //print_r($data);
                //echo"</PRE>"; 
                //construction requete SQL
                $sql = 'INSERT INTO ' .$this->table ." (";
                $values="";
                foreach ($data as $key => $value) {
                    $sql.=$key .",";
                    $values .= ":".$key.",";
                }
                //enleve la derniere virgule
                $sql = substr($sql, 0, -1);
                $values = substr($values, 0, -1);
                $sql.=") VALUES (" .$values .")";

                //echo $sql;
                //préparation SQL
                $sth = $this->db->prepare($sql);

                //execution
                if ($sth->execute($data)) {
                    //echo "insertion OK".$this->db->lastInsertId();
                    $this->id=$this->db->lastInsertId();
                }else{
                    echo "erreur SQL";
                }

            }else{
                //echo "update";
                //unset($data['id']);
                //echo "<PRE>";
                //print_r($data);
                //echo"</PRE>"; 
                $this->id=$data['id'];
                //construction requete SQL
                $sql = 'UPDATE ' .$this->table ." SET ";
                //$values="";
                foreach ($data as $key => $value) {
                    $sql.=$key ."= :".$key.",";

                }
                //enleve la derniere virgule
                $sql = substr($sql, 0, -1);
                $sql.=" WHERE id= " .$this->id;

                //echo $sql;
                //préparation SQL
                $sth = $this->db->prepare($sql);

                //execution
                if ($sth->execute($data)) {
                    //echo "MAJ OK";
                }else{
                    echo "erreur SQL";
                }
            }
        }

        // find : lecture d'une ou plusieurs tables --> renvoir plusieurs lignes
        function find($data) {

            $fields="";
            $inner="";
            $condition="1=1";
            $order="id";
            $limit="";

            if (isset($data["fields"])){
                $fields=$data["fields"];
            }
            if (isset($data["inner"])){
                $inner=$data["inner"];
            }
            if (isset($data["condition"])){
                $condition=$data["condition"];
            }
            if (isset($data["order"])){
                $order=$data["order"];
            }
            if (isset($data["limit"])){
                $limit=$data["limit"];
            }

            // Exécute une requête préparée en passant un tableau de valeurs
            $sql =  'SELECT '.$fields.
                    ' FROM '.$this->table.
                    ' '.$inner.
                    ' WHERE '.$condition.
                    ' ORDER BY ' .$order.
                    ' ' .$limit;
            //echo $sql;
            //préparation PDO
            $sth = $this->db->prepare($sql);
            //chargement du résultat
            if ($sth->execute()){
                $d = $sth->fetchAll(PDO::FETCH_OBJ);
                //echo "<PRE>";
                //print_r($data);
                //echo"</PRE>"; 
                return $d;
            }else{
                echo $sql;
                //echo "<br>";
                echo "erreur SQL";
            }
        }

        // findFirst : lecture du premier de find
        function findFirst($data) {
            //retourne l'élement courant du tableau
            return current($this->find($data));
        }

        // delete : on supprime une seul ligne sur CP
        function delete(){
            // Exécute une requête préparée en passant un tableau de valeurs
            $sql =  'DELETE FROM '.$this->table.
                    ' WHERE id = :id';
            //echo $sql;
            //préparation PDO
            $sth = $this->db->prepare($sql);
            //chargement du résultat
            if ($sth->execute(array(':id'=>$this->id))){
                //echo "OK <br/>";
                return true;
            }else{
                //echo "erreur SQL <br/>";
                return false;
            }
        }
    }
?>
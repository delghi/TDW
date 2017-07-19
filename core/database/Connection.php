<?php
/*
  generazione di una tabella con MySQLi
*/
// inclusione del file di connessione

//class Connection {
//    
//    private $connessione;
//    
//       public function connect() {
//                        /*
//              Connessione al DBMS e selezione del dataabse.
//            */
//            # blocco dei parametri di connessione
//            // nome di host
//            $host = "localhost";
//            // username dell'utente in connessione
//            $user = "root";
//            // password dell'utente
//            $password = "root";
//            // nome del database
//            $db = "tdwDatabase";
//            # stringa di connessione al DBMS
//            // istanza dell'oggetto della classe MySQLi
//            $this->connessione = new mysqli($host, $user, $password, $db);
//            // verifica su eventuali errori di connessione
//            if ($this->connessione->connect_errno) {
//                echo "Connessione fallita: ". $this->connessione->connect_error . ".";
//                exit();
//            } else {
//                echo 'Connsessione riuscita';
//             }
//        }
//        function insertAnnuncio($nome,$prezzo,$quantita) {
//            
//        }
//                
//        
//
//
//}

class Connection {
    
    public static function connect($config) {
        try {
            return new PDO(
                $config['connection'].';dbname='.$config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
            
    }
}
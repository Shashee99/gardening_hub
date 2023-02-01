<?php

    class Database
    {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASSWORD;
        private $dbname = DB_NAME;

        private $dbh;
        private $stmnt;
        private $error;

        public function __construct()
        {
            // Set dsn
            $dsn = 'mysql:host='. $this->host .';dbname='. $this->dbname;
            $options = array(
                PDO::ATTR_PERSISTENT => true, // Requesting for persistant connection
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Error handinling using exception
            );

            // Create PDO instance
            try 
            {
                $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
            } 
            catch (PDOException $err)
            {
                $this->error = $err->getMessage();
                echo $this->error;
            }
        }
        // Prepare statment with sql query
        public function query($sql)
        {
            $this->stmnt = $this->dbh->prepare($sql);
        }
        // Bind values
        public function bind($parameter, $value, $type = null)
        {
            if(is_null($type))
            {
                switch(true)
                {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                         $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            // Bind value to tha statemnet
            $this->stmnt->bindValue($parameter, $value, $type);

        }
        // Execute the sql query
        public function execute()
        {
            return $this->stmnt->execute();
        }
        // Get result set as array of objects
        public function resultSet()
        {
            $this->execute();
            return $this->stmnt->fetchAll(PDO::FETCH_OBJ);  
        }
        // Get Singel record as object
        public function singleRecord()
        {
            $this->execute();
            return $this->stmnt->fetch(PDO::FETCH_OBJ);  
        }
        // Get row conut
        public function rowCount()
        {
            return $this->stmnt->rowCount();
        }
    }
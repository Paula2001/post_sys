<?php
    class Connect
    {
        protected $con = NULL;
        public function __construct()
        {
            $this->new_con("localhost","root","","comment");
        }
        private function new_con($host, $username, $password, $db)
        {
            mysqli_report(MYSQLI_REPORT_STRICT);
            try{
                $this->con = new mysqli($host, $username, $password, $db);
            }catch(mysqli_sql_exception $e){
                echo '<p class="error">'.$e->getMessage().'</p>' ;
            }
        }
    }

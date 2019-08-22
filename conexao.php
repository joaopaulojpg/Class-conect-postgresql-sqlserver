<?php

    class Conexao{
        public function __construct() {
            //////// VARIAVEIS DE INSTANCIA - CREDENCIAIS
            $this->servidor = null;
            $this->dbname = null;
            $this->usuario = null;
            $this->senha = null;
            $this->porta = null;
        }

        /////////// CONEXAO POSTGRES
        public function conect_pg(){
            $conn = pg_connect("host={$this->servidor} port={$this->porta} dbname={$this->dbname} user={$this->usuario} password={$this->senha}") or die ("N deu");

            return $conn;
        }

        ////////// CONEXAO SQL SERVER
        public function conect_ssql(){

            $conn = mssql_connect($this->servidor, $this->usuario, $this->senha);
            if($conn == FALSE) die("Couldn't connect");

            if(mssql_select_db($this->dbname, $conn))
                $result = "Selected {$this->dbname} ok<br />";
            else
                die('Failed to select DB');
        }
    }

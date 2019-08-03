<?php
    class Database {
        private $ip;
        private $user;
        private $pass;
        private $db;
        private $tb;

        private $cnx;

        function __construct($i,$u,$p,$d,$t) {
            $this->ip = $i;
            $this->user = $u;
            $this->pass = $p;
            $this->db = $d;
            $this->tb = $t;

            $this->cnx = new mysqli($i,$u,$p,$d);
        }

        public function get() {
            $tb = $this->tb;
            $query = "SELECT * FROM $tb";
            $result = $this->cnx->query($query)->fetch_all();
            $root = array();
            foreach($result as $first) {
                $child = array();
                foreach($first as $second) {
                    $last = rawurldecode($second);
                    array_push($child, $last);
                }
                array_push($root, $child);
            }
            return $root;
        }

        public function find(...$args)
        {
            $sql = "SELECT * FROM $tb WHERE 1=1 ";
            foreach($args as $key => $value) {
                $raw = rawurlencode($param);
                $sql.="AND $key=$param ";
            }

            $result = $this->cnx->query($sql)->fetch_all();
            $root = array();
            foreach($result as $first) {
                $child = array();
                foreach($first as $second) {
                    $last = rawurldecode($second);
                    array_push($child, $last);
                }
                array_push($root, $child);
            }
            return $root;
        }

        public function insert(...$params) {
            $tb = $this->tb;
            $query = "INSERT INTO $tb VALUES (null ";
            foreach($params as $param) {
                $raw = rawurlencode($param);
                $query.=",'$raw' ";
            }
            $query.=")";

            print($query . "<br>");
            $this->cnx->query($query);
        }
    }


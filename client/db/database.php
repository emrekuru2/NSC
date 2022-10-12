<?php
// This Is The Database Class File
// Created By Nicholas Deschenes On 10/13/2019

    function OpenCon() {
        $dbhost = "";
        $dbuser = "";
        $dbpass = "";
        if ($_SERVER['SERVER_NAME'] == "localhost") {
            $dbhost = "localhost:3306";
            $dbuser = "root";
            $dbpass = "root";
        } else {
            $dbhost = "db.cs.dal.ca";
            $dbuser = "";
            $dbpass = "";
        }
        $db = "projectnsca";
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
        return $conn;
    }

    function CloseCon($conn) {
        mysqli_close($conn);
    }

//if (!class_exists('DB')) {
//    class DB {
//        public function __construct() {
//            $this->dbhost = "";
//            $this->dbuser = "";
//            $this->dbpass = "";
//            if ($_SERVER['SERVER_NAME'] == "localhost") {
//                $this->dbhost = "localhost";
//                $this->dbuser = "root";
//                $this->dbpass = "root";
//            } else {
//                $this->dbhost = "db.cs.dal.ca";
//                $this->dbuser = "";
//                $this->dbpass = "";
//            }
//
//            $this->db = 'projectnsca';
//        }
//
//        protected function connect() {
//            return new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->db);
//        }
//
//        public function sanitize($str) {
//            $db = $this->connect();
//
//            mysqli_real_escape_string($db, trim($str));
//
//            $db->close();
//
//            return $str;
//        }
//
//        public function query($query) {
//            $db = $this->connect();
//            $result = $db->query($query);
//
//            while ($row = $result->fetch_assoc()) {
//                $results[] = $row;
//            }
//
//            // Close Connection
//            $db->close();
//
//            return $results;
//        }
//
//        public function insert($table, $data, $format) {
//            // Check for $table or $data not set
//            if (empty($table) || empty($data)) {
//                return false;
//            }
//
//            // Connect To DB
//            $db = $this->connect();
//
//            // Cast $data and $format To arrays
//            $data = (array) $data;
//            $format = (array) $format;
//
//            // Build Format String
//            $format = implode('', $format);
//            $format = str_replace('%', '', $format);
//
//            list($fields, $placeholders, $values) = $this->prep_query($data);
//
//            // Prepend $format onto values
//            array_unshift($values, $format);
//
//            // Prepary our query for binding
//            $stmt = $db->prepare("INSERT INTO {$table} ({$fields}) VALUES ({$placeholders})");
//
//            // Dynamically bind values
//            call_user_func_array(array($stmt, 'bind_param'), $this->ref_values($values));
//
//            // Execute The query
//            $stmt->execute();
//
//            // Close Connection
//            $db->close();
//
//            // Check If Successful
//            if ($stmt->affected_rows) {
//                return true;
//            }
//
//            return false;
//        }
//
//        public function update($table, $data, $format, $where, $where_format) {
//            // Check for $table or $data not set
//            if (empty($table) || empty($data)) {
//                return false;
//            }
//
//            // Connect To DB
//            $db = $this->connect();
//
//            // Cast $data, $format to arrays
//            $data = (array) $data;
//            $format = (array) $format;
//
//            // Build Format Array
//            $format = implode('', $format);
//            $format = str_replace('%', '', $format);
//            $where_format = implode('', $where_format);
//            $where_format = str_replace('%', '', $where_format);
//            $format .= $where_format;
//
//            list($fields, $placeholders, $values) = $this->prep_query($data, 'update');
//
//            //Format where clause
//            $where_clause = '';
//            $where_values = array();
//            $count = 0;
//
//            foreach ($where as $field => $value) {
//                if ($count > 0) {
//                    $where_clause .= ' AND ';
//                }
//
//                $where_clause .= $field . '=?';
//                $where_values[] = $value;
//
//                $count++;
//            }
//
//            // Prepend $format onto $values
//            array_unshift($values, $format);
//            $values = array_merge($values, $where_values);
//
//            // Prepary our query for binding
//            $stmt = $db->prepare("UPDATE {$table} SET {$placeholders} WHERE {$where_clause}");
//
//            // Dynamically Bind Values
//            call_user_func_array(array($stmt, 'bind_param'), $this->ref_values($values));
//
//            // Execute Statement
//            $stmt->execute();
//
//            // Close Connection
//            $db->close();
//
//            // Check If Successful
//            if ($stmt->affected_rows) {
//                return true;
//            }
//
//            return false;
//        }
//
//        public function get_rows($query) {
//            // Connect To DB
//            $db = $this->connect();
//
//            $results = $db->query($query);
//
//            $db->close();
//
//            return $results;
//        }
//
//        public function get_row($query) {
//            // Connect To DB
//            $db = $this->connect();
//
//            $results = $db->query($query);
//
//            $db->close();
//
//            return $results[0];
//        }
//
//        public function delete($table, $id) {
//            // Connect To DB
//            $db = $this->connect();
//
//            // Prepary our query for binding
//            $stmt = $db->prepare("DELETE FROM {$table} WHERE ID = ?");
//
//            // Dynamically Bind Values
//            $stmt->bind_param('d', $id);
//
//            // Execute The Query
//            $stmt->execute();
//
//            // Close Connection
//            $db->close();
//
//            // Check If Successful
//            if ($stmt->affected_rows) {
//                return true;
//            }
//        }
//
//        private function prep_query($data, $type='insert') {
//            // Create $fields and $placeholders for looping
//            $fields = '';
//            $placeholders = '';
//            $values = array();
//
//            // Loop
//            foreach ($data as $field => $value) {
//                $fields .= "{$field},";
//                $values[] = $value;
//
//                if ($type == 'update') {
//                    $placeholders .= $field . '=?,';
//                } else {
//                    $placeholders .= '?,';
//                }
//            }
//
//            $fields = substr($fields, 0, -1);
//            $placeholders = substr($placeholders, 0, -1);
//
//            return array($fields, $placeholders, $values);
//        }
//
//        private function ref_values($array) {
//            $refs = array();
//
//            foreach ($array as $key => $value) {
//                $refs[$key] = &$array[$key];
//            }
//
//            return $refs;
//        }
//    }
//}





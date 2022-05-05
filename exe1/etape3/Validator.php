<?php
    class Validator
    {   
        public $name;
        public $age;
        public $grade;

        public function __construct ($name, $age, $grade)
        {
            $this -> name = $name;
            $this -> age = $age;
            $this -> grade = $grade;
        }

        private function validateName () {
            if (isset($this -> name)) {
                $regex_digit = '/\d+/';
                $regex_special_char = '/[#$%&*()+=\-\[\];,.\/{}|":<>?~\\\\]/';
                $nodigit = ( preg_match($regex_digit, $this -> name) ) ? false : true;
                $nochar = ( preg_match($regex_special_char, $this -> name) ) ? false : true;
                if (strlen($this -> name) <= 50 and $nodigit == true and $nochar == true) {
                    return $this -> name;
                } else {
                    return 'Invalid name';
                }
            } else {
                return 'Empty name';
            }
        }

        private function validateAge () {
            if (isset($this -> age)) {
                if ($this -> age > 0 and $this -> age <= 118) {
                    return $this -> age;
                } else {
                    return 'Invalid age';
                }
            } else {
                return 'Empty age';
            }
        }

        private function validateGrade () {
            if (isset($this -> grade)) {
                if (is_numeric($this -> grade)) {
                    return $this -> grade;
                } else {
                    return 'Invalid grade';
                }
            } else {
                return 'Empty grade';
            }
        }

        public function dataValid () {
            $name = $this -> validateName();
            $age = $this -> validateAge();
            $grade = $this -> validateGrade();
            if ($name == 'Empty name' or $name == "Invalid name" or $age == 'Empty age' or $age == "Invalid age" or $grade == 'Empty grade' or $grade == "Invalid grade") {
                $errors = [];
                $errors[] = $name;
                $errors[] = $age;
                $errors[] = $grade;
                return $errors;
            } else {
                $data = [];
                $data[] = $name;
                $data[] = $age;
                $data[] = $grade;
                return $data;
            }
        }
    }
?>
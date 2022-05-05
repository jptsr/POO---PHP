<?php
    class Voiture
    {
        public $plate_nb;
        public $release_date;
        public $mileage;
        public $brand;
        public $color;
        public $weight;

        public function __construct ($plate_nb, $release_date, $mileage, $brand, $color, $weight)
        {
            $this -> plate_nb = $plate_nb;
            $this -> release_date = $release_date;
            $this -> mileage = $mileage;
            $this -> brand = $brand;
            $this -> color = $color;
            $this -> weight = $weight;
        }

        private function isAudi ()
        {
            if (ucfirst($this -> brand) == 'Audi') {
                return 'Reserved';
            } else {
                return 'Free';
            }
        }

        private function utilityOrCommercial ()
        {
            if ($this -> weight > 3.5) {
                return 'Utility vehicle';
            } else {
                return 'Commercial vehicle';
            }
        }

        private function plateNbCountry ()
        {
            $plate_start = substr($this -> plate_nb, 0, 2);
            if (mb_strtoupper($plate_start) == 'BE') {
                return 'Belgium';
            } else if (mb_strtoupper($plate_start) == 'FR') {
                return 'France';
            } else if (mb_strtoupper($plate_start) == 'BE') {
                return 'Germany';
            } else {
                return 'Another country';
            }
        }

        private function isUsed ()
        {
            if ($this -> mileage < 100000) {
                return 'Low';
            } else if ($this -> mileage > 100000 and $this -> mileage < 200000) {
                return 'Middle';
            } else {
                return 'Hight';
            }
        }

        private function age ()
        {
            $currentYear = intval(date("Y"));
            $age = $currentYear - intval(substr($this -> release_date, 6, 4));
            return $age;
        }

        public function differentMileage ($diff_mileage)
        {
            $this -> mileage = $diff_mileage;
            $change = $this -> isUsed ();
            return $change;
        }

        public function run ()
        {
            $this -> mileage .= 100000;
            return $this -> differentMileage ($this -> mileage) ;
        }

        public function display ($linkImg)
        {
            $car_disponibility = $this->isAudi();
            $car_color = $this ->color;
            $car_brand = ucfirst($this->brand);
            $car_model = $this -> utilityOrCommercial();
            $car_release_date = $this -> release_date;
            $car_age = $this -> age();
            $car_usability = $this -> isUsed();
            $car_plate = $this -> plate_nb;
            $car_country = $this -> plateNbCountry();

            echo <<<HTML
                <tr>
                    <td>$car_brand</td>
                    <td>$car_color</td>
                    <td>$car_model</td>
                    <td>$car_release_date ($car_age)</td>
                    <td>$car_usability</td>
                    <td>$car_plate ($car_country)</td>
                    <td>$car_disponibility</td>
                    <td><img src="$linkImg" alt="img" width="100" height="auto"></td>
                </tr>
            HTML;
        }
    }
?>
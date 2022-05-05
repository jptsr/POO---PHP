<?php
    class FormUser
    {
        public function formStart ($action, $method)
        {
            echo <<<HTML
                <form action="$action" method="$method">
            HTML;   
        }

        public function input ($input_type, $input_name, $label_value, ...$data) {
            $value = (empty($data[0])) ? '' : "value=\"" . $data[0] . "\"";
            $max = (empty($data[1])) ? '' : "max=\"" . $data[1] . "\"";
            $min = (empty($data[2])) ? '' : "min=\"" . $data[2] . "\"";

            echo <<<HTML
                <div>
                    <label for="$input_name">
                        $label_value
                        <input type="$input_type" name="$input_name" $value $max $min>
                    </label>
                </div>
            HTML;
        }

        public function passwordInput ($input_type, $input_name, $label_value) {
            echo <<<HTML
                <div>
                    <label for="$input_name">
                        $label_value
                        <input type="$input_type" name="$input_name">
                    </label>
                </div>
            HTML;
        }

        public function submit ($input_type, $input_name, $value)
        {
            echo <<<HTML
                <div>
                    <input type="$input_type" name="$input_name" value="$value">
                </div>
            HTML;
        }

        public function btn ($input_type, $input_name, $value, $label_value) {
            echo <<<HTML
                <div>
                    <label for="$input_name">
                        <p>$label_value</p>
                        <input type="$input_type" name="$input_name" value="$value">
                    </label>
                </div>
            HTML;
        }
    }
?>
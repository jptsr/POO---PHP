<?php
    class Form
    {
        public $action;
        public $method;

        public function __construct ($action, $method)
        {
            $this -> action = $action;
            $this -> method = $method;
        }

        public function formHTML () {
            echo <<<HTML
                <form action="$this->action" method="$this->method">
            HTML;
        }

        public function inputTxtHTML ($name, $title) {
            echo <<<HTML
                <label for="$name">
                    $title
                    <input type="text" name="$name" value="">
                </label>
            HTML;
        }

        public function selectHTML ($name, $value1, $value2, $value3, $value4) {
            $val1 = ucfirst($value1);
            $val2 = ucfirst($value2);
            $val3 = ucfirst($value3);
            $val4 = ucfirst($value4);
            echo <<<HTML
                <select name="$name">
                    <option value="$value1">$val1</option>
                    <option value="$value2">$val2</option>
                    <option value="$value3">$val3</option>
                    <option value="$value4">$val4</option>
                </select>
            HTML;
        }

        public function textareaHTML ($name, $title) {
            echo <<<HTML
                <label for="description">
                    $title
                    <textarea name="$name"></textarea>
                </label>
            HTML;
        }

        public function radioBtnHtml ($name, $p, $value1, $value2) {
            $val1 = ucfirst($value1);
            $val2 = ucfirst($value2);
            echo <<<HTML
                <div>
                    <p>$p</p>
                    <input type="radio" name="$name" value="$value1">
                    <label for="$name">$val1</label>
                    <input type="radio" name="$name" value="$value2">
                    <label for="$name">$val2</label>
                </div>
            HTML;
        }

        public function checkboxHTML ($name, $title, $value1, $value2, $value3) {
            $val1 = ucfirst($value1);
            $val2 = ucfirst($value2);
            $val3 = ucfirst($value3);
            echo <<<HTML
                <div>
                    <p>$title</p>
                    <input type="checkbox" name="$name" value="$value1">
                    <label for="$name">$val1</label>
                    <input type="checkbox" name="$name" value="$value2">
                    <label for="$name">$val2</label>
                    <input type="checkbox" name="$name" value="$value3">
                    <label for="$name">$val3</label>
                </div>
            HTML;
        }

        public function submitHTML ($name, $value) {
            echo <<<HTML
                <input type="submit" name="$name" value="$value">
            HTML;
        }

        public function formEndHTML () {
            echo <<<HTML
                </form>
            HTML;
        }
    }
?>
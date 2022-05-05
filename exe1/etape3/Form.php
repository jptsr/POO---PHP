<?php
    class FormHTML
    {
        public function formTagOpen ($action, $method) {
            echo <<<HTML
                <form action="$action" method="$method">
            HTML;
        }

        public function nameInput ($name, $label) {
            echo <<<HTML
                <label for="$name">
                    $label
                    <input type="text" name="$name" value="">
                </label>
            HTML;
        }

        public function ageInput ($name, $label) {
            echo <<<HTML
                <label for="$name">
                    $label
                    <input type="number" name="$name" value="">
                </label>
            HTML;
        }

        public function gradeInput ($grade, $step, $label, $max) {
            echo <<<HTML
                <label for="$grade">
                    $label
                    <input type="number" name="$grade" step="$step" min="0" max="$max">/$max
                </label>
            HTML;
        }

        public function submit ($name, $value) {
            echo <<<HTML
                <input type="submit" name="$name" value="$value">
            HTML;
        }

        public function formTagEnd () {
            echo <<<HTML
                </form>
            HTML;
        }
    }
?>
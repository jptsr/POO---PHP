<?php
    class HTML
    {
        public function metaTag ($contentPg, $title) {
            echo <<<HTML
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="description" content="$contentPg">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
            HTML;
        }

        public function linkTag ($path) {
            echo <<<HTML
                    <link rel="stylesheet" href="$path">
                </head>
            HTML;
        }

        public function imgTag ($src, $alt, $width, $height) {
            echo <<<HTML
                <img src="$src" alt="$alt" width="$width" height="$height">
            HTML;
        }

        public function aTag ($href) {
            echo <<<HTML
                <a href="$href"></a>
            HTML;
        }

        public function scriptTag ($src) {
            echo <<<HTML
                <script src="$src" ></script>
            HTML;
        }
    }
?>
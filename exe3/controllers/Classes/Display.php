<?php
    class DisplayUserInfos
    {
        private $username;
        private $email;
        private $status;

        public function __construct ($username, $email, $status)
        {
            $this -> username = $username;
            $this -> email = $email;
            $this -> status = $status;
        }

        public function displayAll ()
        {
            $connected = ($this -> status == 0) ? 'Not connected' : 'Connected' ;
            return <<<HTML
                <tr>
                    <td>$this->username</td>
                    <td>$this->email</td>
                    <td>$connected</td>
                </tr>
            HTML;
        }
    }
?>
<?php

    class DB {
        public function checkOrder($selectie, $user){
            if ($selectie == "datum") {
                $query = [
                    $new= "SELECT * FROM crud_agenda.agenda WHERE status != 'n' AND gebruiker = '$user' ORDER BY eindDatum ASC",
                    $old = "SELECT * FROM crud_agenda.agenda WHERE status = 'n' AND gebruiker = '$user' ORDER BY eindDatum ASC"
                ];
                return $query;
            
            } else if ($selectie == "prioriteit") {
                $query = [
                    $new = $query = "SELECT * FROM crud_agenda.agenda WHERE status != 'n' AND gebruiker = '$user' ORDER BY prioriteit DESC",
                    $old = "SELECT * FROM crud_agenda.agenda WHERE status = 'n' AND gebruiker = '$user' ORDER BY prioriteit DESC"
                ];

                return $query;
            } else if ($selectie == "status") {
                $query = [
                    $new = "SELECT * FROM crud_agenda.agenda WHERE status != 'n' AND gebruiker = '$user' ORDER BY status ASC",
                    $old = "SELECT * FROM crud_agenda.agenda WHERE status = 'n' AND gebruiker = '$user' ORDER BY status ASC"
                ];

                return $query;
            } else {
                $query = [
                    $new = "SELECT * FROM crud_agenda.agenda WHERE status != 'n' AND gebruiker = '$user'",
                    $old = "SELECT * FROM crud_agenda.agenda WHERE status = 'n' AND gebruiker = '$user'"
                ];

                return $query;
            }
        }

        public function lineBreak($string){
        // replace <br> with newlines
        return str_replace("&lt;br&gt;", "<br>", $string);
        }
    }
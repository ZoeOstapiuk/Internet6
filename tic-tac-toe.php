<?php
    $field = $_POST["field"];
    $result = check_if_end($field);

    $point = 0; // -1 - user wins, -2 - server wins, any - move
    if ($result == 0) {
        if (even($field)) {
            $point = -3;      
        } else {
            $point = server_move($field);
            $row = intval($point / 3); 
            $col = $point - $row * 3;
            $field[$row][$col] = -1;

            $result = check_if_end($field);
            if ($result == 1) $point = -1;
            else if ($result == -1) $point = -2;
        }

    } else if ($result == 1) {
        $point = -1;
    } else if ($result == -1) {
        $point = -2;
    }
    echo $point;

    function even($field) {
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($field[$i][$j] == 0) {
                    return false;
                }
            }
        }
        return true;
    }

    function check_if_end($field) {
        $diagonals = diagonals($field);
        if ($diagonals == 0) {
            $rows = check_rows($field);
            if ($rows == 0) {
                return check_cols($field);
            }
            return $rows;
        }
        return $diagonals;
    }

    function check_rows($field) {
        for ($i = 0; $i < 3; $i++) {
            $sum = 0;
            for ($j = 0; $j < 3; $j++) {
                $sum += $field[$i][$j];
            }
            if ($sum == 3) {
                return 1; // user wins
            } else if ($sum == -3) {
                return -1; // server wins
            }
        }
        return 0; // nobody wins
    }

    function check_cols($field) {
        for ($j = 0; $j < 3; $j++) {
            $sum = 0;
            for ($i = 0; $i < 3; $i++) {
                $sum += $field[$i][$j];
            }
            if ($sum == 3) {
                return 1; // user wins
            } else if ($sum == -3) {
                return -1; // server wins
            }
        }
        return 0; // nobody wins
    }

    function diagonals($field) {
        $main = main_diagonal($field);
        if ($main == 0) {
            return anti_diagonal($field);
        }
        return $main;
    }

    function main_diagonal($field) {
        // 0 - no diagonal
        // 1 - user diagonal
        // -1 - server diagonal
        $check_sum = $field[0][0] + $field[1][1] + $field[2][2];
        return ($check_sum == 3 ? 1 : ($check_sum == -3 ? -1 : 0));
    }

    function anti_diagonal($field) {
        // 0 - no diagonal
        // 1 - user diagonal
        // -1 - server diagonal
        $check_sum = $field[0][2] + $field[1][1] + $field[2][0];
        return ($check_sum == 3 ? 1 : ($check_sum == -3 ? -1 : 0));
    }

    function server_move($field) {
        $position = rand(0, 8);
        $row = intval($position / 3); 
        $col = $position - $row * 3;
        if ($field[$row][$col] == 0) {
            return $position;
        }
        return server_move($field);
    }
?>
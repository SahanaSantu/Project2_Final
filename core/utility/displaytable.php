<?php

class htmlTable
{
    public static function displaytable($array)
    {
        $tableGen = '<table border="1"cellpadding="10">';
        $tableGen .= '<tr>';
       //this grabs the first element of the array so we can extract the field headings for the table
               $referingPage = $_REQUEST['page'];
        foreach ($array[1] as $key => $value) {
          //  $tableGen .= '<th>' '</th>';
            $tableGen .= '<th>' . htmlspecialchars($key) . '</th>';

        }
        $tableGen .= '</tr>';
        foreach ($array as $record) {
            $tableGen .= '<tr>';
            foreach ($record as $key => $value) {
                if ($key == 'id') {
                 $tableGen .= '<td><a href="index.php?page=' . $referingPage . '&action=show&id=' . $value . '">View</a></td>';
                    
                } else {
                    $tableGen .= '<td>' . $value . '</td>';
                }
            }
            $tableGen .= '</tr>';
        }
        $tableGen .= '</table>';
        return $tableGen;
    }
}

?>   
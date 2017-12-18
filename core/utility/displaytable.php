<?php
namespace utility;
//class to display tables
class displaytable
{
    public static function showTable($array)
    {
        if(count($array)>0)
        {
        $tableGen = '<table border="1"cellpadding="10" class="table table-striped">';
        $tableGen .= '<tr>';
       //this grabs the first element of the array so we can extract the field headings for the table
               $referingPage = $_REQUEST['page'];
             
        foreach ($array[0] as $key => $value) {
              $tableGen .= '<th>' . htmlspecialchars($key) . '</th>';

        }
        $tableGen .= '</tr>';
        foreach ($array as $record) {
            $tableGen .= '<tr>';
            foreach ($record as $key => $value) {
                if ($key == 'id' && $_REQUEST['action']=='getById') {
                  //Generating link for editable page
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
       else
       {
         $tableGen = '<table border="1"cellpadding="10">';
         $tableGen .= '<th>'."No Entries".'</th>';
         $tableGen .= '</table>';
        return $tableGen;
       }
    }
}

?>   
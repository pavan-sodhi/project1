<?php
class table extends page
{

    public function get()
    {
        $filename = $_REQUEST['filename'];
        $f1 = fopen($filename,"r");

        $data = fgetcsv($f1);
        printfunc::printThis('<html><body><table>');
        while(($data =	fgetcsv($f1)) !== FALSE){
            //generate HTML
            printfunc::printThis('<tr>');
            foreach($data as $cell){
                printfunc::printThis('<td>' . htmlspecialchars($cell) . '</td>');
            }
            printfunc::printThis('</tr>');
        }
        fclose($f1);
        printfunc::printThis('</table></body></html>');


        /*$row = 1;
        if (($handle = fopen("uploads/" . $_REQUEST['file'], "r")) !== FALSE)
        {

            echo '<table border="1">';

            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
            {
                $num = count($data);
                if ($row == 1)
                    {
                    echo '<thead><tr>';
                    }
                else
                    {
                    echo '<tr>';
                    }

                for ($i=0; $i < $num; $i++)
                {
    //                echo $data[$i] . "<br />\n";
                    if(empty($data[$i]))
                    {
                        $value = "&nbsp;";
                    }
                    else
                    {
                        $value = $data[$i];
                    }
                    if ($row == 1)
                        {
                        echo '<th>'.$value.'</th>';
                        }
                    else
                        {
                        echo '<td>'.$value.'</td>';
                        }
                }

                if ($row == 1)
                {
                    echo '</tr></thead><tbody>';
                }
                else
                {
                    echo '</tr>';
                }
                $row++;
            }

            echo '</tbody></table>';
            fclose($handle);
        }*/
    }//get
}
?>
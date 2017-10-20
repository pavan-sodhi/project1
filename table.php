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
        $this->html .=  '<a href="/~ps355/project1/project1/index.php?page=upload"> Click here to upload more csv files </a><br>';


    }//get
}
?>
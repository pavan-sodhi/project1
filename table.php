<?php

class table extends page{
    public function get(){
        //Take file variable from header function in upload form class
        $filename = $_REQUEST['filename'];
        //Open specified file in URL
        $row = 1;
        if (($handle = fopen("uploads/".$filename,"r")) !== FALSE){
            echo '<table border="1">';
            //Assign the opened csv file to data variable
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                //count the data variable and assign it to a variable
                $num = count($data);
                //create the tableheader if the first row, otherwise just create the row
                if ($row == 1){
                    echo '<thead><tr>';
                } else {
                    echo '<tr>';
                }
                //enter data into cells
                for ($i=0; $i < $num; $i++){
                    if(empty($data[$i])) {
                        $value = "&nbsp;";
                    } else {
                        $value = $data[$i];
                    }
                    if ($row == 1) {
                        echo '<th>'.$value.'</th>';
                    } else {
                        echo '<td>'.$value.'</td>';
                    }
                }
                //close the row
                if ($row == 1) {
                    echo '</tr></thead><tbody>';
                } else {
                    echo '</tr>';
                }
                $row++;
            }
            echo '</tbody></table>';
            fclose($handle);
        }
    }
}
?>
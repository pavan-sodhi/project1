<?php
class htmltags
{

    static public function headingOne($text)
    {
        return '<h1><b><i>' . $text . '</i></b></h1>';
    }

    static public function message($text)
    {
        return '<span class="error">' . $text . '</span>';
    }

}



?>
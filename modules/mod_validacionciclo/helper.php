<?php
class validacionCiclo
{
    public static function getCycleByUserID($params)
    {
        $db = JFactory::getDbo();
        $database =& JFactory::getDBO();
        $user = JFactory::getUser();

        $query = "SELECT cb_ciclo FROM `jos_comprofiler` where user_id = " .$user->id. ";";
        $database->setQuery($query);

        // Cheque si viene el dato (Si no, no está cargado, no muestro el campo de ciclo)
        $result = $database->loadResult();
        if(isset($result) == false || $result == 0)
        {
            return '';
        }

        $pre = '<span style="font-size: 20px; font-weight: 700; margin: 0; padding: 0 15px; line-height: 50px; height: 50px; color: #555555; background: #ededed; xt-transform: uppercase; border-top: 1px solid #fff; border-bottom: 1px solid #fff; box-shadow: inset 0 1px 0 #e1e1e1, inset 0 -1px 0 #e1e1e1;">Ciclo ';
        $post = '</span>';

        // Si el año de hoy es mayor al cargado en la DB, muestro ciclo + warning
        if(date("Y") > $result )
        {
            $doc = new DOMDocument();
            $tot = $pre . $result . '  <img src="/images/warning.png" alt="" style="width: 10%;">' . $post;
            $doc->loadHTML($tot);
            return $doc->saveHTML();
        }
        else
        {
            // Si no, solo muestro el ciclo
            $doc = new DOMDocument();
            $tot = $pre . $result . $post;
            $doc->loadHTML($tot);
            return $doc->saveHTML();
        }
    }
}

<?php
class nroJugador
{
    public static function getplayerNumberByUserID($params)
    {
        $db = JFactory::getDbo();
        $database =& JFactory::getDBO();
        $user = JFactory::getUser();

        $query = "SELECT cb_nrodejugador FROM `jos_comprofiler` where user_id = " .$user->id. ";";
        $database->setQuery($query);
        $result = $database->loadResult();

        // chequeo si $database->loadResult(); volvió vacia, si es así, no tiene cargado el número de jugador
	if(isset($result) == false || $result == 0)
	{
		//El Nro jugador no esta dado de alta
                $doc = new DOMDocument();
                $doc->loadHTML('<a href="https://docs.google.com/forms/d/e/1FAIpQLSc0Wyy7adG05u67cJnHxyMqMQ5GxZUWJHw2q7elRul3ick-qA/viewform" target="_blank" rel="noopener noreferrer" title="Registrate!"><img src="/images/boton2.png" alt=""></a>');
                return $doc->saveHTML();
	}
	else
	{
                //El Nro jugador esta dado de alta
$doc = new DOMDocument();
$pre = '<span style="font-size: 20px; font-weight: 700; margin: 0; padding: 0 15px; line-height: 50px; height: 50px; color: #555555; background: #ededed; xt-transform: uppercase; border-top: 1px solid #fff; border-bottom: 1px solid #fff; box-shadow: inset 0 1px 0 #e1e1e1, inset 0 -1px 0 #e1e1e1;">Tu n&uacute;mero de jugador es ';
$post = '</span>';
$doc->loadHTML($pre . $result . $post);
return $doc->saveHTML();
	}
    }
}

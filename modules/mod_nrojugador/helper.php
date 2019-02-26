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
                $result = 'Tu número de jugador es el ' . $result;
                return $result;
	}
    }
}

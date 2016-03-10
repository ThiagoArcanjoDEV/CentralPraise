<?php
abstract class actionAgenda{
	public static function search($search = ""){
		$Agenda = AgendaDAO::search($search);
		return $Agenda;
	}
	
	public static function mountCalendar(){
		$Agendas = AgendaDAO::search();
		
		$results = array();
		foreach($Agendas AS $Agenda)
		{
			$agenda = array();
			$agenda['id'] = $Agenda->getID();
                        $agenda['title'] = $Agenda->getNome();
                        $agenda['start'] = $Agenda->getData();
                        $agenda['tip'] = '('.$Agenda->getData('HH:ii').') '.$Agenda->getObs();
			$results[] = $agenda;
		}
		
		return $results;
	}
}
?>

<?php
class CustomShell extends AppShell {
	public $uses = array('Incident');

	public function main() {
		$incidents = $this->Incident->find('all', array(
			'conditions' => array('Incident.stackhash' => '')
		));
		$this->out('Found ' . count($incidents) . ' incidents without a stackhash');
		foreach ($incidents as $incident) {
			$this->out('Updating incident #' . $incident['Incident']['id']);
			$this->Incident->read(null, $incident['Incident']['id']);
			$stacktrace = json_decode($incident['Incident']['stacktrace'], true);
			$stackhash = $this->Incident->getStackHash($stacktrace);
			$this->Incident->saveField("stackhash", $stackhash);
			$this->out('Hash is ' . $stackhash);
		}
	}
}

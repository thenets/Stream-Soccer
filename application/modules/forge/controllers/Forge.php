<?php

class Forge extends CI_Controller {
	public function index () {
		$this->load->view('forge/main');
	}

	public function databaseBackup () {
		$this->load->dbutil();

		// Create dirs if not exist
		if (!file_exists('data')) {
			mkdir('data', 0777, true);
		}
		if (!file_exists('data/backup')) {
			mkdir('data/backup', 0777, true);
		}

		// Remove old backup
		if (file_exists('data/backup/backup.zip')) {
			unlink('data/backup/backup.zip');
		}

        // Create backup
		$command  = "mysqldump -u {$this->db->username} -p{$this->db->password} -h {$this->db->hostname} {$this->db->database} > ".getcwd()."/data/backup/backup.sql";
		$command .= '&& cd '.getcwd().'/data/backup/ && zip backup.zip backup.sql';
		exec($command, $o);
		unlink('data/backup/backup.sql');

        return 'Backup complete!';
	}


	public function databaseRestore () {
		$this->load->dbforge();

		// Check if a backup file doesn't exist
		if (!file_exists('data/backup/backup.zip')) {
			return 'ERROR! A backup file doesn\'t exist!';
		}

		// Drop all database
		foreach ($this->db->list_tables() as $key => $table) {
			$this->dbforge->drop_table($table,TRUE);
		}

		// Unzip backup
		exec('unzip '.getcwd().'/data/backup/backup.zip -d '.getcwd().'/data/backup/', $exec_out);

        // Restore backup file
		$command = "mysql -u {$this->db->username} -p{$this->db->password} -h {$this->db->hostname} {$this->db->database} < ".getcwd()."/data/backup/backup.sql";
		exec($command, $o);

        return 'Restore complete!';
	}

	public function database ($action) {
		$out = new stdClass();

		if ($action=='backup') {
			$out->msg = $this->databaseBackup();
		}

		else if ($action=='restore') {
			$out->msg = $this->databaseRestore();
		}

		else {
			$out->msg = "ERROR! Command '$action' not found!";
		}

		$this->output
		    ->set_content_type('application/json')
		    ->set_output(json_encode($out));
	}
}
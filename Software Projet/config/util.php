<?php

function db_escape($str, $trim=true) {
	global $db;
	if($trim) {
		$str = trim($str);
	}
	return $db->real_escape_string($str);
}

class Status {
	const INFO = 0;
	const ERROR = 1;
	
	public $messages = [];
	
	public function info($msg) {
		$this->msg($msg, self::INFO);
	}
	
	public function error($msg) {
		$this->msg($msg, self::ERROR);
	}
	
	public function msg($msg, $type) {
		$this->messages[] = [
			'type'=>$type,
			'text'=>$msg
		];
	}
	
	public function success() {
		foreach($this->messages as $m) {
			if($m['type'] == self::ERROR) {
				return false;
			}
		}
		return true;
	}
	
	public function html() {
		$out = '';
		foreach($this->messages as $m) {
			$css = ($m['type']==self::INFO)?'msg_ok':'msg_err';
			$out .= "<p class='icon ok_icon $css'>".$m['text']."</p>";
		}
		return $out;
	}
}
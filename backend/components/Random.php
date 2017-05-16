<?php
namespace app\components;
class Random{
	  public static function randName() {
		
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEF".date("d").date("m").date("y").date("i").date("s").date("H")."GHIJKLMNOPQRSTUWXYZ0123456789";
		$id = array();
		$alphaLength = strlen($alphabet) - 1;
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$id[] = $alphabet[$n];
		}

		for ($a = 0; $a < 4; $a++) {
			$n = rand(0, $alphaLength);
			$id2[] = $alphabet[$n];
		}

		for ($b = 0; $b < 4; $b++) {
			$n = rand(0, $alphaLength);
			$id3[] = $alphabet[$n];
		}

		for ($c = 0; $c < 4; $c++) {
			$n = rand(0, $alphaLength);
			$id4[] = $alphabet[$n];
		}

		for ($c = 0; $c < 12; $c++) {
			$n = rand(0, $alphaLength);
			$id5[] = $alphabet[$n];
		}
		return $randId=strtoupper(implode($id)."_".implode($id2)."_".implode($id3));
	}

	public static function reportId(){
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEF".date("d").date("m").date("y").date("i").date("s").date("H")."GHIJKLMNOPQRSTUWXYZ0123456789";
		$id = array();
		$alphaLength = strlen($alphabet) - 1;
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$id[] = $alphabet[$n];
		}

		for ($a = 0; $a < 4; $a++) {
			$n = rand(0, $alphaLength);
			$id2[] = $alphabet[$n];
		}

		for ($b = 0; $b < 4; $b++) {
			$n = rand(0, $alphaLength);
			$id3[] = $alphabet[$n];
		}

		for ($c = 0; $c < 4; $c++) {
			$n = rand(0, $alphaLength);
			$id4[] = $alphabet[$n];
		}

		for ($c = 0; $c < 12; $c++) {
			$n = rand(0, $alphaLength);
			$id5[] = $alphabet[$n];
		}
		return $randId=strtoupper(implode($id)."".implode($id2));
	}
}
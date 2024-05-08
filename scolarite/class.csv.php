<?php
class CSV
{
	static function export($datas,$filename)
	{
		header('Content-Description: File Transfer');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="'.$filename.'.csv"');
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: no-cache');
		echo "\xEF\xBB\xBF";
		$i = 0;
		foreach ($datas as $v) {
			if ($i==0) {
				echo '"'.implode('";"', array_keys($v)).'"'."\n";
			}
			echo '"'.implode('";"',$v).'"'."\n";
			$i++;
		}
	}
}
?>
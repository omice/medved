<?php

interface Interface_Abstract_Collection {

	public function getExportPrefix();

	public static function staticExport($methodName, $arguments = NULL);

}
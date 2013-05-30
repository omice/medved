<?php

interface Interface_StaticCollection {

	public function getExportPrefix();

	public static function staticExport($methodName, $arguments = NULL);

}
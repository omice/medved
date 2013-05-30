<?php
interface Interface_TreeCollection extends Interface_Abstract_Collection{

	public function getExportMap();

	public function getParentKeyName();

	public function getNodeById($id);
}
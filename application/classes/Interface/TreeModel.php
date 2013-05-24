<?php
interface Interface_TreeModel{

	public function getExportMap();

	public function getParentKeyName();

	public function getParentKeyValue();

	public function getPKName();

	public function getPKValue();

	public function getTableName();
}
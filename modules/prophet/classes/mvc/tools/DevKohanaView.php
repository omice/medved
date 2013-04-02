<?php
class DevKohanaView extends View{

	public static function factory($file = NULL, array $data = NULL)
	{
		return new DevKohanaView($file, $data);
	}

	public function set_filename($file)
	{

		if (Kohana::$environment === Kohana::DEVELOPMENT){
			echo "<!-- ". (Kohana::find_file('views', $file)) ." -->";
		}

		parent::set_filename($file);
	}

}
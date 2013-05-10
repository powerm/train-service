 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *City_model_test Class
  *
  *@category mobile
  *@author dinsy
  */
  
 class City_model_test extends CI_Controller {
	/**
	 *Show  index page
	*/
	function __construct()
	{
		parent::__construct();
		
		//$this->output->enable_profiler(TRUE);
		
		require(UNITEST_DATAPATH.'city_model_data.php');
		$this->load->model('city_model');
		$this->load->library('unit_test');
		$this->cities = $cities;
		
	}
	
	function index()
	{
		$this->output->set_content_type('text/plain');
		//empty city table 
		echo $this->city_model->empty_cities();


		//insert user defined data to city table
		foreach ($this->cities as $city) {
			$this->city_model->insert_city($city);
		}

		//get named city information array
		$my_city  = $this->city_model->get_city('西安');

		//view the select result
		print_r($my_city);
		echo "\n";

		$my_city['name'] = '北京';
		$this->city_model->update_city($my_city);
		$my_city  = $this->city_model->get_city('北京');
		print_r($my_city);
		echo "\n";

		$my_city['name'] = '西安';
		$this->city_model->update_city($my_city);
		$my_city  = $this->city_model->get_city('西安');
		print_r($my_city);
		echo "\n";
		
		print_r($my_cities);
		//echo $this->unit->report();
	}
}

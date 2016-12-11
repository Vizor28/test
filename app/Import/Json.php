<?
namespace App\Import;

class Json implements ImportInterface
{
	
	protected $path;
	
	public function __construct(){
		
		global $config;
		$this->path=$config->project_dir.$config->import_direction;
		
	}
	
	public function getCategories(){
		
		$json = file_get_contents($this->path."categories.json");		
		return json_decode($json,true);
		
	}	
	
	public function getNews(){
		
		$json = file_get_contents($this->path."news.json");		
		return json_decode($json,true);
		
	}
	
	public function getBlogs(){
		
		$json = file_get_contents($this->path."blogs.json");		
		return json_decode($json,true);
		
	}
	
	public function getForums(){
		
		$json = file_get_contents($this->path."forums.json");			
		return json_decode($json,true);
		
	}
	
}


?>
<?

namespace App;

use App\Import\ImportInterface;

class Import
{
	protected $db;
	
	public function __construct()
	{
		global $config;
		
		$this->db = new \PDO('mysql:host='.$config->host.';dbname='.$config->dbname, $config->username, $config->userpassword);
		
	}
	
	public function setImport(ImportInterface $import)
	{
		$categories = $import->getCategories();
		
		$this->setCategories($categories,0);
		
		$articles = $import->getNews();
		$this->setNews($articles);
		
		$articles = $import->getBlogs();
		$this->setNews($articles);
		
		$articles = $import->getForums();
		$this->setNews($articles);
		
		
		//echo "<pre>";print_r($news);echo "</pre>";
		
	}
	protected function setNews($articles)
	{
		
		foreach($articles as $article){
			
			if(!empty($article["title"]) && !empty($article["body"]) && !empty($article["category"])){
				
				$data = array();
				$data["title"] = trim($article["title"]);
				$data["body"] = trim($article["body"]);
				
				$stmt = $this->db->query("SELECT id,alias FROM categories WHERE alias ='".$article["category"]."'");
				$stmt->setFetchMode(\PDO::FETCH_ASSOC);
				
				if($row = $stmt->fetch()){ 
					
					$data["category_id"] = $row["id"];
					
					$stmt = $this->db->prepare("INSERT INTO articles (title, body, category_id) values (:title, :body, :category_id)");
					$stmt->execute($data);
				}
			}
		}	
	}
	
	
	
	protected function setCategories($categories,$parent_id)
	{
		
		foreach($categories as $category){
			
			$data = array();
			
			$data["name"] = trim($category["name"]);
			$data["alias"] = trim($category["alias"]);
			$data["type"] = (isset($category["type"]) && $category["type"]>0 ) ? $category["type"] : 0;
			$data["ord"] = (isset($category["ord"]) && $category["ord"]>0 ) ? $category["ord"] : 0;
			$data["parent_id"] = $parent_id;
		
			
			$stmt = $this->db->query("SELECT id,alias FROM categories WHERE alias ='".$category["alias"]."'");
			$stmt->setFetchMode(\PDO::FETCH_ASSOC);
			if($row = $stmt->fetch()) {  
				$category_id=$row["id"];
				
				$stmt = $this->db->prepare("UPDATE categories SET 
					name = :name, 
					alias = :alias, 
					type = :type, 
					ord = :ord, 
					parent_id = :parent_id,
					WHERE id = :id
				");
					
				$data["id"]=$category_id;
				
				$stmt->execute($data);
				
				
			}else{
				
				$stmt = $this->db->prepare("INSERT INTO categories (name, alias, type, ord, parent_id) values (:name, :alias, :type, :ord, :parent_id)");
				$stmt->execute($data);
				
				$category_id = $this->db->lastInsertId();
				
			}
			
			if(isset($category["children"]) && !empty($category["children"])){
				
				$this->setCategories($category["children"],$category_id);
				
			}
			
			//echo "<pre>";print_r($items);echo "</pre>";
		}	
	}
	
}



?>
<?
namespace App\Models;

use App\Models\Categories;

class Articles
{
	
	protected $db;
	
	public function __construct()
	{
		global $config;
		
		$this->db = new \PDO('mysql:host='.$config->host.';dbname='.$config->dbname, $config->username, $config->userpassword);
		
	}
	
	public function getArticlesByCategory($category){

        if(is_array($category)){

            $category = implode(",",$category);

        }
		
		$stmt = $this->db->query("
			SELECT a.id,a.title,a.body,c.alias AS cat_alias,c.parent_id AS cat_parent
			FROM articles AS a
			LEFT JOIN categories AS c
			ON c.id = a.category_id
			WHERE c.id IN ($category)
		");
		$stmt->setFetchMode(\PDO::FETCH_ASSOC);
		
		$items = array();

        $modelCat = new Categories();
		
		while($row = $stmt->fetch()){

            if($row["cat_parent"]>0){

                $row["alias"] = '/'.$modelCat->getCategoryById($row["cat_parent"])['alias'].'/'.$row["cat_alias"].'/'.$row['id'].'/';

            }
			
			$items[]=$row;

		}	
		
		return $items;
		
		
	}



	public function getArticle($id){

        $stmt = $this->db->query("SELECT id,title,body FROM articles WHERE id = $id");
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);


        $row = $stmt->fetch();


        return $row;


    }
	
	
	
}


?>
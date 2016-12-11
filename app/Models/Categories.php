<?
namespace App\Models;


class Categories
{
	
	protected $db;
	
	public function __construct()
	{
		global $config;
		
		$this->db = new \PDO('mysql:host='.$config->host.';dbname='.$config->dbname, $config->username, $config->userpassword);
		
	}
	
	public function getCategories()
	{
		
		$stmt = $this->db->query("SELECT id,name,alias,parent_id FROM categories ORDER BY id");
		$stmt->setFetchMode(\PDO::FETCH_ASSOC);
		
		$items = array();
		
		while($row = $stmt->fetch()){
			
			if($row["parent_id"]>0){
				
				$items[$row["parent_id"]]["children"][]=$row;
				
			}else{
				
				$items[$row["id"]]["category"]=$row;
				
			}
			
		}	
		
		return $items;
		
	}
	
	public function getCategoriesByCategory($alias)
	{
		$id = $this->getId($alias);
		
		$stmt = $this->db->query("SELECT id,name,alias FROM categories WHERE parent_id = $id");
		$stmt->setFetchMode(\PDO::FETCH_ASSOC);
		
		$items = array();
		
		while($row = $stmt->fetch()){
			
			$items[]=$row;
			
		}	
		
		return $items;
		
		
	}
    public function getCategoriesIdByCategory($alias)
    {

        $items = array();

        $items = $this->getCategoriesByCategory($alias);

        $id = array();

        foreach($items as $item){
            $id[]=$item["id"];
        }

        return $id;
    }


	
	public function getId($alias)
	{
		$id = 0;
		
		$stmt = $this->db->query("SELECT id FROM categories WHERE alias = '$alias'");
		$stmt->setFetchMode(\PDO::FETCH_ASSOC);
		
		if($row = $stmt->fetch()){
			
			$id = $row["id"];
			
		}	
		
		return $id;
	}

	public function getCategoryById($id){

        $stmt = $this->db->query("SELECT id,name,alias,parent_id FROM categories WHERE id = $id");
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);


        $row = $stmt->fetch();


        return $row;

    }
	
}


?>
<?
namespace App\Controllers;

use App\Models\Categories;
use App\Models\Articles;


class HomeController
{
	protected $params = array();
	
	public function __construct($params){
		
		$this->params = $params;
		
	}
	
	
	public function index(){
		
		global $config;
		
		$modelCat = new Categories();
		
		$categories = $modelCat->getCategories();
		
		require $config->project_dir.'/views/index.php';
		
	}
	
	public function articles(){

        global $config;
		
		$alias = explode("/", $this->params[0]);
		
		$modelArticles = new Articles();
		$modelCategories = new Categories();

        $bredcrambs = $this->getBredcrambs($alias);

		
		if(count($alias)>1){

            $cat_id = $modelCategories->getId($alias[1]);
			
			$articles = $modelArticles->getArticlesByCategory($cat_id);
			
		}else{



            $cat_id = $modelCategories->getCategoriesIdByCategory($alias[0]);
			
			$articles = $modelArticles->getArticlesByCategory($cat_id);
		
		}

        require $config->project_dir.'/views/articles.php';
		
	}
	
	public function article(){


        global $config;

        $alias = explode("/", $this->params[0]);
        $id = intval($this->params[1]);

        $modelArticles = new Articles();

        $bredcrambs = $this->getBredcrambs($alias);

        $article = $modelArticles->getArticle($id);

        if(empty($article)){

            $this->error();

            die();

        }

        require $config->project_dir.'/views/article.php';
		
	}
	
	
	public function error(){

		echo "error";
		echo "<pre>";print_r($this->params);echo "</pre>";
		
	}
	
	
	public function import(){
		
		
		$json = new \App\Import\Json();

		$import = new \App\Import();

		$import->setImport($json);
		
		echo "import";
		
	}


	public function getBredcrambs($alias){

        $modelCategories = new Categories();

        $br = array();
        $depth = array();

        if(is_array($alias)){

            foreach($alias as $link){

                $id = $modelCategories->getId($link);


                if(empty($id) || $id == 0 ){

                    $this->error();

                    die();

                    break;

                }else{


                    $item=$modelCategories->getCategoryById($id);
                    $depth[$item["parent_id"]] = $item["alias"];

                    if($item["parent_id"]>0){

                        $item["alias"] = $depth[0].'/'.$item["alias"];

                    }

                    $br[$item["parent_id"]] = $item;

                }

            }


        }




        return $br;
    }

}


?>
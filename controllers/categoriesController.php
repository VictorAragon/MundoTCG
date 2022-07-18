<?php
class categoriesController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() { 
        header("Location: ".BASE_URL);
    }

    public function enter($id){
        $dados = array();

        $products = new Products();
        $categories = new Categories();

        $dados["categoryName"] = $categories->getCategoryName($id);

        if(!empty($dados["categoryName"])){
            $currentPage = "1";
            $offset = "0";
            $limit = "3";

            if(!empty($_GET["p"])){
                $currentPage = $_GET["p"];
            }

            $offset = (($currentPage * $limit) - $limit);

            $filters = array("category"=>$id);
            
            $dados["categoryFilter"] = $categories->getCategoryTree($id);
            $dados["list"] = $products->getList($offset, $limit, $filters);
            $dados["totalItens"] = $products->getTotal($filters);
            $dados["numberOfPages"] = ceil($dados["totalItens"] / $limit);
            $dados["currentPage"] = $currentPage;

            $dados["idCategory"] = $id;

            $dados["categories"] = $categories->getList();
            $this->loadTemplate("categories", $dados);
        }else{
            header("Location: ".BASE_URL);
        }

    }

}
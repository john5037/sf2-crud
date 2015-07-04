<?php

namespace Demo\Bundle\ArticleBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\View\TwitterBootstrapView;

/**
 * Article controller.
 *
 */
class ArticleController extends Controller
{


    /**
     * Lists all Article
     *
     * @Route("/", name="articles")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
		$this->viewTwigData['hello']='Test';
        return $this->viewTwigData;
    }
    /**
     * List All Articles
     * @Route("/articleList",name="demo_articlebundle_articlelist")
     * @Method("POST")
     * @Template()
     */
	public function getArticleListAction() {
	   	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$offset = ($page-1)*$rows;
    	$result = array();
		$articleManagerList = $this->get('demo.article.manager')->getList($offset,$rows);
		
		if($articleManagerList['status']=='success') {
		//here we have to called manager class for Business Logic
		$result["rows"] = $articleManagerList['data'];
		
	    } else {
			$result["rows"]="No Record Found";
		}
		echo json_encode($result);
	  	exit;
    }  
    /**
     * Add Article Form
     * @Route("/articleAdd",name="demo_articlebundle_add")
     * @Method("POST")
     * @Template()
     */
     public function addArticleAction(Request $request)
     {
		$data['title']=trim($request->get('title'));
		$data['description']=trim($request->get('description'));
		$data['created_by']=trim($request->get('created_by'));
		$data['email']=trim($request->get('email'));
		// called a service for add article data
		
		$articleManager=  $this->get('demo.article.manager')->addArticleData($data);
		echo json_encode($articleManager['msg']);
		exit;
	 }
	  
	 /**
     * Edit Article Form
     * @Route("/articleEdit",name="demo_articlebundle_edit")
     * @Method("POST")
     * @Template()
     */
     public function editArticleAction(Request $request)
     {
		 // Set Variables for Update
		 $data['title']=trim($request->get('title'));
		 $data['description']=trim($request->get('description'));
		 $data['created_by']=trim($request->get('created_by'));
		 $data['email']=trim($request->get('email'));
		 $data['articleId']= trim($request->get('articleId'));
		 $articleManager=  $this->get('demo.article.manager')->editArticleData($data);
		 echo json_encode($articleManager['msg']);
		 exit;
	 }
	 /**
     * Delete Article 
     * @Route("/articleDelete",name="demo_articlebundle_delete")
     * @Method("POST")
     * @Template()
     */
     public function deleteArticleAction(Request $request)
     {
		 $articleManager=  $this->get('demo.article.manager')->deleteArticle(trim($request->get('articleId')));
		 echo json_encode($articleManager['msg']);
		 exit;
	 } 
}


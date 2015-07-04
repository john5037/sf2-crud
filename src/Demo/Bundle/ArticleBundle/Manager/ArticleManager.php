<?php

namespace Demo\Bundle\ArticleBundle\Manager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManager;

class ArticleManager 
{
	public function __construct(ContainerInterface  $serviceContainer,EntityManager $em){
		$this->serviceContainer = $serviceContainer;
		$this->em = $em;
	}
	/**
	 *  This Function used For Display Listing
	 **/
	public function getList($offset,$rows)
	{
		$data=$this->em->getRepository('DemoArticleBundle:Article')->getList($offset,$rows);
		if($data){
		  $returnData = array('status'=>'success','data'=>$data);
		} else {
			$returnData = array('status'=>'failed','msg'=>'No Record Found');
		}
		return $returnData;
    }
    /**
	 *  This Function used For Insert Data
	 **/
	public function addArticleData($data)
	{
		$data=$this->em->getRepository('DemoArticleBundle:Article')->addData($data);
		if($data){
		  $returnData = array('status'=>'success','msg'=>'data inserted successfully');
		} else {
			$returnData = array('status'=>'failed','msg'=>'Error Insert the data');
		}
		return $returnData;
    }
    /**
	 *  This Function used For Edit Data
	 **/
	public function editArticleData($data)
	{
		$data=$this->em->getRepository('DemoArticleBundle:Article')->addData($data);
		if($data){
		  $returnData = array('status'=>'success','msg'=>'data updated successfully');
		} else {
			$returnData = array('status'=>'failed','msg'=>'Error Update the data');
		}
		return $returnData;
    }
    public function deleteArticle($articleId){
		$data=$this->em->getRepository('DemoArticleBundle:Article')->deleteArticle($articleId);
		if($data){
		  $returnData = array('status'=>'success','msg'=>'Article Deleted successfully');
		} else {
			$returnData = array('status'=>'failed','msg'=>'Error Update the data');
		}
		return $returnData;
	}	
}

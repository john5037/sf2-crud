<?php

namespace Demo\Bundle\ArticleBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends EntityRepository
{
	public function getList($offSet,$rows)
	{
		
		return $this->createQueryBuilder('a')
					->select('a.id','a.title','a.description','a.createdBy as created_by','a.email')
					->setFirstResult($offSet)
					->setMaxResults($rows)
					->addOrderBy('a.id', 'DESC')
					->getQuery()
					//->getSql();
					->getArrayResult();
	}
	public function addData($data)
	{
		// here we check that if record have article id and if its set then update otherwise add it
		$em = $this->getEntityManager();
		
		$articleObj = ($data['articleId']!='') ? $em->getRepository('DemoArticleBundle:Article')->find($data['articleId']): new Article();
		
		//$articleObj = new Article();
		$articleObj->setTitle($data['title']);
		$articleObj->setDescription($data['description']);
		$articleObj->setEmail($data['email']);
		$articleObj->setCreatedBy($data['created_by']);
		$em->persist($articleObj);
		$em->flush();
		return $articleObj;
	}
	
	public function deleteArticle($article_id)
	{
		return $this->createQueryBuilder('a')
		->delete()
		->where('a.id = :articleId')
		->setParameter(':articleId', $article_id)
		->getQuery()
		->execute();

	}
}

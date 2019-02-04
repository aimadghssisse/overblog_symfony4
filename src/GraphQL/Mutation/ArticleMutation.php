<?php
/**
 * Created by PhpStorm.
 * User: oualid
 * Date: 11/28/18
 * Time: 12:26 PM
 */

namespace App\GraphQL\Mutation;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;

class ArticleMutation  implements MutationInterface,AliasedInterface
{

    private $entityManager;

    /**
     * ArticleMutation constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function createArticle(string $title){

        //$entityManager = $this->getDoctrine()->getManager();


        $article = new Article();
        $article->setTitle($title);


        $this->entityManager->persist($article);
        $this->entityManager->flush();

       // $entityManager->persist($article);
        //$entityManager->flush();


        return $article;
    }


    public static function getAliases()
    {
        // TODO: Implement getAliases() method.

        return [

            'createArticle' => 'newarticle'
        ];
    }
}
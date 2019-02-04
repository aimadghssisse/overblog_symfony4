<?php
/**
 * Created by PhpStorm.
 * User: oualid
 * Date: 11/28/18
 * Time: 1:55 PM
 */

namespace App\GraphQL\Mutation;


use App\Entity\Comment;
use Doctrine\ORM\EntityManagerInterface;

use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;

class CommentMutation  implements MutationInterface,AliasedInterface
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

    public function createComment(string $body){

       // $entityManager = $this->getDoctrine()->getManager();


        $coment = new Comment();
        $coment->setBody($body);

        $this->entityManager->persist($coment);

        $this->entityManager->flush();

        return $coment;
    }



    public static function getAliases()
    {
        // TODO: Implement getAliases() method.

        return [

            'createComment' => 'newcomment'

        ];


    }
}
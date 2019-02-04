<?php
/**
 * Created by PhpStorm.
 * User: oualid
 * Date: 11/27/18
 * Time: 1:06 PM
 */

namespace App\GraphQL\Resolver;


use App\Repository\CommentRepository;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class CommentResolver implements AliasedInterface,ResolverInterface
{


    /**
     * @var CommentRepository
     */private $commentRepository;



    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository=$commentRepository;
    }

    public function resolve()
    {
        return $this->commentRepository->findAll();
    }



    /**
     * Returns methods aliases.
     *
     * For instance:
     * array('myMethod' => 'myAlias')
     *
     * @return array
     */
    public static function getAliases()
    {
        // TODO: Implement getAliases() method.

        return [
            'resolve' => 'Comment',
        ];
    }
}
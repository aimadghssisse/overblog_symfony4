<?php
/**
 * Created by PhpStorm.
 * User: oualid
 * Date: 11/27/18
 * Time: 1:07 PM
 */

namespace App\GraphQL\Resolver;


use App\Repository\ArticleRepository;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ArticleResolver implements AliasedInterface,ResolverInterface
{



    /**
     * @var ArticleRepository
     */private $articleRepository;



    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository=$articleRepository;
    }

    public function resolve()
    {

        return $this->articleRepository->findAll();
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
            'resolve' => 'Article'
        ];
    }
}
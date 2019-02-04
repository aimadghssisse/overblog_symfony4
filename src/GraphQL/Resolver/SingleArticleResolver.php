<?php
/**
 * Created by PhpStorm.
 * User: oualid
 * Date: 12/17/18
 * Time: 7:44 PM
 */

namespace App\GraphQL\Resolver;

use Overblog\GraphQLBundle\Definition\Argument;

use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;
use App\Repository\ArticleRepository;

class SingleArticleResolver implements AliasedInterface,ResolverInterface
{

    /**
     * @var ArticleRepository
     */private $articleRepository;


    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository=$articleRepository;
    }


    public function resolve(Argument $args)
    {
        return $this->articleRepository->find($args['id']);
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
            'resolve' => 'SingleArticle'
        ];
    }
}
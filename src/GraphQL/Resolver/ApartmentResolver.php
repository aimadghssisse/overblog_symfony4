<?php
/**
 * Created by PhpStorm.
 * User: oualid
 * Date: 11/26/18
 * Time: 1:10 PM
 */

namespace App\GraphQL\Resolver;


use App\Repository\ApartmentRepository;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class ApartmentResolver implements ResolverInterface,AliasedInterface
{

    /**
     * @var ApartmentRepository
     */private $apartmentRepository;


    //private $em;

    public function __construct(ApartmentRepository $apartmentRepository)
    {
        $this->apartmentRepository=$apartmentRepository;
    }

    public function resolve(Argument $args)
    {
        return $this->apartmentRepository->find($args['id']);
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
            'resolve' => 'Apartment',
        ];
    }
}
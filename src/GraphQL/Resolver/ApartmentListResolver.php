<?php
/**
 * Created by PhpStorm.
 * User: oualid
 * Date: 11/27/18
 * Time: 7:36 AM
 */

namespace App\GraphQL\Resolver;

use App\Repository\ApartmentRepository;

use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class ApartmentListResolver implements ResolverInterface, AliasedInterface
{


    /**
     * @var ApartmentRepository
     */private $apartmentRepository;



    public function __construct(ApartmentRepository $apartmentRepository)
    {
        $this->apartmentRepository=$apartmentRepository;
    }

    public function resolve()
    {
        return $this->apartmentRepository->findAll();
    }

    public static function getAliases()
    {
        return [
            'resolve' => 'ApartmentList'
        ];
    }
}
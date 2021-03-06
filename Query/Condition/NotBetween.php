<?php declare(strict_types = 1);

namespace Artprima\QueryFilterBundle\Query\Condition;

use Artprima\QueryFilterBundle\Query\Filter;
use Doctrine\ORM\QueryBuilder;

/**
 * Class NotBetween
 *
 * @author Denis Voytyuk <ask@artprima.cz>
 *
 * @package Artprima\QueryFilterBundle\Query\Condition
 */
class NotBetween implements ConditionInterface
{
    public function getExpr(QueryBuilder $qb, int $index, Filter $filter)
    {
        $expr = $filter->getField().' NOT BETWEEN '.':x'.$index.' AND '.':y'.$index;
        $qb->setParameter('x'.$index, $filter->getX() ?? '');
        $qb->setParameter('y'.$index, $filter->getY() ?? '');

        return $expr;
    }
}
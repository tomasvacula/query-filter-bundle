<?php declare(strict_types = 1);

namespace Artprima\QueryFilterBundle\Query\Condition;

use Artprima\QueryFilterBundle\Query\Filter;
use Doctrine\ORM\QueryBuilder;

/**
 * Class Lt
 *
 * @author Denis Voytyuk <ask@artprima.cz>
 *
 * @package Artprima\QueryFilterBundle\Query\Condition
 */
class Lt implements ConditionInterface
{
    public function getExpr(QueryBuilder $qb, int $index, Filter $filter)
    {
        $expr = $qb->expr()->lt($filter->getField(), '?'.$index);
        $qb->setParameter($index, $filter->getX() ?? '');

        return $expr;
    }
}
<?php

namespace App\Http\Model\Base;

use \Exception;
use \PDO;
use App\Http\Model\Reserver as ChildReserver;
use App\Http\Model\ReserverQuery as ChildReserverQuery;
use App\Http\Model\Map\ReserverTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'reserver' table.
 *
 *
 *
 * @method     ChildReserverQuery orderByCodereservation($order = Criteria::ASC) Order by the codeReservation column
 * @method     ChildReserverQuery orderByNumtypecontainer($order = Criteria::ASC) Order by the numTypeContainer column
 * @method     ChildReserverQuery orderByQtereserver($order = Criteria::ASC) Order by the qteReserver column
 *
 * @method     ChildReserverQuery groupByCodereservation() Group by the codeReservation column
 * @method     ChildReserverQuery groupByNumtypecontainer() Group by the numTypeContainer column
 * @method     ChildReserverQuery groupByQtereserver() Group by the qteReserver column
 *
 * @method     ChildReserverQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildReserverQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildReserverQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildReserverQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildReserverQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildReserverQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildReserverQuery leftJoinTypecontainer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Typecontainer relation
 * @method     ChildReserverQuery rightJoinTypecontainer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Typecontainer relation
 * @method     ChildReserverQuery innerJoinTypecontainer($relationAlias = null) Adds a INNER JOIN clause to the query using the Typecontainer relation
 *
 * @method     ChildReserverQuery joinWithTypecontainer($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Typecontainer relation
 *
 * @method     ChildReserverQuery leftJoinWithTypecontainer() Adds a LEFT JOIN clause and with to the query using the Typecontainer relation
 * @method     ChildReserverQuery rightJoinWithTypecontainer() Adds a RIGHT JOIN clause and with to the query using the Typecontainer relation
 * @method     ChildReserverQuery innerJoinWithTypecontainer() Adds a INNER JOIN clause and with to the query using the Typecontainer relation
 *
 * @method     ChildReserverQuery leftJoinReservation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Reservation relation
 * @method     ChildReserverQuery rightJoinReservation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Reservation relation
 * @method     ChildReserverQuery innerJoinReservation($relationAlias = null) Adds a INNER JOIN clause to the query using the Reservation relation
 *
 * @method     ChildReserverQuery joinWithReservation($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Reservation relation
 *
 * @method     ChildReserverQuery leftJoinWithReservation() Adds a LEFT JOIN clause and with to the query using the Reservation relation
 * @method     ChildReserverQuery rightJoinWithReservation() Adds a RIGHT JOIN clause and with to the query using the Reservation relation
 * @method     ChildReserverQuery innerJoinWithReservation() Adds a INNER JOIN clause and with to the query using the Reservation relation
 *
 * @method     \App\Http\Model\TypecontainerQuery|\App\Http\Model\ReservationQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildReserver|null findOne(ConnectionInterface $con = null) Return the first ChildReserver matching the query
 * @method     ChildReserver findOneOrCreate(ConnectionInterface $con = null) Return the first ChildReserver matching the query, or a new ChildReserver object populated from the query conditions when no match is found
 *
 * @method     ChildReserver|null findOneByCodereservation(int $codeReservation) Return the first ChildReserver filtered by the codeReservation column
 * @method     ChildReserver|null findOneByNumtypecontainer(int $numTypeContainer) Return the first ChildReserver filtered by the numTypeContainer column
 * @method     ChildReserver|null findOneByQtereserver(string $qteReserver) Return the first ChildReserver filtered by the qteReserver column *

 * @method     ChildReserver requirePk($key, ConnectionInterface $con = null) Return the ChildReserver by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildReserver requireOne(ConnectionInterface $con = null) Return the first ChildReserver matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildReserver requireOneByCodereservation(int $codeReservation) Return the first ChildReserver filtered by the codeReservation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildReserver requireOneByNumtypecontainer(int $numTypeContainer) Return the first ChildReserver filtered by the numTypeContainer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildReserver requireOneByQtereserver(string $qteReserver) Return the first ChildReserver filtered by the qteReserver column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildReserver[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildReserver objects based on current ModelCriteria
 * @method     ChildReserver[]|ObjectCollection findByCodereservation(int $codeReservation) Return ChildReserver objects filtered by the codeReservation column
 * @method     ChildReserver[]|ObjectCollection findByNumtypecontainer(int $numTypeContainer) Return ChildReserver objects filtered by the numTypeContainer column
 * @method     ChildReserver[]|ObjectCollection findByQtereserver(string $qteReserver) Return ChildReserver objects filtered by the qteReserver column
 * @method     ChildReserver[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ReserverQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\Http\Model\Base\ReserverQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\Http\\Model\\Reserver', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildReserverQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildReserverQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildReserverQuery) {
            return $criteria;
        }
        $query = new ChildReserverQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$codeReservation, $numTypeContainer] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildReserver|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ReserverTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ReserverTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildReserver A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT codeReservation, numTypeContainer, qteReserver FROM reserver WHERE codeReservation = :p0 AND numTypeContainer = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildReserver $obj */
            $obj = new ChildReserver();
            $obj->hydrate($row);
            ReserverTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildReserver|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildReserverQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ReserverTableMap::COL_CODERESERVATION, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ReserverTableMap::COL_NUMTYPECONTAINER, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildReserverQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ReserverTableMap::COL_CODERESERVATION, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ReserverTableMap::COL_NUMTYPECONTAINER, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the codeReservation column
     *
     * Example usage:
     * <code>
     * $query->filterByCodereservation(1234); // WHERE codeReservation = 1234
     * $query->filterByCodereservation(array(12, 34)); // WHERE codeReservation IN (12, 34)
     * $query->filterByCodereservation(array('min' => 12)); // WHERE codeReservation > 12
     * </code>
     *
     * @see       filterByReservation()
     *
     * @param     mixed $codereservation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildReserverQuery The current query, for fluid interface
     */
    public function filterByCodereservation($codereservation = null, $comparison = null)
    {
        if (is_array($codereservation)) {
            $useMinMax = false;
            if (isset($codereservation['min'])) {
                $this->addUsingAlias(ReserverTableMap::COL_CODERESERVATION, $codereservation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($codereservation['max'])) {
                $this->addUsingAlias(ReserverTableMap::COL_CODERESERVATION, $codereservation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReserverTableMap::COL_CODERESERVATION, $codereservation, $comparison);
    }

    /**
     * Filter the query on the numTypeContainer column
     *
     * Example usage:
     * <code>
     * $query->filterByNumtypecontainer(1234); // WHERE numTypeContainer = 1234
     * $query->filterByNumtypecontainer(array(12, 34)); // WHERE numTypeContainer IN (12, 34)
     * $query->filterByNumtypecontainer(array('min' => 12)); // WHERE numTypeContainer > 12
     * </code>
     *
     * @see       filterByTypecontainer()
     *
     * @param     mixed $numtypecontainer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildReserverQuery The current query, for fluid interface
     */
    public function filterByNumtypecontainer($numtypecontainer = null, $comparison = null)
    {
        if (is_array($numtypecontainer)) {
            $useMinMax = false;
            if (isset($numtypecontainer['min'])) {
                $this->addUsingAlias(ReserverTableMap::COL_NUMTYPECONTAINER, $numtypecontainer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numtypecontainer['max'])) {
                $this->addUsingAlias(ReserverTableMap::COL_NUMTYPECONTAINER, $numtypecontainer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReserverTableMap::COL_NUMTYPECONTAINER, $numtypecontainer, $comparison);
    }

    /**
     * Filter the query on the qteReserver column
     *
     * Example usage:
     * <code>
     * $query->filterByQtereserver(1234); // WHERE qteReserver = 1234
     * $query->filterByQtereserver(array(12, 34)); // WHERE qteReserver IN (12, 34)
     * $query->filterByQtereserver(array('min' => 12)); // WHERE qteReserver > 12
     * </code>
     *
     * @param     mixed $qtereserver The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildReserverQuery The current query, for fluid interface
     */
    public function filterByQtereserver($qtereserver = null, $comparison = null)
    {
        if (is_array($qtereserver)) {
            $useMinMax = false;
            if (isset($qtereserver['min'])) {
                $this->addUsingAlias(ReserverTableMap::COL_QTERESERVER, $qtereserver['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtereserver['max'])) {
                $this->addUsingAlias(ReserverTableMap::COL_QTERESERVER, $qtereserver['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReserverTableMap::COL_QTERESERVER, $qtereserver, $comparison);
    }

    /**
     * Filter the query by a related \App\Http\Model\Typecontainer object
     *
     * @param \App\Http\Model\Typecontainer|ObjectCollection $typecontainer The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildReserverQuery The current query, for fluid interface
     */
    public function filterByTypecontainer($typecontainer, $comparison = null)
    {
        if ($typecontainer instanceof \App\Http\Model\Typecontainer) {
            return $this
                ->addUsingAlias(ReserverTableMap::COL_NUMTYPECONTAINER, $typecontainer->getNumtypecontainer(), $comparison);
        } elseif ($typecontainer instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ReserverTableMap::COL_NUMTYPECONTAINER, $typecontainer->toKeyValue('PrimaryKey', 'Numtypecontainer'), $comparison);
        } else {
            throw new PropelException('filterByTypecontainer() only accepts arguments of type \App\Http\Model\Typecontainer or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Typecontainer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildReserverQuery The current query, for fluid interface
     */
    public function joinTypecontainer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Typecontainer');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Typecontainer');
        }

        return $this;
    }

    /**
     * Use the Typecontainer relation Typecontainer object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Http\Model\TypecontainerQuery A secondary query class using the current class as primary query
     */
    public function useTypecontainerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTypecontainer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Typecontainer', '\App\Http\Model\TypecontainerQuery');
    }

    /**
     * Use the Typecontainer relation Typecontainer object
     *
     * @param callable(\App\Http\Model\TypecontainerQuery):\App\Http\Model\TypecontainerQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withTypecontainerQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useTypecontainerQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }

    /**
     * Filter the query by a related \App\Http\Model\Reservation object
     *
     * @param \App\Http\Model\Reservation|ObjectCollection $reservation The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildReserverQuery The current query, for fluid interface
     */
    public function filterByReservation($reservation, $comparison = null)
    {
        if ($reservation instanceof \App\Http\Model\Reservation) {
            return $this
                ->addUsingAlias(ReserverTableMap::COL_CODERESERVATION, $reservation->getCodereservation(), $comparison);
        } elseif ($reservation instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ReserverTableMap::COL_CODERESERVATION, $reservation->toKeyValue('PrimaryKey', 'Codereservation'), $comparison);
        } else {
            throw new PropelException('filterByReservation() only accepts arguments of type \App\Http\Model\Reservation or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Reservation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildReserverQuery The current query, for fluid interface
     */
    public function joinReservation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Reservation');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Reservation');
        }

        return $this;
    }

    /**
     * Use the Reservation relation Reservation object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Http\Model\ReservationQuery A secondary query class using the current class as primary query
     */
    public function useReservationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinReservation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Reservation', '\App\Http\Model\ReservationQuery');
    }

    /**
     * Use the Reservation relation Reservation object
     *
     * @param callable(\App\Http\Model\ReservationQuery):\App\Http\Model\ReservationQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withReservationQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useReservationQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param   ChildReserver $reserver Object to remove from the list of results
     *
     * @return $this|ChildReserverQuery The current query, for fluid interface
     */
    public function prune($reserver = null)
    {
        if ($reserver) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ReserverTableMap::COL_CODERESERVATION), $reserver->getCodereservation(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ReserverTableMap::COL_NUMTYPECONTAINER), $reserver->getNumtypecontainer(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the reserver table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ReserverTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ReserverTableMap::clearInstancePool();
            ReserverTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ReserverTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ReserverTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ReserverTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ReserverTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ReserverQuery

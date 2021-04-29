<?php

namespace App\Http\Model\Base;

use \Exception;
use \PDO;
use App\Http\Model\Ville as ChildVille;
use App\Http\Model\VilleQuery as ChildVilleQuery;
use App\Http\Model\Map\VilleTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ville' table.
 *
 *
 *
 * @method     ChildVilleQuery orderByCodeville($order = Criteria::ASC) Order by the codeVille column
 * @method     ChildVilleQuery orderByNomville($order = Criteria::ASC) Order by the nomVille column
 * @method     ChildVilleQuery orderByCodepays($order = Criteria::ASC) Order by the codePays column
 *
 * @method     ChildVilleQuery groupByCodeville() Group by the codeVille column
 * @method     ChildVilleQuery groupByNomville() Group by the nomVille column
 * @method     ChildVilleQuery groupByCodepays() Group by the codePays column
 *
 * @method     ChildVilleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildVilleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildVilleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildVilleQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildVilleQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildVilleQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildVilleQuery leftJoinPays($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pays relation
 * @method     ChildVilleQuery rightJoinPays($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pays relation
 * @method     ChildVilleQuery innerJoinPays($relationAlias = null) Adds a INNER JOIN clause to the query using the Pays relation
 *
 * @method     ChildVilleQuery joinWithPays($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pays relation
 *
 * @method     ChildVilleQuery leftJoinWithPays() Adds a LEFT JOIN clause and with to the query using the Pays relation
 * @method     ChildVilleQuery rightJoinWithPays() Adds a RIGHT JOIN clause and with to the query using the Pays relation
 * @method     ChildVilleQuery innerJoinWithPays() Adds a INNER JOIN clause and with to the query using the Pays relation
 *
 * @method     ChildVilleQuery leftJoinReservationRelatedByCodevillemisedisposition($relationAlias = null) Adds a LEFT JOIN clause to the query using the ReservationRelatedByCodevillemisedisposition relation
 * @method     ChildVilleQuery rightJoinReservationRelatedByCodevillemisedisposition($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ReservationRelatedByCodevillemisedisposition relation
 * @method     ChildVilleQuery innerJoinReservationRelatedByCodevillemisedisposition($relationAlias = null) Adds a INNER JOIN clause to the query using the ReservationRelatedByCodevillemisedisposition relation
 *
 * @method     ChildVilleQuery joinWithReservationRelatedByCodevillemisedisposition($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ReservationRelatedByCodevillemisedisposition relation
 *
 * @method     ChildVilleQuery leftJoinWithReservationRelatedByCodevillemisedisposition() Adds a LEFT JOIN clause and with to the query using the ReservationRelatedByCodevillemisedisposition relation
 * @method     ChildVilleQuery rightJoinWithReservationRelatedByCodevillemisedisposition() Adds a RIGHT JOIN clause and with to the query using the ReservationRelatedByCodevillemisedisposition relation
 * @method     ChildVilleQuery innerJoinWithReservationRelatedByCodevillemisedisposition() Adds a INNER JOIN clause and with to the query using the ReservationRelatedByCodevillemisedisposition relation
 *
 * @method     ChildVilleQuery leftJoinReservationRelatedByCodevillerendre($relationAlias = null) Adds a LEFT JOIN clause to the query using the ReservationRelatedByCodevillerendre relation
 * @method     ChildVilleQuery rightJoinReservationRelatedByCodevillerendre($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ReservationRelatedByCodevillerendre relation
 * @method     ChildVilleQuery innerJoinReservationRelatedByCodevillerendre($relationAlias = null) Adds a INNER JOIN clause to the query using the ReservationRelatedByCodevillerendre relation
 *
 * @method     ChildVilleQuery joinWithReservationRelatedByCodevillerendre($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ReservationRelatedByCodevillerendre relation
 *
 * @method     ChildVilleQuery leftJoinWithReservationRelatedByCodevillerendre() Adds a LEFT JOIN clause and with to the query using the ReservationRelatedByCodevillerendre relation
 * @method     ChildVilleQuery rightJoinWithReservationRelatedByCodevillerendre() Adds a RIGHT JOIN clause and with to the query using the ReservationRelatedByCodevillerendre relation
 * @method     ChildVilleQuery innerJoinWithReservationRelatedByCodevillerendre() Adds a INNER JOIN clause and with to the query using the ReservationRelatedByCodevillerendre relation
 *
 * @method     \App\Http\Model\PaysQuery|\App\Http\Model\ReservationQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildVille|null findOne(ConnectionInterface $con = null) Return the first ChildVille matching the query
 * @method     ChildVille findOneOrCreate(ConnectionInterface $con = null) Return the first ChildVille matching the query, or a new ChildVille object populated from the query conditions when no match is found
 *
 * @method     ChildVille|null findOneByCodeville(int $codeVille) Return the first ChildVille filtered by the codeVille column
 * @method     ChildVille|null findOneByNomville(string $nomVille) Return the first ChildVille filtered by the nomVille column
 * @method     ChildVille|null findOneByCodepays(string $codePays) Return the first ChildVille filtered by the codePays column *

 * @method     ChildVille requirePk($key, ConnectionInterface $con = null) Return the ChildVille by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVille requireOne(ConnectionInterface $con = null) Return the first ChildVille matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVille requireOneByCodeville(int $codeVille) Return the first ChildVille filtered by the codeVille column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVille requireOneByNomville(string $nomVille) Return the first ChildVille filtered by the nomVille column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVille requireOneByCodepays(string $codePays) Return the first ChildVille filtered by the codePays column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVille[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildVille objects based on current ModelCriteria
 * @method     ChildVille[]|ObjectCollection findByCodeville(int $codeVille) Return ChildVille objects filtered by the codeVille column
 * @method     ChildVille[]|ObjectCollection findByNomville(string $nomVille) Return ChildVille objects filtered by the nomVille column
 * @method     ChildVille[]|ObjectCollection findByCodepays(string $codePays) Return ChildVille objects filtered by the codePays column
 * @method     ChildVille[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class VilleQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\Http\Model\Base\VilleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\Http\\Model\\Ville', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildVilleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildVilleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildVilleQuery) {
            return $criteria;
        }
        $query = new ChildVilleQuery();
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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildVille|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(VilleTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = VilleTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildVille A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT codeVille, nomVille, codePays FROM ville WHERE codeVille = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildVille $obj */
            $obj = new ChildVille();
            $obj->hydrate($row);
            VilleTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildVille|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
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
     * @return $this|ChildVilleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VilleTableMap::COL_CODEVILLE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildVilleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VilleTableMap::COL_CODEVILLE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the codeVille column
     *
     * Example usage:
     * <code>
     * $query->filterByCodeville(1234); // WHERE codeVille = 1234
     * $query->filterByCodeville(array(12, 34)); // WHERE codeVille IN (12, 34)
     * $query->filterByCodeville(array('min' => 12)); // WHERE codeVille > 12
     * </code>
     *
     * @param     mixed $codeville The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVilleQuery The current query, for fluid interface
     */
    public function filterByCodeville($codeville = null, $comparison = null)
    {
        if (is_array($codeville)) {
            $useMinMax = false;
            if (isset($codeville['min'])) {
                $this->addUsingAlias(VilleTableMap::COL_CODEVILLE, $codeville['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($codeville['max'])) {
                $this->addUsingAlias(VilleTableMap::COL_CODEVILLE, $codeville['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VilleTableMap::COL_CODEVILLE, $codeville, $comparison);
    }

    /**
     * Filter the query on the nomVille column
     *
     * Example usage:
     * <code>
     * $query->filterByNomville('fooValue');   // WHERE nomVille = 'fooValue'
     * $query->filterByNomville('%fooValue%', Criteria::LIKE); // WHERE nomVille LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomville The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVilleQuery The current query, for fluid interface
     */
    public function filterByNomville($nomville = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomville)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VilleTableMap::COL_NOMVILLE, $nomville, $comparison);
    }

    /**
     * Filter the query on the codePays column
     *
     * Example usage:
     * <code>
     * $query->filterByCodepays('fooValue');   // WHERE codePays = 'fooValue'
     * $query->filterByCodepays('%fooValue%', Criteria::LIKE); // WHERE codePays LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codepays The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVilleQuery The current query, for fluid interface
     */
    public function filterByCodepays($codepays = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codepays)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VilleTableMap::COL_CODEPAYS, $codepays, $comparison);
    }

    /**
     * Filter the query by a related \App\Http\Model\Pays object
     *
     * @param \App\Http\Model\Pays|ObjectCollection $pays The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildVilleQuery The current query, for fluid interface
     */
    public function filterByPays($pays, $comparison = null)
    {
        if ($pays instanceof \App\Http\Model\Pays) {
            return $this
                ->addUsingAlias(VilleTableMap::COL_CODEPAYS, $pays->getCodepays(), $comparison);
        } elseif ($pays instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(VilleTableMap::COL_CODEPAYS, $pays->toKeyValue('PrimaryKey', 'Codepays'), $comparison);
        } else {
            throw new PropelException('filterByPays() only accepts arguments of type \App\Http\Model\Pays or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pays relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildVilleQuery The current query, for fluid interface
     */
    public function joinPays($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pays');

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
            $this->addJoinObject($join, 'Pays');
        }

        return $this;
    }

    /**
     * Use the Pays relation Pays object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Http\Model\PaysQuery A secondary query class using the current class as primary query
     */
    public function usePaysQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPays($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pays', '\App\Http\Model\PaysQuery');
    }

    /**
     * Use the Pays relation Pays object
     *
     * @param callable(\App\Http\Model\PaysQuery):\App\Http\Model\PaysQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withPaysQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->usePaysQuery(
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
     * @param \App\Http\Model\Reservation|ObjectCollection $reservation the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildVilleQuery The current query, for fluid interface
     */
    public function filterByReservationRelatedByCodevillemisedisposition($reservation, $comparison = null)
    {
        if ($reservation instanceof \App\Http\Model\Reservation) {
            return $this
                ->addUsingAlias(VilleTableMap::COL_CODEVILLE, $reservation->getCodevillemisedisposition(), $comparison);
        } elseif ($reservation instanceof ObjectCollection) {
            return $this
                ->useReservationRelatedByCodevillemisedispositionQuery()
                ->filterByPrimaryKeys($reservation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByReservationRelatedByCodevillemisedisposition() only accepts arguments of type \App\Http\Model\Reservation or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ReservationRelatedByCodevillemisedisposition relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildVilleQuery The current query, for fluid interface
     */
    public function joinReservationRelatedByCodevillemisedisposition($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ReservationRelatedByCodevillemisedisposition');

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
            $this->addJoinObject($join, 'ReservationRelatedByCodevillemisedisposition');
        }

        return $this;
    }

    /**
     * Use the ReservationRelatedByCodevillemisedisposition relation Reservation object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Http\Model\ReservationQuery A secondary query class using the current class as primary query
     */
    public function useReservationRelatedByCodevillemisedispositionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinReservationRelatedByCodevillemisedisposition($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ReservationRelatedByCodevillemisedisposition', '\App\Http\Model\ReservationQuery');
    }

    /**
     * Use the ReservationRelatedByCodevillemisedisposition relation Reservation object
     *
     * @param callable(\App\Http\Model\ReservationQuery):\App\Http\Model\ReservationQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withReservationRelatedByCodevillemisedispositionQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useReservationRelatedByCodevillemisedispositionQuery(
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
     * @param \App\Http\Model\Reservation|ObjectCollection $reservation the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildVilleQuery The current query, for fluid interface
     */
    public function filterByReservationRelatedByCodevillerendre($reservation, $comparison = null)
    {
        if ($reservation instanceof \App\Http\Model\Reservation) {
            return $this
                ->addUsingAlias(VilleTableMap::COL_CODEVILLE, $reservation->getCodevillerendre(), $comparison);
        } elseif ($reservation instanceof ObjectCollection) {
            return $this
                ->useReservationRelatedByCodevillerendreQuery()
                ->filterByPrimaryKeys($reservation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByReservationRelatedByCodevillerendre() only accepts arguments of type \App\Http\Model\Reservation or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ReservationRelatedByCodevillerendre relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildVilleQuery The current query, for fluid interface
     */
    public function joinReservationRelatedByCodevillerendre($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ReservationRelatedByCodevillerendre');

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
            $this->addJoinObject($join, 'ReservationRelatedByCodevillerendre');
        }

        return $this;
    }

    /**
     * Use the ReservationRelatedByCodevillerendre relation Reservation object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Http\Model\ReservationQuery A secondary query class using the current class as primary query
     */
    public function useReservationRelatedByCodevillerendreQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinReservationRelatedByCodevillerendre($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ReservationRelatedByCodevillerendre', '\App\Http\Model\ReservationQuery');
    }

    /**
     * Use the ReservationRelatedByCodevillerendre relation Reservation object
     *
     * @param callable(\App\Http\Model\ReservationQuery):\App\Http\Model\ReservationQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withReservationRelatedByCodevillerendreQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useReservationRelatedByCodevillerendreQuery(
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
     * @param   ChildVille $ville Object to remove from the list of results
     *
     * @return $this|ChildVilleQuery The current query, for fluid interface
     */
    public function prune($ville = null)
    {
        if ($ville) {
            $this->addUsingAlias(VilleTableMap::COL_CODEVILLE, $ville->getCodeville(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ville table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VilleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            VilleTableMap::clearInstancePool();
            VilleTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(VilleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(VilleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            VilleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            VilleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // VilleQuery

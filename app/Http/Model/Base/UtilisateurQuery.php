<?php

namespace App\Http\Model\Base;

use \Exception;
use \PDO;
use App\Http\Model\Utilisateur as ChildUtilisateur;
use App\Http\Model\UtilisateurQuery as ChildUtilisateurQuery;
use App\Http\Model\Map\UtilisateurTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'utilisateur' table.
 *
 *
 *
 * @method     ChildUtilisateurQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildUtilisateurQuery orderByRaisonsociale($order = Criteria::ASC) Order by the raisonSociale column
 * @method     ChildUtilisateurQuery orderByAdresse($order = Criteria::ASC) Order by the adresse column
 * @method     ChildUtilisateurQuery orderByCp($order = Criteria::ASC) Order by the cp column
 * @method     ChildUtilisateurQuery orderByVille($order = Criteria::ASC) Order by the ville column
 * @method     ChildUtilisateurQuery orderByAdrmel($order = Criteria::ASC) Order by the adrMel column
 * @method     ChildUtilisateurQuery orderByTelephone($order = Criteria::ASC) Order by the telephone column
 * @method     ChildUtilisateurQuery orderByContact($order = Criteria::ASC) Order by the contact column
 * @method     ChildUtilisateurQuery orderByCodepays($order = Criteria::ASC) Order by the codePays column
 * @method     ChildUtilisateurQuery orderByLogin($order = Criteria::ASC) Order by the login column
 * @method     ChildUtilisateurQuery orderByMdp($order = Criteria::ASC) Order by the mdp column
 *
 * @method     ChildUtilisateurQuery groupByCode() Group by the code column
 * @method     ChildUtilisateurQuery groupByRaisonsociale() Group by the raisonSociale column
 * @method     ChildUtilisateurQuery groupByAdresse() Group by the adresse column
 * @method     ChildUtilisateurQuery groupByCp() Group by the cp column
 * @method     ChildUtilisateurQuery groupByVille() Group by the ville column
 * @method     ChildUtilisateurQuery groupByAdrmel() Group by the adrMel column
 * @method     ChildUtilisateurQuery groupByTelephone() Group by the telephone column
 * @method     ChildUtilisateurQuery groupByContact() Group by the contact column
 * @method     ChildUtilisateurQuery groupByCodepays() Group by the codePays column
 * @method     ChildUtilisateurQuery groupByLogin() Group by the login column
 * @method     ChildUtilisateurQuery groupByMdp() Group by the mdp column
 *
 * @method     ChildUtilisateurQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUtilisateurQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUtilisateurQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUtilisateurQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUtilisateurQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUtilisateurQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUtilisateurQuery leftJoinPays($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pays relation
 * @method     ChildUtilisateurQuery rightJoinPays($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pays relation
 * @method     ChildUtilisateurQuery innerJoinPays($relationAlias = null) Adds a INNER JOIN clause to the query using the Pays relation
 *
 * @method     ChildUtilisateurQuery joinWithPays($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pays relation
 *
 * @method     ChildUtilisateurQuery leftJoinWithPays() Adds a LEFT JOIN clause and with to the query using the Pays relation
 * @method     ChildUtilisateurQuery rightJoinWithPays() Adds a RIGHT JOIN clause and with to the query using the Pays relation
 * @method     ChildUtilisateurQuery innerJoinWithPays() Adds a INNER JOIN clause and with to the query using the Pays relation
 *
 * @method     ChildUtilisateurQuery leftJoinReservation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Reservation relation
 * @method     ChildUtilisateurQuery rightJoinReservation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Reservation relation
 * @method     ChildUtilisateurQuery innerJoinReservation($relationAlias = null) Adds a INNER JOIN clause to the query using the Reservation relation
 *
 * @method     ChildUtilisateurQuery joinWithReservation($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Reservation relation
 *
 * @method     ChildUtilisateurQuery leftJoinWithReservation() Adds a LEFT JOIN clause and with to the query using the Reservation relation
 * @method     ChildUtilisateurQuery rightJoinWithReservation() Adds a RIGHT JOIN clause and with to the query using the Reservation relation
 * @method     ChildUtilisateurQuery innerJoinWithReservation() Adds a INNER JOIN clause and with to the query using the Reservation relation
 *
 * @method     \App\Http\Model\PaysQuery|\App\Http\Model\ReservationQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUtilisateur|null findOne(ConnectionInterface $con = null) Return the first ChildUtilisateur matching the query
 * @method     ChildUtilisateur findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUtilisateur matching the query, or a new ChildUtilisateur object populated from the query conditions when no match is found
 *
 * @method     ChildUtilisateur|null findOneByCode(int $code) Return the first ChildUtilisateur filtered by the code column
 * @method     ChildUtilisateur|null findOneByRaisonsociale(string $raisonSociale) Return the first ChildUtilisateur filtered by the raisonSociale column
 * @method     ChildUtilisateur|null findOneByAdresse(string $adresse) Return the first ChildUtilisateur filtered by the adresse column
 * @method     ChildUtilisateur|null findOneByCp(string $cp) Return the first ChildUtilisateur filtered by the cp column
 * @method     ChildUtilisateur|null findOneByVille(string $ville) Return the first ChildUtilisateur filtered by the ville column
 * @method     ChildUtilisateur|null findOneByAdrmel(string $adrMel) Return the first ChildUtilisateur filtered by the adrMel column
 * @method     ChildUtilisateur|null findOneByTelephone(string $telephone) Return the first ChildUtilisateur filtered by the telephone column
 * @method     ChildUtilisateur|null findOneByContact(string $contact) Return the first ChildUtilisateur filtered by the contact column
 * @method     ChildUtilisateur|null findOneByCodepays(string $codePays) Return the first ChildUtilisateur filtered by the codePays column
 * @method     ChildUtilisateur|null findOneByLogin(string $login) Return the first ChildUtilisateur filtered by the login column
 * @method     ChildUtilisateur|null findOneByMdp(string $mdp) Return the first ChildUtilisateur filtered by the mdp column *

 * @method     ChildUtilisateur requirePk($key, ConnectionInterface $con = null) Return the ChildUtilisateur by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtilisateur requireOne(ConnectionInterface $con = null) Return the first ChildUtilisateur matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUtilisateur requireOneByCode(int $code) Return the first ChildUtilisateur filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtilisateur requireOneByRaisonsociale(string $raisonSociale) Return the first ChildUtilisateur filtered by the raisonSociale column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtilisateur requireOneByAdresse(string $adresse) Return the first ChildUtilisateur filtered by the adresse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtilisateur requireOneByCp(string $cp) Return the first ChildUtilisateur filtered by the cp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtilisateur requireOneByVille(string $ville) Return the first ChildUtilisateur filtered by the ville column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtilisateur requireOneByAdrmel(string $adrMel) Return the first ChildUtilisateur filtered by the adrMel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtilisateur requireOneByTelephone(string $telephone) Return the first ChildUtilisateur filtered by the telephone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtilisateur requireOneByContact(string $contact) Return the first ChildUtilisateur filtered by the contact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtilisateur requireOneByCodepays(string $codePays) Return the first ChildUtilisateur filtered by the codePays column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtilisateur requireOneByLogin(string $login) Return the first ChildUtilisateur filtered by the login column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtilisateur requireOneByMdp(string $mdp) Return the first ChildUtilisateur filtered by the mdp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUtilisateur[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUtilisateur objects based on current ModelCriteria
 * @method     ChildUtilisateur[]|ObjectCollection findByCode(int $code) Return ChildUtilisateur objects filtered by the code column
 * @method     ChildUtilisateur[]|ObjectCollection findByRaisonsociale(string $raisonSociale) Return ChildUtilisateur objects filtered by the raisonSociale column
 * @method     ChildUtilisateur[]|ObjectCollection findByAdresse(string $adresse) Return ChildUtilisateur objects filtered by the adresse column
 * @method     ChildUtilisateur[]|ObjectCollection findByCp(string $cp) Return ChildUtilisateur objects filtered by the cp column
 * @method     ChildUtilisateur[]|ObjectCollection findByVille(string $ville) Return ChildUtilisateur objects filtered by the ville column
 * @method     ChildUtilisateur[]|ObjectCollection findByAdrmel(string $adrMel) Return ChildUtilisateur objects filtered by the adrMel column
 * @method     ChildUtilisateur[]|ObjectCollection findByTelephone(string $telephone) Return ChildUtilisateur objects filtered by the telephone column
 * @method     ChildUtilisateur[]|ObjectCollection findByContact(string $contact) Return ChildUtilisateur objects filtered by the contact column
 * @method     ChildUtilisateur[]|ObjectCollection findByCodepays(string $codePays) Return ChildUtilisateur objects filtered by the codePays column
 * @method     ChildUtilisateur[]|ObjectCollection findByLogin(string $login) Return ChildUtilisateur objects filtered by the login column
 * @method     ChildUtilisateur[]|ObjectCollection findByMdp(string $mdp) Return ChildUtilisateur objects filtered by the mdp column
 * @method     ChildUtilisateur[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UtilisateurQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\Http\Model\Base\UtilisateurQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\Http\\Model\\Utilisateur', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUtilisateurQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUtilisateurQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUtilisateurQuery) {
            return $criteria;
        }
        $query = new ChildUtilisateurQuery();
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
     * @return ChildUtilisateur|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UtilisateurTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UtilisateurTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildUtilisateur A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT code, raisonSociale, adresse, cp, ville, adrMel, telephone, contact, codePays, login, mdp FROM utilisateur WHERE code = :p0';
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
            /** @var ChildUtilisateur $obj */
            $obj = new ChildUtilisateur();
            $obj->hydrate($row);
            UtilisateurTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildUtilisateur|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UtilisateurTableMap::COL_CODE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UtilisateurTableMap::COL_CODE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode(1234); // WHERE code = 1234
     * $query->filterByCode(array(12, 34)); // WHERE code IN (12, 34)
     * $query->filterByCode(array('min' => 12)); // WHERE code > 12
     * </code>
     *
     * @param     mixed $code The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (is_array($code)) {
            $useMinMax = false;
            if (isset($code['min'])) {
                $this->addUsingAlias(UtilisateurTableMap::COL_CODE, $code['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($code['max'])) {
                $this->addUsingAlias(UtilisateurTableMap::COL_CODE, $code['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilisateurTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the raisonSociale column
     *
     * Example usage:
     * <code>
     * $query->filterByRaisonsociale('fooValue');   // WHERE raisonSociale = 'fooValue'
     * $query->filterByRaisonsociale('%fooValue%', Criteria::LIKE); // WHERE raisonSociale LIKE '%fooValue%'
     * </code>
     *
     * @param     string $raisonsociale The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByRaisonsociale($raisonsociale = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($raisonsociale)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilisateurTableMap::COL_RAISONSOCIALE, $raisonsociale, $comparison);
    }

    /**
     * Filter the query on the adresse column
     *
     * Example usage:
     * <code>
     * $query->filterByAdresse('fooValue');   // WHERE adresse = 'fooValue'
     * $query->filterByAdresse('%fooValue%', Criteria::LIKE); // WHERE adresse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $adresse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByAdresse($adresse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($adresse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilisateurTableMap::COL_ADRESSE, $adresse, $comparison);
    }

    /**
     * Filter the query on the cp column
     *
     * Example usage:
     * <code>
     * $query->filterByCp('fooValue');   // WHERE cp = 'fooValue'
     * $query->filterByCp('%fooValue%', Criteria::LIKE); // WHERE cp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByCp($cp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilisateurTableMap::COL_CP, $cp, $comparison);
    }

    /**
     * Filter the query on the ville column
     *
     * Example usage:
     * <code>
     * $query->filterByVille('fooValue');   // WHERE ville = 'fooValue'
     * $query->filterByVille('%fooValue%', Criteria::LIKE); // WHERE ville LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ville The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByVille($ville = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ville)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilisateurTableMap::COL_VILLE, $ville, $comparison);
    }

    /**
     * Filter the query on the adrMel column
     *
     * Example usage:
     * <code>
     * $query->filterByAdrmel('fooValue');   // WHERE adrMel = 'fooValue'
     * $query->filterByAdrmel('%fooValue%', Criteria::LIKE); // WHERE adrMel LIKE '%fooValue%'
     * </code>
     *
     * @param     string $adrmel The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByAdrmel($adrmel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($adrmel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilisateurTableMap::COL_ADRMEL, $adrmel, $comparison);
    }

    /**
     * Filter the query on the telephone column
     *
     * Example usage:
     * <code>
     * $query->filterByTelephone('fooValue');   // WHERE telephone = 'fooValue'
     * $query->filterByTelephone('%fooValue%', Criteria::LIKE); // WHERE telephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telephone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByTelephone($telephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telephone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilisateurTableMap::COL_TELEPHONE, $telephone, $comparison);
    }

    /**
     * Filter the query on the contact column
     *
     * Example usage:
     * <code>
     * $query->filterByContact('fooValue');   // WHERE contact = 'fooValue'
     * $query->filterByContact('%fooValue%', Criteria::LIKE); // WHERE contact LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contact The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByContact($contact = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contact)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilisateurTableMap::COL_CONTACT, $contact, $comparison);
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
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByCodepays($codepays = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codepays)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilisateurTableMap::COL_CODEPAYS, $codepays, $comparison);
    }

    /**
     * Filter the query on the login column
     *
     * Example usage:
     * <code>
     * $query->filterByLogin('fooValue');   // WHERE login = 'fooValue'
     * $query->filterByLogin('%fooValue%', Criteria::LIKE); // WHERE login LIKE '%fooValue%'
     * </code>
     *
     * @param     string $login The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByLogin($login = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($login)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilisateurTableMap::COL_LOGIN, $login, $comparison);
    }

    /**
     * Filter the query on the mdp column
     *
     * Example usage:
     * <code>
     * $query->filterByMdp('fooValue');   // WHERE mdp = 'fooValue'
     * $query->filterByMdp('%fooValue%', Criteria::LIKE); // WHERE mdp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mdp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByMdp($mdp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mdp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilisateurTableMap::COL_MDP, $mdp, $comparison);
    }

    /**
     * Filter the query by a related \App\Http\Model\Pays object
     *
     * @param \App\Http\Model\Pays|ObjectCollection $pays The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByPays($pays, $comparison = null)
    {
        if ($pays instanceof \App\Http\Model\Pays) {
            return $this
                ->addUsingAlias(UtilisateurTableMap::COL_CODEPAYS, $pays->getCodepays(), $comparison);
        } elseif ($pays instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UtilisateurTableMap::COL_CODEPAYS, $pays->toKeyValue('PrimaryKey', 'Codepays'), $comparison);
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
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
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
     * @return ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByReservation($reservation, $comparison = null)
    {
        if ($reservation instanceof \App\Http\Model\Reservation) {
            return $this
                ->addUsingAlias(UtilisateurTableMap::COL_CODE, $reservation->getCodeutilisateur(), $comparison);
        } elseif ($reservation instanceof ObjectCollection) {
            return $this
                ->useReservationQuery()
                ->filterByPrimaryKeys($reservation->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
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
     * @param   ChildUtilisateur $utilisateur Object to remove from the list of results
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function prune($utilisateur = null)
    {
        if ($utilisateur) {
            $this->addUsingAlias(UtilisateurTableMap::COL_CODE, $utilisateur->getCode(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the utilisateur table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UtilisateurTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UtilisateurTableMap::clearInstancePool();
            UtilisateurTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UtilisateurTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UtilisateurTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UtilisateurTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UtilisateurTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UtilisateurQuery

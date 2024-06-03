<?php

namespace Ductv44\PhpOop\Commons;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;

class Model
{
    protected Connection|null $conn;
    protected QueryBuilder $queryBuilder;
    protected string $tableName;

    public function __construct()
    {
        $connectionParams = [
            'dbname'    => $_ENV['DB_NAME'],
            'user'      => $_ENV['DB_USERNAME'],
            'password'  => $_ENV['DB_PASSWORD'],
            'host'      => $_ENV['DB_HOST'],
            'port'      => $_ENV['DB_PORT'],
            'driver'    => $_ENV['DB_DRIVER'],
        ];

        $this->conn = DriverManager::getConnection($connectionParams);

        $this->queryBuilder = $this->conn->createQueryBuilder();
    }

    // CRUD
    public function all()
    {
        return $this->queryBuilder
        ->select('*')
        ->from($this->tableName)
        ->orderBy('id', 'desc')
        ->fetchAllAssociative();
    }

    public function count()
    {
        return $this->queryBuilder
        ->select("COUNT(*) as $this->tableName")
        ->from($this->tableName)
        ->fetchOne();
    }

    public function paginate($page = 1, $perPage = 5)
    {
        $totalPage = ceil($this->count() / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $this->queryBuilder
        ->select('*')
        ->from($this->tableName)
        ->setFirstResult($offset)
        ->setMaxResults($perPage)
        ->orderBy('id', 'desc')
        ->fetchAllAssociative();

        return [$data, $totalPage];
    }

    public function findByID($id)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }

    public function insert(array $data)
    {
        // $data = [
        //     'name' => 'Ahihi',
        //     'email' => 'keke@gnai.com',
        //     'address' => 'HN'
        // ];

        if (!empty($data)) {
            $query = $this->queryBuilder->insert($this->tableName);

            // $query->setValue('name', '?')->setParameter(0, $data['name']);
            // $query->setValue('email', '?')->setParameter(1, $data['email']);
            // $query->setValue('address', '?')->setParameter(2, $data['address']);

            $index = 0;
            foreach($data as $key => $value) {
                $query->setValue($key, '?')->setParameter($index, $value);
                
                ++$index;
            }

            $query->executeQuery();

            return true;
        }
        
        return false;
    }

    public function update($id, array $data)
    {
        if (!empty($data)) {
            $query = $this->queryBuilder->update($this->tableName);

            // $data = [
            //     'name' => 'Ahihi',
            //     'email' => 'keke@gnai.com',
            //     'address' => 'HN'
            // ];

            $index = 0;
            foreach($data as $key => $value) {
                $query->set($key, '?')->setParameter($index, $value);

                ++$index;
            }

            $query->where('id = ?')
                ->setParameter(count($data), $id)
                ->executeQuery();

            return true;
        }
        
        return false;
    }

    public function delete($id)
    {        
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('id = ?')
            ->setParameter(0, $id)
            ->executeQuery();
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}

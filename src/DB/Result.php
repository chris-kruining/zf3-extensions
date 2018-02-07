<?php

namespace CPB\Extensions\Zend\DB
{
    class Result extends \Zend\Db\Adapter\Driver\Pdo\Result
    {
        public function setFetchMode($fetchMode)
        {
            if (($fetchMode < 1 || $fetchMode > 12) && $fetchMode !== \PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE) {
                throw new Exception\InvalidArgumentException(
                    'The fetch mode must be one of the PDO::FETCH_* constants.'
                );
            }
    
            $this->fetchMode = (int) $fetchMode;
        }
    }
}

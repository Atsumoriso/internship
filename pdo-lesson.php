<?php

interface LoggerInterface
{
	function warning($msg);

	function error($msg);

	function notice($msg);
}

abstract class LoggerAbstract implements LoggerInterface
{
    public function warning($msg)
    {
        $this->write($msg, 'Warning message: ');
    }

    public function error($msg)
    {
        $this->write($msg, 'Error message: ');
    }

    public function notice($msg)
    {
        $this->write($msg, 'Notice message: ');
    }

    abstract protected function write($msg, $type);
}

class LoggerDB extends LoggerAbstract
{
    protected $dbh;

    protected function connect()
    {
        $dbName = 'pdoLesson';
        $dbUser = 'root';
        $dbPass = '1';
        $host = 'localhost';
        $dsn = "mysql:host={$host};dbname={$dbName}";
        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        $this->dbh = new PDO($dsn, $dbUser, $dbPass, $opt);
    }

    protected function write($msg, $type)
    {
        try {
            $this->connect();
            $statement = $this->dbh->prepare("INSERT INTO `log` (`message`, `type`, `creation_date`) values (?, ?, ?)");
            $inserted = $statement->execute([$msg, 'error', date('Y-m-d H:i:s')]);
        }catch(PDOException $e) {
            die("PDO Exception" . $e->getMessage());
        }
    }
}

class LoggerFile extends LoggerAbstract
{
    protected $fileConnect;

    protected function connect()
    {
        $this->fileConnect = fopen("log.txt", "w");
    }

    protected function write($msg, $type)
    {
        $this->connect();
        fwrite($this->fileConnect, $type . $msg);
        fclose($this->fileConnect);
    }
}

$dbLoger = new LoggerDB;
$dbLoger->error('my custom error msg, it work2');

$fileLoger = new LoggerFile;
$fileLoger->error('my custom error msg');
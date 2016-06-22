<?php

interface LogerInterface
{
	function warning($msg);

	function error($msg);

	function notice($msg);
}

class LogInDB implements LogerInterface
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

    function error($msg)
    {
        $this->write($msg, 'error');
    }

    function warning($msg)
    {
        $this->write($msg, 'warning');
    }

    function notice($msg)
    {
        $this->write($msg, 'notice');
    }
}

class LogInFIle implements LogerInterface
{
    protected $fileConnect;

    protected function connect()
    {
        $this->fileConnect = fopen("log.txt", "w");
    }

    protected function write($msg)
    {
        $this->connect();
        fwrite($this->fileConnect, $msg);
        fclose($this->fileConnect);
    }

    function warning($msg)
    {
        $msg = "Warning message: \n {$msg}";
        $this->write($msg);
    }

    function error($msg)
    {
        $msg = "Error message: \n {$msg}";
        $this->write($msg);
    }

    function notice($msg)
    {
        $msg = "Notice message: \n {$msg}";
        $this->write($msg);
    }
}

$dbLoger = new LogInDB;
$dbLoger->error('my custom error msg, it work');

$fileLoger = new LogInFIle;
$fileLoger->error('my custom error msg');
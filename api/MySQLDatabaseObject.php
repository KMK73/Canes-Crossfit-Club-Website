
<?php
class MySQLDatabaseObject {

var $dbhost = null;
var $dbuser = null;
var $dbpass = null;
var $conn = null;
var $dbname = null;
var $result = null;

function __construct() {
$this->dbhost = Conn::$dbhost;
$this->dbuser = Conn::$dbuser;
$this->dbpass = Conn::$dbpass;
$this->dbname = Conn::$dbname;
}

public function openConnection() {
$this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
if (mysqli_connect_errno())
echo new Exception("Could not establish connection with database");
}

public function getConnection() {
return $this->conn;
}

public function closeConnection() {
if ($this->conn != null)
$this->conn->close();
}

public function getUserDetails($username)
{
$returnValue = array();
$sql = "select * from users where username='" . $username . "'";

$result = $this->conn->query($sql);
if ($result != null && (mysqli_num_rows($result) >= 1)) {
$row = $result->fetch_array(MYSQLI_ASSOC);
if (!empty($row)) {
$returnValue = $row;
}
}
return $returnValue;
}

public function getUserDetailsWithPassword($username, $userPassword)
{
$returnValue = array();
$sql = "select id,username from users where username='" . $username . "' and password='" .$password . "'";

$result = $this->conn->query($sql);
if ($result != null && (mysqli_num_rows($result) >= 1)) {
$row = $result->fetch_array(MYSQLI_ASSOC);
if (!empty($row)) {
$returnValue = $row;
}
}
return $returnValue;
}

public function registerUser($first_name, $last_name, $username, $password)
{
//$sql = sprintf("INSERT INTO users (first_name, last_name, username, password) VALUES ('%s','%s','%s','%s')", $first, $last, $username, $password);
$sql = "INSERT INTO users SET username=?, password=?";
$statement = $this->conn->prepare($sql);

if (!$statement)
throw new Exception($statement->error);

$statement->bind_param("ss", $username, $password);
$returnValue = $statement->execute();

return $returnValue;
}

    
}
?>
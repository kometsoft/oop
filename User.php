<?PHP
class User
{
    //access modifier
    protected $id;
    protected $name;
    protected $age;
    protected $table = 't_user'; //assign value within class

    //insert method (function)
    //using $this to access property within class
    //mysql i(improved)
    //TODO pending bla bla
    /**
     * @author 
     * @param name
     * @return 
     * Create(insert) Read(select) Update Delete 
     */
    public function insert()
    {
        global $con;
        $sql = "INSERT INTO $this->table (usr_name,usr_age)
                    VALUES ('$this->name', '$this->age')";
        mysqli_query($con, $sql);
    }

    public function select()
    {
        global $con;
        $sql = "SELECT * FROM $this->table
                    WHERE id = '$this->id'";
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $this->age = $row['usr_age'];
            $this->name = $row['usr_name'];
        }
    }

    public function delete()
    {
        global $con;
        $sql = "DELETE FROM $this->table WHERE id = '$this->id'";
        mysqli_query($con, $sql);
    }

    public function update()
    {
        global $con;
        $sql = "UPDATE $this->table SET usr_age = '$this->age' WHERE id = '$this->id'";
        mysqli_query($con, $sql);
    }

    public function search()
    {

        global $con;
        $sql = "SELECT * FROM $this->table";
        $result = mysqli_query($con, $sql);
        while (true == ($row = mysqli_fetch_array($result))) {

            $objResult = new User();

            $objResult->id = $row['id'];
            $objResult->name = $row['usr_name'];
            $objResult->age = $row['usr_age'];

            //assign result INTO array
            $arrSearchResults[] = $objResult;
        }

        return $arrSearchResults;
    }

    //getter and setter using camelCase format
    //getter to retrieve; setter to assign value
    public function setId($id)
    {
        $this->id = $this->stringEncryption('decrypt', $id);
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setAge($age)
    {
        $this->age = $age;
    }
    public function getId()
    {
        return $this->stringEncryption('encrypt', $this->id);
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAge()
    {
        return $this->age;
    }

    function stringEncryption($action, $string)
    {
        $output = false;

        $encrypt_method = 'AES-256-CBC'; // Default
        $secret_key = 'ti400PKSTrainingu0!'; // Change the key!
        $secret_iv = '!IV@_$2';  // Change the init vector!

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }
}

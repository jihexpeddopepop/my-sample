<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'patient_profile');

class DB_con {
    private $dbcon;

    // Constructor for database connection
    function __construct(){
        $this->dbcon = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
    }

    // Insert user data
    public function insert($users_id_card, $users_firstname, $users_lastname, $users_email, $users_phonenumber, $users_detail_date, $users_address){
        $query = "INSERT INTO users (users_id_card, users_firstname, users_lastname, users_email, users_phonenumber, users_detail_date, users_address) 
                  VALUES ('$users_id_card', '$users_firstname', '$users_lastname', '$users_email', '$users_phonenumber', '$users_detail_date', '$users_address')";
        $result = mysqli_query($this->dbcon, $query);
        return $result;  // Return result of query execution
    }

    // Fetch all user data
    public function fetchdata(){
        $query = "SELECT * FROM users";
        $result = mysqli_query($this->dbcon, $query);
        return $result;  // Return result set
    }

    // Fetch a single user record based on user ID
    public function fetchonerecord($userid){
        $query = "SELECT * FROM users WHERE users_id = '$userid'";
        $result = mysqli_query($this->dbcon, $query);
        return $result;  // Return result set for a single user
    }

    // Update user data
    public function update($users_id_card, $users_firstname, $users_lastname, $users_email, $users_phonenumber, $users_detail_date, $users_address, $userid) {
        $result = mysqli_query($this->dbcon, "UPDATE users SET 
            users_id_card = '$users_id_card',
            users_firstname = '$users_firstname',
            users_lastname = '$users_lastname',
            users_email = '$users_email',
            users_phonenumber = '$users_phonenumber',
            users_detail_date = '$users_detail_date',
            users_address = '$users_address'
            WHERE users_id = '$userid'");
    
        return $result;
    }
    

    // Delete a user record based on user ID
    public function delete($userid){
        $query = "DELETE FROM users WHERE users_id = '$userid'";
        $result = mysqli_query($this->dbcon, $query);
        return $result;  // Return result of delete query
    }

    // Close database connection (optional)
    public function closeConnection() {
        mysqli_close($this->dbcon);
    }
}

?>

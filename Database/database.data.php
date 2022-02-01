<?php
class Database
{

    private $server_name = "localhost";
    private $user_name = "root";
    private $password = "";
    private $db_name = "product_review";

    protected function connect()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $connection = new mysqli($this->server_name, $this->user_name, $this->password, $this->db_name);
        $connection->set_charset("utf8mb4");
        return $connection;
    }

    public function create($query)
    {

        $conn = $this->connect();
        if (!$conn->connect_error) {
            $stmt = $conn->prepare($query);
            //$stmt->bind_param('sssss', $parameter);
            $result = $stmt->execute();
            $conn->close();
            if ($result) {
                return 100; // created successfully
            } else {
                return 102; //creation failed
            }
        } else {
            return 404; //connection failed
        }

    }
    public function read($query)
    {

        $conn = $this->connect();
        if (!$conn->connect_error) {
            $stmt = $conn->prepare($query);
            //$stmt->bind_param('sssss', $parameter);
            $stmt->execute();
            $result_data = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result_data) > 0) {
                $data = mysqli_fetch_all($result_data, MYSQLI_ASSOC);
                $conn->close();
                return $data;
            } else {
                $conn->close();
                return 202; // no data found
            }

        } else {
            return 404; //connection failed
        }

    }
    public function update($sql)
    {

        $conn = $this->connect();
        if (!$conn->connect_error) {
            if ($conn->query($sql) === true) {
                return 100; // updated successfully
            } else {
                return 101; // failed to update
            }
        } else {
            return 404; //connection failed
        }
    }
    public function delete($query)
    {

        $conn = $this->connect();
        if (!$conn->connect_error) {
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->affected_rows;
            if ($result > 0) {
                return 100;
            } else if ($result == 0) {
                return 101;
            }

        } else {
            return 404; //connection failed
        }

    }

}

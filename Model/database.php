<?php

require_once "users.php";
require_once "products.php";


class database
{

    private const serverName = "localhost";
    private const database = "pcautomate";
    private const username = "root";
    private const password = "";
    private const connectionString = "mysql:host=" . Database::serverName . ";dbname=" . Database::database;

    private PDO $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(Database::connectionString, Database::username, Database::password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Connection failed: {$exception->getMessage()}");
        }
    }

    public function insertUser(users $users)     //Add new User
    {
        try {
            $query = "INSERT INTO pcautomate.users (`id`, `name`, `email`, `password`, `role`) VALUES (NULL, '{$users->getName()}', '{$users->getEmail()}', '{$users->getPassword()}', '{$users->getRole()}');";
            $statement = $this->connection->prepare($query);
            $statement->execute();
        } catch (PDOException $exception) {
            echo "ERROR : {$exception->getMessage()}";
        }
    }

    public function insertProducts(products $products)     //insert new in table chat
    {
        try {
            $query = "INSERT INTO pcautomate.products (`id`, `name`, `image`, `description`, `price`) VALUES (NULL, '{$products->getName()}', '{$products->getImage()}', '{$products->getDescription()}', '{$products->getPrice()}')";
            $statement = $this->connection->prepare($query);
            $statement->execute();
        } catch (PDOException $exception) {
            echo "ERROR : {$exception->getMessage()}";
        }
    }

    public function updateProducts(int $id, string $name, string $image, string $description, int $price)         //to update products
    {
        try {
            $query = "UPDATE pcautomate.products SET name = '{$name}', image= '{$image}', description='{$description}', price = '{$price}' WHERE id='{$id}'";
            $result = $this->connection->prepare($query);
            $result->execute();
        } catch (PDOException $exception) {
            echo "ERROR : {$exception->getMessage()}";
        }

    }


    public function findID(int $id)                 //to return users info using the id
    {
        try {
            $query = "select * from pcautomate.users where id = '{$id}'";
            $statement = $this->connection->prepare($query);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            foreach ($statement->fetchAll() as $row) {
                $users = new users($row['id'], $row['name'], $row['email'], $row['password'], $row['role']);
                return $users;
            }

        } catch (PDOException $exception) {
            echo "ERROR : {$exception->getMessage()}";
        }
    }

    public function login(string $email, string $password)                     //to check the username and password is right
    {
        try {
            $sql = "SELECT * FROM pcautomate.users WHERE email='$email' AND password='$password'";
            $result = $this->connection->prepare($sql);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);

            foreach ($result->fetchAll() as $row) {
                $users = new users($row['id'], $row['name'], $row['email'], $row['password'], $row['role']);
                return $users;
            }

        } catch (PDOException $exception) {
            echo "ERROR : {$exception->getMessage()}";
        }

    }

    public function checkName(string $name)        //take in username and return the details of the users
    {
        try {
            $query = "SELECT * FROM pcautomate.users WHERE name='{$name}'";
            $result = $this->connection->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $user = array();

            foreach ($result->fetchAll() as $row) {
                $users = new users($row['id'], $row['name'], $row['email'], $row['password'], $row['role']);
                array_push($user, $users);
            }

            return $user;

        } catch (PDOException $exception) {
            echo "ERROR : {$exception->getMessage()}";
        }

    }

    public function checkEmail(string $email)        //take in username and return the details of the users
    {
        try {
            $query = "SELECT * FROM pcautomate.users WHERE email='{$email}'";
            $result = $this->connection->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $user = array();

            foreach ($result->fetchAll() as $row) {
                $users = new users($row['id'], $row['name'], $row['email'], $row['password'], $row['role']);
                array_push($user, $users);
            }

            return $user;

        } catch (PDOException $exception) {
            echo "ERROR : {$exception->getMessage()}";
        }

    }




}
?>

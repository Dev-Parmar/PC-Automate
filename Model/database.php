<?php

require_once "users.php";
require_once "products.php";
require_once "templates.php";

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

    public function insertProducts(products $products)     //insert new in products
    {
        try {
            $query = "INSERT INTO pcautomate.products (`id`, `name`, `image`, `description`,`category`, `price`) VALUES (NULL, '{$products->getName()}', '{$products->getImage()}', '{$products->getDescription()}','{$products->getCategory()}', '{$products->getPrice()}');";
            $statement = $this->connection->prepare($query);
            $statement->execute();
        } catch (PDOException $exception) {
            echo "ERROR : {$exception->getMessage()}";
        }
    }


    public function insertTemplates(templates $templates)
    {
        try {
            $query = "INSERT INTO pcautomate.templates (`id`, `processor`, `motherboard`, `cooler`,`cpucase`, `gpu`, `ram`,`storage`, `power`, `monitor`,`price`) VALUES (NULL, '{$templates->getProcessor()}', '{$templates->getMotherboard()}', '{$templates->getCooler()}','{$templates->getCPUCase()}', '{$templates->getGPU()}', '{$templates->getRAM()}', '{$templates->getStorage()}','{$templates->getPower()}', '{$templates->getMonitor()}', '{$templates->getPrice()}');";
            $statement = $this->connection->prepare($query);
            $statement->execute();
        } catch (PDOException $exception) {
            echo "ERROR : {$exception->getMessage()}";
        }

    }


    public function updateProducts($id, $name, $description, $category ,$price)         //to update products
    {
        try {
            $query = "UPDATE pcautomate.products SET name = '{$name}', description='{$description}', category='{$category}', price = '{$price}' WHERE id='{$id}'";
            $result = $this->connection->prepare($query);
            $result->execute();
        } catch (PDOException $exception) {
            echo "ERROR : {$exception->getMessage()}";
        }

    }

    public function searchProducts($category)
    {
        try {
            $query = "SELECT * FROM pcautomate.products WHERE category='{$category}'";
            $result = $this->connection->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $products = array();

            foreach ($result->fetchAll() as $pr) {
                $product = new products($pr['id'], $pr['name'], $pr['image'], $pr['description'], $pr['category'], $pr['price']);
                array_push($products, $product);
            }
            return $products;

        }catch (PDOException $exception) {
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

    public function getLastID()
    {
        try {
            $query = "SELECT * from pcautomate.products ORDER BY id DESC LIMIT 1";
            $result = $this->connection->prepare($query);
            $result->execute();

            return $result->fetchColumn();

        } catch (PDOException $exception) {
            echo "ERROR : {$exception->getMessage()}";
        }
    }

    public function findProduct(int $id)
    {
        try {
            $query = "select * from pcautomate.products where id = '{$id}'";
            $statement = $this->connection->prepare($query);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            foreach ($statement->fetchAll() as $row) {
                $products = new products($row['id'], $row['name'], $row['image'], $row['description'], $row['category'],$row['price']);
                return $products;
            }

        } catch (PDOException $exception) {
            echo "ERROR : {$exception->getMessage()}";
        }
    }


    public function getTemplates(){
        try {
            $query = "select * from templates";
            $statement = $this->connection->prepare($query);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            $templates = array();

            foreach ($statement->fetchAll() as $row) {
                $template = new templates($row['id'], $row['processor'], $row['motherboard'], $row['cooler'], $row['cpucase'], $row['gpu'], $row['ram'], $row['storage'], $row['power'], $row['monitor'], $row['price']);
                array_push($templates, $template);
            }

            return $templates;

        } catch (PDOException $exception) {
            echo "ERROR : {$exception->getMessage()}";
        }
    }

    public function getShop(){
        try {
            $query = "select * from pcautomate.products";
            $statement = $this->connection->prepare($query);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            $products = array();

            foreach ($statement->fetchAll() as $row) {
                $product = new products($row['id'], $row['name'], $row['image'], $row['description'], $row['category'], $row['price']);
                array_push($products, $product);
            }

            return $products;

        } catch (PDOException $exception) {
            echo "ERROR : {$exception->getMessage()}";
        }
    }



}


?>

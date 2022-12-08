<?php


class DBControler{

    public $conn;

    public function __construct($servername, $dbname, $username, $password)
    {
        $this->conn = new mysqli($servername, $username, $password, $dbname) or die("Não foi possivel conectar".mysqli_connect_error());

    }

    public function envio($envio_nome ,$envio_email ,$envio_cpf ,$envio_tel){

        $sql = "INSERT INTO users (nome, email, cpf, telefone) values ('$envio_nome','$envio_email','$envio_cpf','$envio_tel')";
        mysqli_query($this->conn, $sql);
    
        if ($this->conn->query($sql) === TRUE) {
            echo "Novo registro criado com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function consulta(){
        $select_data = "SELECT * FROM users";
        $query = mysqli_query($this->conn, $select_data);

        while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
            echo "ID: {$row['id']} <br>".
                "Name: {$row['nome']} <br>".
                "Email: {$row['email']} <br>".
                "CPF: {$row['cpf']} <br>".
                "Telefone: {$row['telefone']} <br>".
                "----------------------------<br>";
        }
    }

    public function consultaCPF($valida_cpf){

        $select_users = "SELECT * FROM users WHERE cpf IN ($valida_cpf)";

        $query = mysqli_query($this->conn, $select_users);

        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);

        if(!$row){
            echo "<br>";
            echo "Erro: CPF não encontrado";

        }else{
            echo "<br>--------------------------<br>";
            print_r(json_encode($row));
        }
    }

    public function deleteCPF(){
        $valida_cpf = $_GET['cpf'];

        $select_users = "DELETE * FROM users WHERE cpf IN ($valida_cpf)";

        $query = mysqli_query($this->conn, $select_users);

        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);

        if(!$row){
            echo "<br>";
            echo "Erro: CPF não encontrado";

        }else{
            echo "<br>--------------------------<br>";
            print_r(json_encode($row));
        }
    }
}






?>
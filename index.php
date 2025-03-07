<?php
class Aluno{ 
//propriedade privada
 private $nome;
 private $matricula;
 private $curso;

 //metodo construtor
 public function __construct($nome,$matricula,$curso) {
    $this->nome = $nome;
    $this->matricula = $matricula;
    $this->curso = $curso;
 }

 public function getnome() {
    return $this->nome;
 }

 public function getmatricula() {
    return $this->matricula;
 }

 public function getcurso() {
    return $this->curso;
 }

}

class CadastroAlunos {
    private static $alunos = [];

    public function cadastrarAluno(Aluno $aluno) {
        self::$alunos[] = $aluno;
    }

    public function listarAlunos() {
        if (empty(self::$alunos)) {
            echo "Nenhum aluno cadastrado.<br>";
            return;
        }

        foreach (self::$alunos as $aluno) {
            echo "Nome: " . $aluno->getNome() . "<br>";
            echo "Matrícula: " . $aluno->getMatricula() . "<br>";
            echo "Curso: " . $aluno->getCurso() . "<br><br>";
        }
    }
}

$cadastro = new CadastroAlunos();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $curso = $_POST['curso'];

    $aluno = new Aluno($nome, $matricula, $curso);

    $cadastro->cadastrarAluno($aluno);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastro de Aluno</h1>

    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="matricula">Matrícula:</label>
        <input type="text" id="matricula" name="matricula" required><br><br>

        <label for="curso">Curso:</label>
        <input type="text" id="curso" name="curso" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <h2>Alunos Cadastrados:</h2>
    <?php
    $cadastro->listarAlunos();
    ?>
</body>
</html>
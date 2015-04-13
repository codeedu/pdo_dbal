<?php
require_once __DIR__ . '/vendor/autoload.php';

$config = new \Doctrine\DBAL\Configuration();

$connectionParams = array(
    'dbname' => 'code_dbal',
    'user' => 'root',
    'password' => 'root',
    'host' => 'localhost',
    'port' => 3306,
    'charset' => 'utf8',
    'driver' => 'pdo_mysql',
);
$dbh = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

//Pegar uma categoria
$statement = $dbh->query("SELECT * FROM categorias WHERE id = 1");
$categoria = $statement->fetch();
var_dump($categoria);
echo "<br/><br/>";

//Pegar todas categorias
$statement = $dbh->query("SELECT * FROM categorias");
$categorias = $statement->fetchAll();
var_dump($categorias);
echo "<br/><br/>";

//Pegar um campo de um produto
$statement = $dbh->query("SELECT nome FROM produtos WHERE id = 1");
$nome = $statement->fetchColumn();
echo $nome;
echo "<br/><br/>";

//Pegar coleção de nomes em array
$statement = $dbh->query("SELECT nome FROM produtos");
$nomes = $statement->fetchAll(\PDO::FETCH_COLUMN);
var_dump($nomes);
echo "<br/><br/>";

//Pegar coleção de categorias em array key => value
$statement = $dbh->query("SELECT id, nome FROM categorias");
$categorias = $statement->fetchAll(\PDO::FETCH_KEY_PAIR);
var_dump($categorias);
echo "<br/><br/>";


//Para incluir uma categoria
$dbh->insert('categorias', array('nome' => 'Minha categoria'));

//Para incluir uma categoria
$dbh->update('categorias', array('id' => 1), array('nome' => 'Minha categoria atualizada'));

//Para excluir um produto
$dbh->delete('produtos', array('id' => 1));


//Pegar produtos que tem a categoria 2
$query = $dbh->createQueryBuilder();
$query->select('p.*')
    ->from('produtos', 'p')
    ->where('p.categoria_id = :categoria')
    ->setParameter(':categoria', 2);
;
$statement = $query->execute();
$produtos = $statement->fetch();
var_dump($produtos);
echo "<br/><br/>";

//Pegar todos produtos e suas respectivas categorias
$query = $dbh->createQueryBuilder();
$query->select('p.nome as produto,c.nome as categoria')
    ->from('produtos', 'p')
    ->leftJoin('p','categorias','c','c.id = p.categoria_id');
;
$statement = $query->execute();
$produtos = $statement->fetch();
print_r($produtos);
echo "<br/><br/>";
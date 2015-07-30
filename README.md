Substituindo PDO por Doctrine DBAL
=======================

Sobre este exemplo
------------
O PDO é uma biblioteca PHP de abstração de dados para trabalhar com banco de dados, 
desde que ela foi lançada no PHP 5, mudou-se a forma de como manipular a comunicação com banco de dados, 
trazendo inúmeras melhorias. A primeira claramente, é deixando a manipulação procedural de lado para focar na orientação a objetos e 
também as melhorias quanto a facilidade de manipulação de dados. Mas ainda assim, 
trabalhar com SQL puro pode se tornar maçante e/ou chato, porque, às vezes os comandos são grandes e/ou complexos, 
dando margem para erros que atrasam nosso desenvolvimento e manutenção das aplicações. 
O PDO é fantástico para manipular banco de dados, porém, para um banco de dados mais complexo, 
ele pode não ser adequado, por isto, mostro uma alternativa para trabalhar no topo dele.

Usaremos o Doctrine DBAL, que é um componente do framework Doctrine, este componente 
é uma abstração de dados acima do PDO, ou seja, abstrai mais ainda a manipulação do banco de dados. 
No final das contas, por trás, ele usa o PDO mesmo, mas, traz uma abstração absurda quanto a manipulação das queries.
[Veja o link do tutorial](http://www.schoolofnet.com/2015/04/substituindo-o-pdo-por-doctrine-dbal/)
 
Para usar execute:
 
php composer.phar install

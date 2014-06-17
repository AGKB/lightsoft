<?php
header('Content-type: text/html; charset=utf-8');

spl_autoload_register(function ($class) {
    include  $class . '.class.php';
});


/**
 *  Выборка всех категорий верхнего уровня, начинающихся на 'auto'
 */
$query = "SELECT
            *
          FROM
            category
          WHERE
            `name` LIKE 'auto%'
          AND
            parent_category_id = 0";
echo "1) <i>Выборка всех категорий верхнего уровня, начинающихся на 'auto':</i><br>".PHP_EOL;
getResult($query);
echo '<hr><br>';

/**
 * Выборка всех категорий, имеющих не более трёх подкатегорий следующего уровня (без глубины)
 */
$query = "SELECT
            a.parent_category_id AS id, a.name, COUNT(b.id) AS cnt
          FROM
            category a
          LEFT JOIN
            category b
              ON (a.id = b.parent_category_id)
          GROUP BY
            a.parent_category_id
          HAVING
            cnt < 4";
echo "2) <i>Выборка всех категорий, имеющих не более трёх подкатегорий следующего уровня (без глубины):</i><br>".PHP_EOL;
getResult($query);
echo '<hr><br>';


/**
 * Выборка всех категорий нижнего уровня (т.е. не имеющих детей)
 */
$query = "SELECT
            *
          FROM
            category
          WHERE
            id
          NOT IN(
                  SELECT
                    parent_category_id
                  FROM
                    category
                  WHERE
                    parent_category_id > 0
                 )
          AND
            parent_category_id > 0";
echo "3) <i>Выборка всех категорий нижнего уровня (т.е. не имеющих детей):</i><br>".PHP_EOL;
getResult($query);
echo '<hr><br>';

function getResult($query) {
    try {
        $result = Config::getConnect()->query($query);
        while ($row = $result->fetch()) {
           echo 'id: '.$row['id'].',  name: '.$row['name'].'<br>'.PHP_EOL;
        }
    }
    catch (PDOException $e) {
        echo $e->getMessage().'<br>'.PHP_EOL;
        echo $e->getFile().'<br>'.PHP_EOL;
        echo $e->getLine().'<br>'.PHP_EOL;

    }

}


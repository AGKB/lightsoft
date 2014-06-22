See test tasks: http://job.lightsoft.ru/makeTest?key=f0d2a8e58dfe03b7c29c6c08a69b2ce9
###1) JS/HTML/CSS
Дано:
    table .c { color: red }
    .a .c { color: green }

    <table id=”t”>
        <tr>
            <td class=”c”>Текст</td>
        </tr>
    </table>
Задача: написать JavaScript код, делающий “Текст” зелёным, предложите как минимум три варианта
(можно больше) (1-2 могут использовать JS библиотеки) только самого кода.
###2) DB
Дана таблица с деревом категорий:
    CREATE TABLE category (
        id integer not null primary key,
        parent_category_id integer references category(id),
        name varchar(100) not null
    );
Напишите запросы (БД - “правильная”, умеющая делать подзапросы, различные соединения и прочее):
1.  На выборку всех категорий верхнего уровня, начинающихся на “авто”
2.  На выборку всех категорий, имеющих не более трёх подкатегорий следующего уровня (без глубины)
3.  На выборку всех категорий нижнего уровня (т.е. не имеющих детей)









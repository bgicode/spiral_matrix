<!DOCTYPE html> 
<html> 
  <head> 
    <title>spiral</title> 
  </head> 
  <body> 
     <table>
        <?php
            $n = 5;
            $martixVolum = pow($n, 2);
            $k = 1;
            $matrix = array();
            $celReducer = 0;

            for ($i = 0; $i < $n; $i++) { //создание матрицы нужно размерности заполенной 0-ми
                for ($j = 0; $j < $n; $j++) {
                    $matrix[$i][$j] = 0;
                }
            }

            while ($k <=  $martixVolum){ //матрица переписывается пока не закончатся все элементы
                //каждая проходка заполняет контур углубляющийся внутрь матрицы
                for ($i = $celReducer; $i <= $n-$celReducer - 1; $i++) {
                    for ($j = $celReducer; $j <= $n-$celReducer - 1; $j++) {
                        if ($i>$celReducer and $j == $n - 1 - $celReducer and $i != $n - 1 - $celReducer) { //правый контур 
                            $matrix[$i][$n - 1 - $celReducer] = $k;
                            $k++;
                        }
                        else if ($i == $celReducer) { //верхний контур
                            $matrix[$i][$j] = $k;
                            $k++;
                        } 
                    }
                    if ($i == $n - 1 - $celReducer and $n - $celReducer * 2 != 1){ //нижний контур в обратном порядке , последняя иттерация не производится если размерность перебираемой части матрицы уменьшилась до одного
                        for ($j = $n - 1 - $celReducer; $j >= $celReducer; $j--) { 
                            $matrix[$i][$j] = $k;
                            $k++;
                        }
                    }
                }
                // цикл прошёл все строки матрицы
                // далее новая проходка строк в обратном порядке
                for ($i = $n - 2 - $celReducer; $i > $celReducer; $i--) { //заполнение левого контура
                    $matrix[$i][$celReducer] = $k;
                    $k++;
                }

                $celReducer++; //счётчик стягивания матрицы

            }

            foreach ($matrix as $row) {
                echo "<tr>";
                foreach ($row as $col){
                    echo "<td>";
                    echo $col;
                    echo "</td>";
                }
                echo "</tr>";
            }
        ?>
     </table>
  </body> 
</html>

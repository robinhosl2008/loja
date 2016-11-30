<?php
/**
 * Created by PhpStorm.
 * User: robson
 * Date: 24/11/16
 * Time: 15:29
 */

    require_once "cabecalho.php";
?>

<h3>Relatório de Uso do Disco Rígido</h3>

<?php

    // Função que converte bytes em gbytes.
    function By2M($size){
        $filesizename = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
        return $size ? round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $filesizename[$i] : '0 Bytes';
    }

    // Sistemas de arquivo Linux.
    $discoLivre1 = disk_free_space("/");
    $discoTotal1 = disk_total_space("/");
    echo "Espaço total do disco: "; echo $discoTotal1; echo "<br />";
    echo "Espaço disponível: "; echo $discoLivre1; echo "<br />"; echo "<br />";

    $gbTotal1 = By2M($discoTotal1);
    echo "Espaço total do disco: ".$gbTotal1."<br />";

    $gbLivre1 = By2M($discoLivre1);
    echo "Espaço disponível no disco: ".$gbLivre1."<br /><br />";

    // Cálculo para exibir o espaço usado no disco
    $totalUsado1 = $discoTotal1 - $discoLivre1;
    echo "<h4>Total Usado no Disco</h4>"; ?>

    <div>
        <progress class="progress" style='width: 500px' max='<?php echo $discoTotal1; ?>' value='<?php echo $totalUsado1; ?>'></progress>
    </div>



<?php

    // Sistema de arquivos Windows.
    $discoLivre2 = disk_free_space("C:");
    $discoTotal2 = disk_total_space("C:");
    echo "Espaço total do disco: "; echo $discoTotal2; echo "<br />";
    echo "Espaço disponível: "; echo $discoLivre2; echo "<br />"; echo "<br />";

    $gbTotal2 = By2M($discoTotal2);
    echo "Espaço total do disco: ".$gbTotal2."<br />";

    $gbLivre2 = By2M($discoLivre2);
    echo "Espaço disponível no disco: ".$gbLivre2."<br /><br />";

    // Cálculo para exibir o espaço usado no disco
    $totalUsado2 = $discoTotal2 - $discoLivre2;
    echo "<h4>Total Usado no Disco</h4>"; ?>

    <div>
        <progress class="progress" style='width: 500px' max='<?php echo $discoTotal2; ?>' value='<?php echo $totalUsado2; ?>'></progress>
    </div>

<?php
    require_once("rodape.php");
?>
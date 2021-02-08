<?php 

//Pour cette partie j'ai retrouvé le code issus de https://www.codexworld.com/export-data-to-excel-in-php/ en changant les valeurs nécessaires

$Connect = mysqli_connect( "127.0.0.1", "root", "", "tdparfumerie-3");
if(!$Connect){
    echo"erreur connexion";
    
    }else{
 
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "members_export_data-" . date('Ymd') . ".xlsx"; 
 
// Column names 
$fields = array('NumCommande', 'CodeClient', 'DateCommande', 'MontantTotal', 'Observation', 'FraisLivraison', 'Promotion', 'nbPointsGagne', 'PointsTotals', 'StatuCommande'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Get records from the database 
$query = $Connect->query("SELECT * FROM Commande ORDER BY numCommande ASC"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    $i=0; 
    while($row = $query->fetch_assoc()){ $i++; 
        $rowData = array( $row['NumCommande'], $row['CodeClient'], $row['DateCommande'], $row['MontantTotalCommande'], $row['Observation'],$row['FraisLivraison'], $row['Promotion'],$row['nbPointsGagnes'], $row['pointsTotals'],$row['StatutCommande']); 
        array_walk($rowData, 'filterData'); 
        $excelData .= implode("\t", array_values($rowData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
     
} 
 
// Headers for download 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
header("Content-Type: application/vnd.ms-excel"); 
 
// Render excel data 
echo $excelData; 
 
    }
    ?>
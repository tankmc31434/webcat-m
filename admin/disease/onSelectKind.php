<?php
include('./config.php');
include('../lib/function.php');
include('../lib/connect.php');
include('../lib/session.php');

if(!empty($_REQUEST['oldSym'])){
    $data_check_typeid = $_REQUEST['oldSym'] ;
}else{
    $data_check_typeid ="";
}


$table_symptom = "symptom";
$sql_cat = "SELECT " . $table_symptom . "_id," . $table_symptom . "_subject FROM ".$table_symptom;
$sql_cat = $sql_cat . "  WHERE " . $table_symptom . "_kind ='" . $_REQUEST['kind'] . "'   ";
$sql_cat = $sql_cat . "  ORDER BY " . $table_symptom . "_id DESC  ";


?>

<select class="js-example-basic-multiple form-control border border-4 rounded" name="symptom[]" multiple="multiple" style="width: 100%;height:36px;background-color:#ededed">
    <?php
    $query_cat = QueryDB($coreLanguageSQL, $sql_cat);
    while ($row_cat = FetchArrayDB($coreLanguageSQL, $query_cat)) {
        $row_catid = $row_cat[0];
        $row_catname = $row_cat[1];
    ?>
        <option value="<?php echo $row_catid ?>"><?php echo $row_catname ?></option>
    <?php  } ?>

</select>

<script language="JavaScript" type="text/javascript">
</script>
<?php
include("../lib/disconnect.php");
?>
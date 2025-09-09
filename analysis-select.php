<?php
include("./lib/session.php");
include("./lib/connect.php");

$check = $_REQUEST['new_value'];
$id = $_REQUEST['id'];
$arrrand = array();
$arrset = array();


$_SESSION['valuein'] = array();
$_SESSION['valuenotin'] = array();

// print_pre($_SESSION);
// if (!isset($_SESSION['valuekind'])) {
//     $_SESSION['valuekind'] = "";

// }

$AllID = array_merge($_SESSION['valuenotin'], $_SESSION['valuein']);
if (!empty($AllID)) {
    if ($check == '0') {
        if (!in_array($id, $AllID)) {
            array_push($_SESSION['valuein'], $id);
        }
    } else if ($check == '1') {

        if (!in_array($id, $AllID)) {
            array_push($_SESSION['valuenotin'], $id);
        }
    } else {
        $_SESSION['valuekind'] = $check;
    }
} else {
    if ($check == '0') {
        array_push($_SESSION['valuein'], $id);
    } else if ($check == '1') {
        array_push($_SESSION['valuenotin'], $id);
    } else {
        $_SESSION['valuekind'] = $check;
    }
}

$table = 'disease';
$slect_data = array();
$slect_data["disease_symptom as s_id"] = "";
$slect_data["disease_id as d_id"] = "";
$slect_data["disease_kind as kind"] = "";
$sql = "SELECT \n" . implode(",\n", array_keys($slect_data)) . " FROM " . $table;
if ($_SESSION['valuekind'] != "") {
    $sql .= " WHERE disease_kind = '" . $_SESSION['valuekind'] . "'";
}
if (!empty($_SESSION['valuein'])) {
    foreach ($_SESSION['valuein'] as $val) {
        $sql .= " AND disease_symptom REGEXP '.*;s:[0-9]+:\"" . $val . "\".*'";
    }
}
if (!empty($_SESSION['valuenotin'])) {
    foreach ($_SESSION['valuenotin'] as $val) {
        $sql .= " AND disease_symptom NOT REGEXP '.*;s:[0-9]+:\"" . $val . "\".*'";
    }
}


$Query = $db->execute($sql);
// print_pre($sql);
// print_pre($_SESSION['valuein']);

$checkcount = $Query->_numOfRows;

if ($checkcount > 1) {


    foreach ($Query as $key) {
        array_push($arrset, $key);
    }
    $arrrand = array_rand($arrset, 1);

    $table2 = 'disease';
    $symptomrand = "";

    $slect_data2 = array();
    $slect_data2[$table2 . "_id as " . substr("_id", 1)] = "";
    $slect_data2[$table2 . "_symptom as " . substr("_symptom", 1)] = "";
    $sql2 = "SELECT \n" . implode(",\n", array_keys($slect_data2)) . " FROM " . $table2;
    $sql2 .= " WHERE disease_status = 'Enable' AND disease_kind = '" . $_SESSION['valuekind'] . "'";
    $sql2 .= " AND disease_id = '" . $arrset[$arrrand]['d_id'] . "'";
    $Query2 = $db->execute($sql2);

    $Row = $Query2->FetchRow();
    $valSymptom = unserialize($Row[1]);
    $symptomrand = array_rand($valSymptom);

    // new random when in array
    if (!empty($AllID)) {

        if (in_array($valSymptom[$symptomrand], $AllID)) {
            $symptomrand = array_rand($valSymptom);
        }

        // do{
        //     $symptomrand = array_rand($valSymptom);
        // }while(in_array($valSymptom[$symptomrand], $AllID));
    }

    // วิเคราะห์อาการสัตว์เลี้ยงจากอาการที่เลือกทีละข้อ ถ้าระบบยังวิเคราะห์ไม่ได้จะถามอาการต่อไปเรื่อย ๆ จนกว่าจะพบโรคที่ตรงกับอาการ หรือแจ้งว่าไม่พบผลวิเคราะห์


    $table3 = 'symptom';
    $slect_data3 = array();
    $slect_data3[$table3 . "_id as " . substr("_id", 1)] = "";
    $slect_data3[$table3 . "_subject as " . substr("_subject", 1)] = "";
    $sql3 = "SELECT \n" . implode(",\n", array_keys($slect_data3)) . " FROM " . $table3;
    $sql3 .= " WHERE symptom_id = '" . $valSymptom[$symptomrand] . "'";

    $Query3 = $db->execute($sql3);
    $Row2 = $Query3->FetchRow();
    $subject = $Row2['subject'];
    $idsymptom = $Row2['id']

?>
    <div class="row py-5">
        <div class="col text-center">
            <div class="subtitle typo-xl fw-bold text-secondary">
                <input type="hidden" name="id" id="id" value="<? echo $idsymptom ?>"></input>
                <p class="text-center titile-question">สัตว์เลี้ยงของคุณมีอาการ <? echo $subject ?>?</p>
            </div>
        </div>
    </div>
    <div class="row py-5">
        <div class="col text-center choice-question">
            <div class="form-check form-check-inline mx-5 typo-lg">
                <input class="form-check-input" type="radio" name="question" id="inlineRadio1" value="0" checked>
                <label class="form-check-label" for="inlineRadio1"><b>ใช่</b></label>
            </div>
            <div class="form-check form-check-inline mx-5 typo-lg">
                <input class="form-check-input" type="radio" name="question" id="inlineRadio2" value="1">
                <label class="form-check-label" for="inlineRadio2"><b>ไม่ใช่</b></label>
            </div>
        </div>
    </div>
    <div class="row py-5 my-5">
        <div class="col text-center">
            <button class="btn" type="button" onclick="StepValue();" style="background-color: white;border-radius:5px;border:3px solid #867070">ถัดไป</button>
        </div>
    </div>
<?


} elseif ($checkcount == 1) {
    $Row = $Query->FetchRow();
    $d_id = $Row[1];
    $table2 = 'disease';
    $symptomrand = "";

    $slect_data2 = array();
    $slect_data2[$table2 . "_id as " . substr("_id", 1)] = "";
    $slect_data2[$table2 . "_subject as " . substr("_subject", 1)] = "";
    $slect_data2[$table2 . "_pic as " . substr("_pic", 1)] = "";
    $sql2 = "SELECT \n" . implode(",\n", array_keys($slect_data2)) . " FROM " . $table2;
    $sql2 .= " WHERE disease_status = 'Enable' AND disease_kind = '" . $_SESSION['valuekind'] . "'";
    $sql2 .= " AND disease_id = '" . $d_id . "'";
    $Query2 = $db->execute($sql2);

    $Row2 = $Query2->FetchRow();
    $namedisease = $Row2[1];
    $pic = $Row2[2];
?>
    <div class="row py-5">
        <div class="col text-center">
            <div class="subtitle typo-xl fw-bold text-secondary">
                <p class="text-center titile-question">สัตว์เลี้ยงของคุณอาจจะเป็นโรค ... <? echo $namedisease ?></p>
            </div>
        </div>
    </div>
    <?php if (is_file('upload/disease/' . $pic)) { ?>
        <div class="row py-5">
            <div class="col text-center choice-question">
                <div>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="ratio ratio-16x9">
                                <?php if (is_file('upload/disease/' . $pic)) { ?>
                                    <img src="<?php echo $core_template; ?>upload/disease/<? echo $pic ?>" alt="" />
                                <?php } else { ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <? } ?>
    <div class="row py-5 my-5">
        <div class="col text-center">
            <? if ($_SESSION['valuekind'] == "แมว") { ?>
                <button class="btn" type="button" style="background-color: white;border-radius:5px;border:3px solid #867070" onclick="location.href='disease-cat-detail.php?id=<? echo $d_id ?>'">คลิกลิงค์</button>

            <? } else { ?>
                <button class="btn" type="button" style="background-color: white;border-radius:5px;border:3px solid #867070" onclick="location.href='disease-dog-detail.php?id=<? echo $d_id ?>'">คลิกลิงค์</button>
            <? } ?>
        </div>
    </div>
<?
    $_SESSION['valuein'] = array();
    $_SESSION['valuenotin'] = array();
} else {
?>
    <div class="row py-5">
        <div class="col text-center">
            <div class="subtitle typo-xl fw-bold text-secondary">
                <p class="text-center titile-question">ไม่พบผลวิเคราะห์โรค เนื่องด้วยทางระบบมีข้อมูลโรคไม่พอ โปรดเข้าปรึกษาแพทย์</p>
            </div>
        </div>
    </div>
<?
    $_SESSION['valuein'] = array();
    $_SESSION['valuenotin'] = array();
}
$db->close();
?>
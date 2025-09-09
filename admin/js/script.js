function checkLoginUser() {

    var TYPE = "POST";
    var URL = "./login.php";

    var dataSet = jQuery("#myFormLogin").serialize();
        jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            // alert("login success");
            jQuery("#loadCheckComplete").html(html);
        }
    });
}

function checkLogoutUser(url) {

    var TYPE = "POST";
    var URL = url;

    var dataSet = {};
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#loadCheckComplete").html(html);
        }
    });
}

function viewContactNew(fileAc) {


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#boxContantLoad").show();
            jQuery("#boxContantLoad").html(html);

        }
    });
}

function editContactNew(fileAc, id) {
    document.myForm.action = fileAc;
    document.myForm.submit();
}

function delContactNew(fileAc) {


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

        }
    });
}

function btnBackPage(fileAc) {
    document.myForm.action = fileAc;
    document.myForm.method = 'POST';
    document.myForm.submit();
 }

 function changeStatus(loaddder, tablename, statusname, statusid, loadderstatus, fileAc) {

    jQuery("#" + loaddder + "").show();

    var TYPE = "POST";
    var URL = fileAc;
    var dataSet = {
        Valueloaddder: loaddder,
        Valuetablename: tablename,
        Valuestatusname: statusname,
        Valuestatusid: statusid,
        Valueloadderstatus: loadderstatus,
        Valuefilestatus: fileAc
    };


    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#" + loadderstatus + "").show();
            jQuery("#" + loadderstatus + "").html(html);
            jQuery("#" + loaddder + "").hide();
        }
    });
}

function delContactNew(fileAc) {


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);

        }
    });
}

function openSelectType(fileAc) {

      
       var TYPE="POST";
       var URL=fileAc;
   
       var dataSet= jQuery("#myForm").serialize();
   
           jQuery.ajax({type:TYPE,url:URL,data:dataSet,
           success:function(html){
   
               jQuery("#boxChangeType").show();
               jQuery("#boxChangeType").html(html);
               $('.js-example-basic-multiple').select2();
   
           }
       });
   }
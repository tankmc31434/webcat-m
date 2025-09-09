function checkLoginUser() {

    var TYPE = "POST";
    var URL = "./login-member.php";

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

function registerUser() {

    var TYPE = "POST";
    var URL = "./register-member.php";

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

function success(fileAc) {
    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#loadCheckComplete").html(html);
        }
    });
}
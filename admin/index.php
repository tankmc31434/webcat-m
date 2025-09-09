<?
include("./lib/function.php");
include("./lib/session.php");
// include("./lib/checkMember.php");
// print_pre($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="webpet admin">
    <meta name="description" content="webpet admin">
    <meta name="robots" content="noindex,nofollow">
    <title>webpet admin</title>
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script language="JavaScript" type="text/javascript" src="./js/jquery-1.9.0.js"></script>
    <script language="JavaScript" type="text/javascript" src="./js/script.js"></script>
    <script language="JavaScript" type="text/javascript">
        jQuery(function() {
            jQuery('form#myFormLogin').submit(function() {

                with(document.myFormLogin) {
                    if (inputUsername.value == '') {
                        inputUsername.focus();
                        return false;
                    }
                    if (inputPassword.value == '') {
                        inputPassword.focus();
                        return false;
                    }
                }
                checkLoginUser();
                return false;
            });
        });
    </script>
</head>

<body >
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form action="javascript:void(0);" method="post" name="myFormLogin" id="myFormLogin">
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h2 class="fw-bold mb-2 text-uppercase">Admin Login</h2>
                                    <p class="text-white-50 mb-5">Please enter your login and password!</p>
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="inputUsername" id="inputUsername" class="form-control form-control-lg" placeholder="Username" autocomplete="off" />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="inputPassword" id="inputPassword" class="form-control form-control-lg" placeholder="Password" autocomplete="off" />
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="loadCheckComplete"></div>
    </section>
</body>

</html>
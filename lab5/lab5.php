<?php
include '../templates/header.php';
$allowedPages=Array("help"=>"help.html","index"=>"index.html","about"=>"about.html");

if (isset($_GET["page"]))
{

    if(isset($allowedPages[$_GET["page"]]))
        {include './pages/' . $allowedPages[$_GET["page"]];}
    else { include './pages/notfound.html';}    

}
else
{
    include './pages/index.html';
}
?>


<?php
include '../templates/footer.php';
?>
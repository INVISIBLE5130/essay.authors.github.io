<?php
if (!$item)
  $item = json_decode(file_get_contents('cache/articles/'.$ex[2].'.json'));
if (!$item)
{
    header("HTTP/1.0 404 Not Found");
    die();
}

//$item->article = str_ireplace('<a', '<a rel="nofollow"', $item->article);

$comments = json_decode(file_get_contents('cache/comments/'.$ex[2].'.json'));

include ('header.php');

function stringInsert($str,$insertstr,$pos)
{
    $str = substr($str, 0, $pos) . $insertstr . substr($str, $pos);
    return $str;
} 

for ($i=strlen($item->article);$i>=0;$i--)
  if (!is_numeric($item->article[$i-1]) && $item->article[$i]==',' && $item->article[$i+1]==' ')
    break;

//$item->article = stringInsert($item->article, '<a href="https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" target="_blank" style="padding: 0; color: rgb(212, 77, 68);"><img src="https://'.$_SERVER['HTTP_HOST'].'/i/'.(($item->title)?sluggify($item->title):sluggify($item->name)).'.gif" width="1px" height="1px" border="0" alt="'.(($item->title)?$item->title:$item->name).'"></a>',$i);


$articles = json_decode(file_get_contents('cache/articleslist.json'));
array_reverse($articles);

$tags = json_decode(file_get_contents('cache/tags.json'));

$chars = array();

for ($i=65;$i<=90;$i++)
{

    $chars2[chr($i)]=array();
    $charsspec[chr($i)]=array();
}

foreach ($tags as $key => $value) 
    $charsspec[substr(trim($value->name), 0,1)][]=$value;


foreach ($articles as $key => $value) 
{


    if ($value->status!='Public')
        continue;

    $chars2[substr(trim($value->name), 0,1)][]=$value;
}


$inject = '<script type="text/javascript">
var partner_id = 18808;
var sub_id = "1";
(function() {
var sc = document.createElement("script"); sc.type = "text/javascript"; sc.async = true;
sc.src = "https://www.edu-profit.com/orderformph-new.js";
var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(sc, s);
})();
</script>
<center><div id="orderformph-new"></div></center>';

$ll = round(strlen($item->body)/2);
$item->body = stringInsert($item->body, $inject, strpos($item->body, '</p>', $ll)+4);


?>

   <section class="page__header">
        <div class="page__header-col"></div>
        <div class="page__header-col"></div>
    </section>
    <div class="right-banner_wrapper">
        <img class="right-banner_wrapper-close" src="./img/close.svg" alt="Close">
        <script type="text/javascript">
            var partner_id = 18808;
            var sub_id = "1";
            var bg_calc_button_color_ph_new_design_cust_calc = "eca230";
            var bg_active_button_color_ph_new_design_cust_calc = "e7a033";
            var font_button_color_ph_new_design_cust_calc = "ffffff";
            var academic_level_ph_new_design_cust_calc = "6";
            (function () {
                var sc = document.createElement('script');
                sc.type = 'text/javascript';
                sc.async = true;
                sc.src = 'https://www.edu-profit.com/orderformph-new2.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(sc, s);
            })();
        </script>
        <div id="orderformph-new-2"></div>
    </div>
    <section class="page__wrap">
        <div class="page__wrap-block wow clipInLeft"></div>
        <div class="page__content wow clipInDown">
            <div class="page__col" style="flex-basis: 0vw">
            </div>
            <div class="page__col">
                <h1 class="page__name"><?=$item->name?></h1>
                <?=trim($item->body)?>

            </div>
        </div>
        
        <div class="block-essay__col block-essay__col_head page__need">
            <div class="block-essay__need">
                <h2 class="need__title"> Need a custom<br>essay?</h2>
                <h5 class="need__subtitle">We will write it for you.</h5><a class="main-btn need__btn" href="/order">Order now</a>
            </div>
        </div>
    </section>

<?php
include ('footer.php');
?>
<?php
include ('header.php');

$calculator = json_decode(file_get_contents('cache/calculator/calculator.json'));

foreach ($calculator->prices as $element)
{
    $prices[] = '"'.$element->paperTypeGroups.'-'.$element->academicLevels.'-'.$element->workTypes.'-'.$element->deadlines.'":{"price":'.$element->price.', "key":'.$element->key.'}';
}

print "<script>var prices = {".join(",",$prices)."};</script>";

?>
<script>
function parseQuery(queryString) {
    var query = {};
    var pairs = (queryString[0] === '?' ? queryString.substr(1) : queryString).split('&');
    for (var i = 0; i < pairs.length; i++) {
        var pair = pairs[i].split('=');
        query[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1] || '');
    }
    return query;
}    
function calc(data)
{
    var p = parseQuery(data);
    
    //console.log(prices[p.paperTypeGroups+'-'+p.academicLevels+'-'+p.workTypes+'-'+p.deadlines]*p.pages);
    $('#price').text("$"+prices[p.paperTypeGroups+'-'+p.academicLevels+'-'+p.workTypes+'-'+p.deadlines].price*p.pages);
};
</script>

        <h1 class="page__title">
            <div class="title__text">Cheap Essay Writing Service to Relieve You from Worries</div>
        </h1>
        <div class="page__content page__content_right">
            <div class="page__col page__col_right">
                <div class="main__card-small services__form">
                    <div class="card-small__title">
                        <h4 class="card-small__header">
                            <div class="title__text">Calculate your price</div>
                        </h4>
                    </div>
                    <form class="form" action="#" id="calculator">
                         <div class="form__group form__group_main">
                            <div class="select-style">
                                <div class="select-style__text">Type of paper:</div><select name="paperTypeGroups" id="paperTypeGroups">
                                    <?php  foreach($calculator->paperTypeGroups as $value) { ?>
                                    <option class="select-dropdown__list-item" value="<?=$value->id?>" name="<?=$value->text?>"><?=$value->text?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <div class="form__group form__group_main">
                        <div class="select-style">
                            <div class="select-style__text">Academic level :</div><select name="academicLevels" id="academicLevels">
                                    <?php  foreach($calculator->academicLevels as $value) { ?>
                                    <option class="select-dropdown__list-item" value="<?=$value->id?>" name="<?=$value->text?>"><?=$value->text?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form__group form__group_main">
                        <div class="select-style">
                            <div class="select-style__text">Deadline:</div><select name="deadlines" id="deadlines">
                                    <?php  foreach($calculator->deadlines as $value) { ?>
                                    <option class="select-dropdown__list-item" value="<?=$value->id?>" name="<?=$value->text?>"><?=$value->text?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form__group form__group_main">
                        <div class="select-style">
                            <div class="select-style__text">Work types:</div><select name="workTypes" id="workTypes">
                                    <?php  foreach($calculator->workTypes as $value) { ?>
                                    <option class="select-dropdown__list-item" value="<?=$value->id?>" name="<?=$value->text?>"><?=$value->text?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form__group form__group_main">
                        <div class="select-style">
                            <div class="select-style__text">Pages:</div><select name="pages" id="pages">
                                    <?php  for($i=1;$i<100;$i++) { ?>
                                    <option class="select-dropdown__list-item" value="<?=$i?>" name="<?=$i?> Pages"><?=$i?> Pages</option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form__group form__group_main-last">
                        <div class="select-style__text">Price: <span class="form__accent-text" id="price">$0</span></div><button class="main-btn main-btn_transparent ml-2 main__next-btn" action="#" onclick="calc($( '#calculator' ).serialize()); return false;" type="submit">Next Step</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="page__col page__col_right">
                <div class="page__image-wrap page__image-wrap_right">
                    <picture class="cover op-top">
                        <source class="cover op-top" srcset="/img/page/services.webp" type="image/webp" alt="Our services">
                        <source class="cover op-top" srcset="/img/page/services.png" type="image/jpeg" alt="Our services"><img class="cover op-top" srcset="/img/page/services.png" alt="Our services"></picture>
                </div>
            </div>
        </div>
        <div class="services__content">
            <p class="page__text">It is impossible to graduate without experiencing academic writing difficulties on your way to the desired degree. The main source of students’ problems and frustration surely is homework. While you may be straight-A learner, who works like a beaver in class, there is no way you can be absolutely immune to homework projects that seem unachievable. A whole range of obstacles can arise on your way to success: short deadlines, boring topics, and unclear instructions are just a small subset of all troubles that may occur. Not to mention your personal and social life. Sometimes, your college days become so gloomy that you have no idea how to pull everything off and you say: “I wish someone else could write my essay!” When the deadlines are melting down and the number of tasks continues to grow, there is something to be done about that.</p>
            <p class="page__text">We have a great idea to offer. EssaysWriting.org can become your personal writing helper and the best place to order essays online. We know how it feels to be left face to face with your tasks having nobody to support you. No need to panic – we provide solutions for all kinds of students’ issues and you are most welcome to benefit from them. Our professional writing team will eagerly accept your request and tailor a truly-amazing paper of the highest quality. Writing essays is our duty and passion. We back you up with numerous guarantees and provide a great deal of cool features that will make your ordering experience not just safe and convenient, but enjoyable! If you are willing to know more about our offers, continue reading and get ready to place your order!</p>
            <h5 class="services__subtitle">Professional Essay Writer As Your Dedicated Personal Assistant</h5>
            <p class="page__text">First and foremost, we would like to start with presenting our fantastical writing team. We know that each and every student dreams of having someone, who can undertake all of his/her assignments and make short work of them. Hiring a professional essay writer is like having a magical homework-elf, who tailors your papers while you are having rest. We bet that you would appreciate cooperation with someone like this:</p>
            <ul class="page__list services__list">
                <li class="page__list-item">Start with small orders. This will reduce the percentage of the lost amount of money if it turns out the resource is not present.</li>
                <li class="page__list-item">Pre-ordered work. Before the start of training, you can even learn the curriculum, to not order essays at the last moment before the deadline.</li>
                <li class="page__list-item">Typically, the greatest load on the work on writing sites come in the spring or late winter and summer.</li>
            </ul>
        </div>
    </div>
<?php
include ('footer.php');
?>
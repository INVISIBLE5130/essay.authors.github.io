<?php
include ('header.php');

function ashuffle (&$arr) {
    uasort($arr, function ($a, $b) {
        return rand(-1, 1);
    });
}

$articles = json_decode(file_get_contents('cache/articleslist.json'));

$categories = json_decode(file_get_contents('cache/categories.json'));
$ar=array();
foreach ($articles as $k=>$v)
    array_unshift($ar, $v);
$articles = $ar;


$tags = json_decode(file_get_contents('cache/tags.json'));

$chars = array();

for ($i=65;$i<=90;$i++)
{
  $chars[chr($i)]=array();
  $chars2[chr($i)]=array();
}

foreach ($articles as $key => $value) 
{

    if ($value->status!='Public')
        continue;

    foreach ($value->tags_id as $kk=>$vv)
    {
        if (!$chars[substr(trim($value->tags_id[$kk]->name), 0,1)]['id'.$value->tags_id[$kk]->id])
            $chars[substr(trim($value->tags_id[$kk]->name), 0,1)]['id'.$value->tags_id[$kk]->id] = $value->tags_id[$kk];
    }
    //print_r($chars);
    $chars2[substr(trim($value->name), 0,1)][]=$value;

}

$arr_articles = (array)$articles;


?>
    <section class="main">
        <div class="main__col">
            <div class="main__left-wrap">
                <h1 class="main__slogan">
                    <div class="white">Search our </div>free essays <div class="white">and resources</div>
                </h1>
                <div class="search__container">
                    <form class="search__form" action="/search" method=post><input class="search__input" type="text" name="search"><input class="search__button" alt="Search" type="image" src="/img/icons/search.svg"></form>
                </div>
                <ul class="list main__list">
                    <li class="list__item main__list-item white">Find thousands of free essay topics in various niches from the expert writers.</li>
                    <li class="list__item main__list-item white">Looking for someone professional to write your academic essay?</li>
                    <li class="list__item main__list-item white">Get access to our top academic writers and request them to write an excellent, rewarding essay on the topic of your choice. We are here to assist you with professional essay writing services 24/7.</li>
                </ul>
            </div>
        </div>
        <div class="main__col">
            <div class="main__right-wrap">
                <h2 class="main__right_title"> Need a<br>custom essay?</h2>
                <h5 class="main__right_subtitle">We will write it for you.</h5><a class="main-btn main__right_btn" href="/order">Order now</a>
            </div>
        </div>
        <div class="main__arrow-block"><img class="main__scroll-down" src="/img/icons/down-arrow.svg" alt="Scroll down"></div>
    </section>
    <section class="recent" id="recent">
        <div class="recent__col recent__col_one">
            <div class="recent__accent-block wow clipInDown"></div>
            <div class="recent__accent-block_sm wow clipInDown"></div>
            <h3 class="recent__title">Most<br>recent essays</h3>
            <?php 
            $i=0;
            foreach ($articles as $item)
            {
                //print_r($item);
                if ($i>=3)
                    break;
                $i++;
            ?>
            <div class="essay"><a href="<?=$item->url?>" class="essay__title"><?=$item->name?></a>
                <p class="essay__text"><?=trim(strip_tags(substr($item->article, 0, 350)))?>...</p>
                <div class="essay__details">
                    <div class="essay__detail-block essay__words-block">
                        <p class="essay__detail-text"><?=count(explode(" ",$item->article))?> Words</p>
                    </div>
                    <div class="essay__detail-block essay__date-block">
                        <p class="essay__detail-text essay__detail-slash">/</p>
                        <p class="essay__detail-text"><?=date("M",strtotime($item->atime))?> <?=date("d",strtotime($item->atime))?>, <?=date("Y",strtotime($item->atime))?></p>
                    </div>
                    <div class="essay__detail-block essay__pages-block">
                        <p class="essay__detail-text essay__detail-slash">/</p>
                        <p class="essay__detail-text"><?=ceil(count(explode(" ",$item->article))/500)?> Pages</p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="need wow clipInLeft2">
            <h2 class="need__title"> Need a custom<br>essay?</h2>
            <h5 class="need__subtitle">We will write it for you.</h5><a class="main-btn need__btn" href="/order">Order now</a>
        </div>
        <div class="recent__col recent__col_two">
            <div class="recent__accent-block wow clipInDown"></div>
            <div class="recent__accent-block_sm wow clipInDown"></div>
            <h3 class="recent__title recent__title_two">Most recent<br>shared essays</h3>
            <?php 
            $i=0;
            ashuffle($arr_articles);
            foreach ($arr_articles as $item)
            {
                if ($i>=3)
                    break;
                $i++;
            ?>
            <div class="essay"><a href="<?=$item->url?>" class="essay__title"><?=$item->name?></a>
                <p class="essay__text"><?=trim(strip_tags(substr($item->article, 0, 350)))?>...</p>
                <div class="essay__details">
                    <div class="essay__detail-block essay__words-block">
                        <p class="essay__detail-text"><?=count(explode(" ",$item->article))?> Words</p>
                    </div>
                    <div class="essay__detail-block essay__date-block">
                        <p class="essay__detail-text essay__detail-slash">/</p>
                        <p class="essay__detail-text"><?=date("M",strtotime($item->atime))?> <?=date("d",strtotime($item->atime))?>, <?=date("Y",strtotime($item->atime))?></p>
                    </div>
                    <div class="essay__detail-block essay__pages-block">
                        <p class="essay__detail-text essay__detail-slash">/</p>
                        <p class="essay__detail-text"><?=ceil(count(explode(" ",$item->article))/500)?> Pages</p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="need wow clipInLeft2">
            <h2 class="need__title"> Need a custom<br>essay?</h2>
            <h5 class="need__subtitle">We will write it for you.</h5><a class="main-btn need__btn" href="/order">Order now</a>
        </div>
        <div class="recent__col recent__col_three">
            <div class="recent__accent-block recent__accent-block_last wow clipInDown"></div>
            <div class="recent__accent-block_sm recent__accent-block_sm_last wow clipInDown"></div>
            <h3 class="recent__title recent__title_three">Most<br>discussing essays</h3>
            <?php 
            $i=0;
            ashuffle($arr_articles);
            foreach ($arr_articles as $item)
            {
                if ($i>=3)
                    break;
                $i++;
            ?>
            <div class="essay"><a href="<?=$item->url?>" class="essay__title"><?=$item->name?></a>
                <p class="essay__text"><?=trim(strip_tags(substr($item->article, 0, 350)))?>...</p>
                <div class="essay__details">
                    <div class="essay__detail-block essay__words-block">
                        <p class="essay__detail-text"><?=count(explode(" ",$item->article))?> Words</p>
                    </div>
                    <div class="essay__detail-block essay__date-block">
                        <p class="essay__detail-text essay__detail-slash">/</p>
                        <p class="essay__detail-text"><?=date("M",strtotime($item->atime))?> <?=date("d",strtotime($item->atime))?>, <?=date("Y",strtotime($item->atime))?></p>
                    </div>
                    <div class="essay__detail-block essay__pages-block">
                        <p class="essay__detail-text essay__detail-slash">/</p>
                        <p class="essay__detail-text"><?=ceil(count(explode(" ",$item->article))/500)?> Pages</p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <div class="need wow clipInLeft2">
        <h2 class="need__title"> Need a custom<br>essay?</h2>
        <h5 class="need__subtitle">We will write it for you.</h5><a class="main-btn need__btn" href="/order">Order now</a>
    </div>

    <iframe title="Comments" src="/fcomments.php" width=100% height=680 frameBorder="0" scrolling="no"></iframe>

    <section class="block-essay" id="essay">
        <div class="block-essay__col block-essay__col_middle">
            <h1 class="block-essay__title">Essay</h1>
            <div class="tab__wrap">
                <ul class="tab">
                    <li class="tab__links">#</li>
                    <li class="tab__links">a</li>
                    <li class="tab__links">b</li>
                    <li class="tab__links">c</li>
                    <li class="tab__links">d</li>
                    <li class="tab__links">e</li>
                    <li class="tab__links">f</li>
                    <li class="tab__links">g</li>
                    <li class="tab__links">h</li>
                    <li class="tab__links">i</li>
                    <li class="tab__links">j</li>
                    <li class="tab__links">k</li>
                    <li class="tab__links">l</li>
                    <li class="tab__links">m</li>
                    <li class="tab__links">n</li>
                    <li class="tab__links">o</li>
                    <li class="tab__links">p</li>
                    <li class="tab__links">q</li>
                    <li class="tab__links">r</li>
                    <li class="tab__links">s</li>
                    <li class="tab__links">t</li>
                    <li class="tab__links">u</li>
                    <li class="tab__links">v</li>
                    <li class="tab__links">w</li>
                    <li class="tab__links">x</li>
                    <li class="tab__links">y</li>
                    <li class="tab__links">z</li>
                </ul>
            </div>
        </div>
        <div class="block-essay__col block-essay__col_bottom">
            <div class="block-essay__subject">
                <div class="block-essay__subject-block wow clipInLeft"></div>
                <h3 class="block-essay__subtitle">Free essays<br>by subject:</h3>
                <div class="tab__content">
                <?php
                foreach ($tags as $item)
                {
                ?>
                    <a class="tab__topics-links" href="/subjects/<?=sluggify($item->name)?>/<?=$item->id?>">
                        <div class="hot__topics-item tab__content-item">
                            <div class="hot__topics-text"><?=$item->name?></div>
                        </div>
                    </a>
                <?php } ?>
                </div>
                       <?php
                        foreach($chars as $k=>$v)
                        {
                        print '<div class="tab__content">';
                        foreach ($v as $item)
                        {
                        ?>

                            <a class="tab__topics-links" href="/subjects/<?=sluggify($item->name)?>/<?=$item->id?>">
                                <div class="hot__topics-item tab__content-item">
                                    <div class="hot__topics-text"><?=$item->name?></div>
                            </div>
                            </a>
        
                        <?php } print '</div>'; } ?>
            </div>
            <div class="block-essay__topic">

                <div class="block-essay__topic-block wow clipInLeft"></div>
                <h3 class="block-essay__subtitle">Free essays<br>by topic:</h3>
                <div>
                    <div class="tab__content_free">
                    <?php
                    $i=0;
                    foreach ($articles as $item)
                    {
                        $i++;
                        if ($i==10)
                            break;
                    ?>
                    <a class="tab__topics-links" href="<?=$item->url?>">
                        <div class="hot__topics-item tab__content-item">
                            <div class="hot__topics-text"><?=$item->name?></div>
                        </div>
                    </a>
                    <?php } ?>                        
                    </div>
                       <?php
                        foreach($chars2 as $k=>$v)
                        {
                        print '<div class="tab__content_free">';
                        foreach ($v as $item)
                        {
                        ?>

                            <a class="tab__topics-links" href="<?=$item->url?>">
                                <div class="hot__topics-item tab__content-item">
                                    <div class="hot__topics-text"><?=$item->name?></div>
                            </div>
                            </a>
        
                        <?php } print '</div>'; } ?>

                </div>
            </div>
            
        </div>
    </section>
    <section>
        <div class="block-essay__col block-essay__col_head">
            <div class="block-essay__need wow clipInLeft2">
                <h2 class="need__title"> Need a custom<br>essay?</h2>
                <h5 class="need__subtitle">We will write it for you.</h5><a class="main-btn need__btn" href="/order">Order now</a>
            </div>
        </div>
        
    </section>
 
    <section class="tips" id="tips">

        <div class="tips__col">
            <h1 class="tips__title">Helpful tips <span class="tips__accent">& </span><br>tricks for writing<br>essay</h1>
            <h1 class="tips__title_mobile">Helpful tips <span class="tips__accent">& </span>tricks for<br>writing essay</h1>
            <p class="tips__subtitle">Here are some topics to help you to write essay quickly</p>
            <div class="tips__free">
                <div class="tips__accent-block wow clipInLeft"></div>
                <h3 class="block-essay__subtitle tips__popular">Popular Types of Essays:</h3>
                <?php
                foreach ($categories as $item)
                {
                ?>
                <div class="hot__topics-item tab__content-item">
                    <a class="tab__topics-links" href="/types/<?=sluggify($item->name)?>/<?=$item->id?>">
                        <div class="hot__topics-text"><?=$item->name?></div>
                    </a>
                </div>
            <?php } ?>
            </div>
        </div>
        <div class="tips__col">
            <div class="tips__line wow clipInLeft2"></div>
            <?php
            foreach ($articles as $item)
            {
                if ($item->categories_id[0]->id!='17' && $item->tags_id[0]->id!='1')
                    continue;
            ?>

            <div class="tips__card">
                <h4 class="tips__card-title"><?=$item->name?></h4>
                <p class="tips__card-text"><?=trim(strip_tags(substr($item->article, 0, 350)))?>...<a class="tips__card-more" href="<?=$item->url?>">Read more</a></p>
            </div>
            <?php } ?>
        </div>
    </section>
    <div class="need wow clipInLeft2">
        <h2 class="need__title"> Need a custom<br>essay?</h2>
        <h5 class="need__subtitle">We will write it for you.</h5><a class="main-btn need__btn" href="/order">Order now</a>
    </div>
    <div class="block-essay__col block-essay__col_head tips__bg">
        <div class="block-essay__need tips__need-block wow clipInLeft2">
            <h2 class="need__title"> Need a custom<br>essay?</h2>
            <h5 class="need__subtitle">We will write it for you.</h5><a class="main-btn need__btn" href="/order">Order now</a>
        </div>
    </div>
    <section class="share" id="share">
        <div class="share__col">
            <form class="checker__form" action="/feedback" method="post"><input class="checker__form-input" type="text" name="title" placeholder="Place Your Title Here"><textarea class="checker__form-input checker__form-input_textarea" type="text" name="text" placeholder="Paste Your Text Here"></textarea>
                <div class="upload checker__form-input checker__form-input_upload"></div>
                <div class="checker__form-wrap"><button class="main-btn" type="submit">Share Now</button></div>
            </form>
        </div>
        <div class="share__col">
            <h1 class="share__title">Share<br>Your Essay</h1>
            <p class="share__text share__text_one">By submitting your essay, you are warranting that the essay was written by you and that it is OK for us to use this paper for educational purposes. Essay.biz will not sell or disclose your contact information to third parties.</p>
            <p class="share__text share__text_terms">By clicking Share Essay you agree to our<a class="share__text_terms-link" href="/terms">Terms</a></p>
        </div>
    </section>
<?php
include ('footer.php');
?>
    <footer class="footer">
        <div class="main__col footer__col" id="contact">
            <div>
                <h2 class="footer__title white">OUR SERVICE WILL BE<br>HELPFUL FOR:</h2>
                <p class="footer__text white">EssayBiz aims at enlightening thousands of students out there about the in-depth process of writing academic essays like a pro. Through our essay writing services, the students are able to hone their individual academic writing skills at the same time. Get access to our high-quality sample papers written by students –just like you. You can also contribute by sharing your sample essay on our portal. EssayBiz welcomes all kinds of academic submissions. While we cannot guarantee that all submissions will be published on our portal, we still respect the efforts put in and value your time!</p>
            </div>
            <div class="footer-contact__wrap">
                <div class="footer-contact__col">
                    <h3 class="footer-contact__title">essay.biz</h3>
                    <ul class="footer-list">
                        <li class="footer-list__item"><a class="footer-list__link" aria-label="About" href="/about">About</a></li>
                        <li class="footer-list__item"><a class="footer-list__link" aria-label="Subjects" href="/subjects">Subjects</a></li>
                        <li class="footer-list__item"><a class="footer-list__link" aria-label="Types" href="/types">Types</a></li>
                        <li class="footer-list__item"><a class="footer-list__link" aria-label="Authors" href="/authors">Authors</a></li>
                        
                        <?php
                          $pages = json_decode(file_get_contents('cache/pages.json'));                
                          foreach($pages as $el)
                            print "<li class=\"footer-list__item\"><a class=\"footer-list__link\" href=\"".$el->url."\">".$el->lname."</a></li>";
                        ?>

                    </ul>
                </div>
                <div class="footer-contact__col">
                    <h3 class="footer-contact__title">Contact us</h3>
                    <ul class="footer-list">
                        <li class="footer-list__item footer-list__item_right"><a class="footer-list__link white" aria-label="#" href="#"><img class="footer-list__img" src="/img/icons/phone.svg" alt="">+19732733377</a></li>
		        <li class="footer-list__item footer-list__item_right"><a class="footer-list__link white" aria-label="#" href="#">180 Talmadge Road<br>IGO Bldg<br>Edison, NJ 08817<Br>United States</br></a></li>
                        <li class="footer-list__item footer-list__item_right"><a class="footer-list__link white" aria-label="Email" href="mailto:info@essay.biz"><img class="footer-list__img" src="/img/icons/mail.svg" alt="">info@essay.biz</a></li>
                        <li class="footer-list__item footer-list__item_right"><a class="footer-list__link white" aria-label="Facebook" href="https://www.facebook.com/EssaysForHelp"><img class="footer-list__img" src="/img/icons/fb.svg" alt="">FaceBook</a></li>
                        <li class="footer-list__item footer-list__item_right"><a class="footer-list__link white" aria-label="Instagram" href="https://www.instagram.com/essaystudentshelp/"><img class="footer-list__img" src="/img/icons/instagram-logo.png" alt="">Instagram</a></li>
                        <li class="footer-list__item footer-list__item_right"><a class="footer-list__link white" aria-label="Pinterest" href="https://www.pinterest.com/rhubko0766/"><img class="footer-list__img" src="/img/icons/pinterest-logo.png" alt="">Pinterest</a></li>
                        <li class="footer-list__item footer-list__item_right"><a class="footer-list__link white" aria-label="Google play" href="https://play.google.com/store/apps/details?id=com.biz.easybiz"><img class="footer-list__img" src="/img/icons/google_play_store_icon.png" alt="">Android App</a></li>
                        <!--<li class="footer-list__item footer-list__item_right"><a class="footer-list__link white" aria-label="#" href="#"><img class="footer-list__img" src="/img/icons/twitter.svg" alt="">@essay.biz</a></li> -->
                    </ul>
                </div>

            </div>
            <div class="footer__small_wrap"><small><a class="footer__small white" href="/terms">Terms & Conditions</a></small><small><a class="footer__small white" href="/privacy">Privacy Policy</a></small></div>
        </div>

        <div class="main__col footer__col" id="questions">
            <h2 class="main__right_title footer-right__title">Have any<br>questions?</h2>
            <form class="footer-form" action="/feedback" method="post" id="feedback"><input class="footer-form__input" name="E-Mail" type="text" placeholder="E-mail"><input class="footer-form__input" type="text" name="Name" placeholder="Name"><textarea class="footer-form__textarea" name="Text" type="text" placeholder="Enter your message"></textarea></form><a class="main-btn main__right_btn" href="#" onclick="$('#feedback').submit()">Send message</a>
            <iframe title="Map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1516.1179254840176!2d-74.39705710916435!3d40.536378197633184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b7fd70650eb1%3A0x8bb8b8dc85e4748f!2zMTgwIFRhbG1hZGdlIFJkLCBFZGlzb24sIE5KIDA4ODE3LCDQodCo0JA!5e0!3m2!1sru!2sua!4v1600087272841!5m2!1sru!2sua" width="100%" height="240" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

        </div>

    </footer>
</body>
<script type="module" src="/js/login-mobile.js"></script>
<script type="module" src="/js/menu-mobile.js"></script>
<script type="module" src="/js/topics-tab.js"></script>
<script type="module" src="/js/nav-show.js"></script>
<script type="module" src="/js/main.js"></script><!-- jquery-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script><!-- animation-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script><!-- upload form-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/formstone/1.4.16/js/core.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/formstone/1.4.16/js/upload.js"></script>

</html>
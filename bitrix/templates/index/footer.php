
    </div>
</div>
<footer>
    <div class="content">
        <div class="footer__tbl">
            <div>
                <a href="<?=$mainLink?>" class="<?=$mainLinkScrollTo?> logo"></a>
                <div class="partners">
                    <span class="partners__title">Партнеры</span>
                    <a href="http://golin.com/" class="partners__item partners__item-1" target="_blank"></a>
                    <a href="http://www.advglobal.com/" target="_blank" class="partners__item partners__item-2"></a>
                </div>
            </div>
            <div class="address">
                <?=COption::GetOptionString( "askaron.settings", "UF_ADDRESS" )?><br>
                <?=COption::GetOptionString( "askaron.settings", "UF_PHONE" )?><br>
                <a href="mailto:<?=COption::GetOptionString( "askaron.settings", "UF_EMAIL" )?>" style="color: #fff"><?=COption::GetOptionString( "askaron.settings", "UF_EMAIL" )?></a>
            </div>
            <div>
                <div class="social">
                    <a target="_blank" href="<?=COption::GetOptionString( "askaron.settings", "UF_FB" )?>" class="social__fb"></a>
                    <a target="_blank" href="<?=COption::GetOptionString( "askaron.settings", "UF_TEL" )?>" class="social__tel"></a>
                    <a target="_blank" href="<?=COption::GetOptionString( "askaron.settings", "UF_MESSENGER" )?>" class="social__m"></a>
                </div>
                <div class="copyright">
                    &copy; 2012 - <?=date('Y')?> comunica
                </div>
            </div>
        </div>
    </div>
</footer>
<div style="display: none">
    <div id="feedback" class="feedback">
        <h1>Оперативная связь</h1>
        <div class="feedback__text">
            Оставьте свои контактные данные и мы свяжемся с вами в рабочее время в течение часа.
        </div>
        <div class="feedback__form">
            <input type="text" name="name" placeholder="Имя">
            <input type="text" name="company" placeholder="Компания"><br class="hideMobile">
            <input type="text" name="phone" placeholder="Телефон" class="phone_mask">
            <input type="text" name="email" placeholder="Почта">
        </div>
        <div class="feedback__small">
            Все данные останутся у нас, и мы обещаем не использовать их в рекламных целях.
        </div>
        <div class="feedback__btn">
            <span class="btn"><span>Отправить</span><span class="btn__icon btn__icon-arrow"></span></span>
        </div>
    </div>
</div>
<!--[if (lt IE 9)]>
<div class="bad_browser">
    <h1>Ваш браузер устарел</h1>
    Установите современный браузер <a href="http://www.google.com/chrome/">Chrome</a>, <a href="http://www.opera.com">Opera</a>, <a href="http://www.firefox.com">Firefox</a>.
</div>
<![endif]-->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-104993046-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>

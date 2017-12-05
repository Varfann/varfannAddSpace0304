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
                <?=COption::GetOptionString("askaron.settings", "UF_ADDRESS")?><br>
                <?=COption::GetOptionString("askaron.settings", "UF_PHONE")?><br>
                <a href="mailto:<?=COption::GetOptionString("askaron.settings", "UF_EMAIL")?>"
                   style="color: #fff"><?=COption::GetOptionString("askaron.settings", "UF_EMAIL")?></a>
            </div>
            <div>
                <div class="social">
                    <a target="_blank"
                       href="<?=COption::GetOptionString("askaron.settings", "UF_FB")?>"
                       class="social__fb"></a>
                    <a target="_blank"
                       href="<?=COption::GetOptionString("askaron.settings", "UF_TEL")?>"
                       class="social__tel"></a>
                    <a target="_blank"
                       href="<?=COption::GetOptionString("askaron.settings", "UF_MESSENGER")?>"
                       class="social__m"></a>
                </div>
                <div class="copyright">
                    &copy; 2012 - <?=date('Y')?> comunica
                </div>
            </div>
        </div>
    </div>
</footer>
<? $APPLICATION->IncludeComponent("bitrix:form.result.new", "template.pr.form",
                                  ["CACHE_TIME"             => "36000",
                                   "CACHE_TYPE"             => "A",
                                   "CHAIN_ITEM_LINK"        => "",
                                   "CHAIN_ITEM_TEXT"        => "",
                                   "COMPONENT_TEMPLATE"     => "template.pr.form",
                                   "EDIT_URL"               => "result_edit.php",
                                   "IGNORE_CUSTOM_TEMPLATE" => "N",
                                   "SEF_MODE"               => "N",
                                   "LIST_URL"               => "",
                                   "AJAX_MODE"              => "Y",
                                   "AJAX_OPTION_JUMP"       => "N",
                                   "AJAX_OPTION_STYLE"      => "Y",
                                   "AJAX_OPTION_HISTORY"    => "N",
                                   "AJAX_OPTION_ADDITIONAL" => "1",
                                   "SUCCESS_URL"            => "",
                                   "USE_EXTENDED_ERRORS"    => "N",
                                   "WEB_FORM_ID"            => FORM_PR_ID,
                                   "VARIABLE_ALIASES"       => ["WEB_FORM_ID" => "WEB_FORM_ID",
                                                                "RESULT_ID"   => "RESULT_ID",]]
); ?>
<? $APPLICATION->IncludeComponent("bitrix:form.result.new", "template.help.form",
                                  ["CACHE_TIME"             => "36000",
                                   "CACHE_TYPE"             => "A",
                                   "CHAIN_ITEM_LINK"        => "",
                                   "CHAIN_ITEM_TEXT"        => "",
                                   "COMPONENT_TEMPLATE"     => "template.help.form",
                                   "EDIT_URL"               => "result_edit.php",
                                   "IGNORE_CUSTOM_TEMPLATE" => "N",
                                   "SEF_MODE"               => "N",
                                   "LIST_URL"               => "",
                                   "AJAX_MODE"              => "Y",
                                   "AJAX_OPTION_JUMP"       => "N",
                                   "AJAX_OPTION_STYLE"      => "Y",
                                   "AJAX_OPTION_HISTORY"    => "N",
                                   "AJAX_OPTION_ADDITIONAL" => "1",
                                   "SUCCESS_URL"            => "",
                                   "USE_EXTENDED_ERRORS"    => "N",
                                   "WEB_FORM_ID"            => FORM_HELP_ID,
                                   "VARIABLE_ALIASES"       => ["WEB_FORM_ID" => "WEB_FORM_ID",
                                                                "RESULT_ID"   => "RESULT_ID",]]
); ?>
<!--[if (lt IE 9)]>
<div class="bad_browser">
    <h1>Ваш браузер устарел</h1>
    Установите современный браузер <a href="http://www.google.com/chrome/">Chrome</a>, <a href="http://www.opera.com">Opera</a>,
    <a href="http://www.firefox.com">Firefox</a>.
</div>
<![endif]-->
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src   = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    
    ga('create', 'UA-104993046-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>

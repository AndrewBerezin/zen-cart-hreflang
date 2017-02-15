# jscript__hreflang

Author
Andrew Berezin http://eCommerce-Service.com

Генерирует теги link rel="alternate" hreflang="X" в соответсвии с рекомендациями

[Как использовать атрибут hreflang для указания языка или регионального URL](https://support.google.com/webmasters/answer/189077)

[Мультирегиональные и многоязычные сайты](https://support.google.com/webmasters/answer/182192?topic=2370587&ctx=topic)

[Новый способ правильно показывать контент пользователям из разных стран](http://googlerussiablog.blogspot.ru/2013/04/hreflang-update.html)

[Разметка локализованных страниц](http://help.yandex.ru/webmaster/yandex-indexing/locale-pages.xml)

[Яндекс поддерживает стандарт для указания мультиязычности сайта](http://webmaster.ya.ru/replies.xml?item_no=15326)


В версии 1.5.5 hreflang поддерживается по умолчанию. Но сделано это криво :( Поэтому я использую свой скрипт.

Если Вы хотите чтобы теги rel="alternate" hreflang="X" выводились где-нибудь в другом месте, например повыше, после тега canonical, то добавьте в нужное место в html_header.php код
```
<?php include($template->get_template_dir('jscript__hreflang.php', DIR_WS_TEMPLATE, $current_page_base, 'jscript') . '/jscript__hreflang.php'); ?>
```
Например:
```
<?php if (isset($canonicalLink) && $canonicalLink != '') { ?>
<link rel="canonical" href="<?php echo $canonicalLink; ?>">
<?php } ?>
<?php include($template->get_template_dir('jscript__hreflang.php', DIR_WS_TEMPLATE, $current_page_base, 'jscript') . '/jscript__hreflang.php'); ?>
```

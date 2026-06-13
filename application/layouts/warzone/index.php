<?php

/** @var $this \Ilch\Layout\Frontend */

$wzMenuTpl = '<section class="wz-panel">
    <header class="wz-panel-head"><span class="wz-panel-tab"></span><span class="wz-panel-title">%s</span></header>
    <div class="wz-panel-body wz-menu">%c</div>
</section>';

$wzAccent = trim((string) $this->getLayoutSetting('accentcolor'));
$wzHeader = $this->getLayoutSetting('headertext');
$wzTagline = $this->getLayoutSetting('tagline');
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?=$this->getHeader() ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Rajdhani:wght@400;500;600;700&family=Share+Tech+Mono&display=swap" rel="stylesheet">
        <link href="<?=$this->getLayoutUrl('style.css') ?>" rel="stylesheet">
        <?php if ($wzAccent !== '') : ?>
        <style>:root{--wz-accent: <?=htmlspecialchars($wzAccent, ENT_QUOTES) ?>;}</style>
        <?php endif; ?>
        <?=$this->getCustomCSS() ?>
    </head>
    <body class="wz">
        <div class="wz-fx" aria-hidden="true"></div>

        <div class="wz-topbar">
            <div class="wz-container wz-topbar-inner">
                <span class="wz-status"><span class="wz-dot"></span><?=$this->getTrans('systemonline') ?></span>
                <span class="wz-ticker"><span class="wz-live"><?=$this->getTrans('live') ?></span> // <?=htmlspecialchars((string) $wzHeader, ENT_QUOTES) ?> // <?=date('Y.m.d') ?></span>
            </div>
        </div>

        <header class="wz-header">
            <div class="wz-container wz-header-inner">
                <a class="wz-brand" href="<?=$this->getUrl() ?>">
                    <span class="wz-brand-mark">//</span>
                    <span class="wz-brand-name"><?=htmlspecialchars((string) $wzHeader, ENT_QUOTES) ?></span>
                </a>
                <button class="wz-burger" type="button" aria-controls="wzNav" aria-expanded="false" aria-label="<?=$this->getTrans('togglenavigation') ?>">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </header>

        <div class="wz-offcanvas" id="wzNav" aria-hidden="true">
            <div class="wz-offcanvas-head">
                <span><?=$this->getTrans('menu') ?></span>
                <button class="wz-offcanvas-close" type="button" aria-label="<?=$this->getTrans('togglenavigation') ?>">&times;</button>
            </div>
            <div class="wz-offcanvas-body">
                <?=$this->getMenu(1, $wzMenuTpl) ?>
            </div>
        </div>
        <div class="wz-backdrop" hidden></div>

        <section class="wz-hero" id="wzHero">
            <div class="wz-hero-track">
                <div class="wz-slide is-active" style="background-image:url('<?=$this->getBaseUrl($this->getLayoutSetting('slider1')) ?>')" role="img" aria-label="<?=$this->getTrans('slider1') ?>"></div>
                <div class="wz-slide" style="background-image:url('<?=$this->getBaseUrl($this->getLayoutSetting('slider2')) ?>')" role="img" aria-label="<?=$this->getTrans('slider2') ?>"></div>
                <div class="wz-slide" style="background-image:url('<?=$this->getBaseUrl($this->getLayoutSetting('slider3')) ?>')" role="img" aria-label="<?=$this->getTrans('slider3') ?>"></div>
            </div>
            <div class="wz-hero-grid" aria-hidden="true"></div>
            <div class="wz-hero-scan" aria-hidden="true"></div>
            <span class="wz-bracket wz-bracket--tl" aria-hidden="true"></span>
            <span class="wz-bracket wz-bracket--tr" aria-hidden="true"></span>
            <span class="wz-bracket wz-bracket--bl" aria-hidden="true"></span>
            <span class="wz-bracket wz-bracket--br" aria-hidden="true"></span>

            <div class="wz-container wz-hero-content">
                <span class="wz-hero-tag">// <?=htmlspecialchars((string) $wzTagline, ENT_QUOTES) ?></span>
                <h1 class="wz-hero-title" data-text="<?=htmlspecialchars((string) $wzHeader, ENT_QUOTES) ?>"><?=htmlspecialchars((string) $wzHeader, ENT_QUOTES) ?></h1>
                <div class="wz-hero-meta">
                    <span class="wz-chip">[ <?=$this->getTrans('live') ?> ]</span>
                    <span class="wz-hero-line"></span>
                </div>
            </div>

            <button class="wz-hero-ctrl wz-hero-prev" type="button" aria-label="<?=$this->getTrans('previous') ?>">&#9664;</button>
            <button class="wz-hero-ctrl wz-hero-next" type="button" aria-label="<?=$this->getTrans('next') ?>">&#9654;</button>
            <div class="wz-hero-dots">
                <button class="is-active" type="button" data-index="0" aria-label="<?=$this->getTrans('slide1') ?>"></button>
                <button type="button" data-index="1" aria-label="<?=$this->getTrans('slide2') ?>"></button>
                <button type="button" data-index="2" aria-label="<?=$this->getTrans('slide3') ?>"></button>
            </div>
        </section>

        <main class="wz-main">
            <div class="wz-container">
                <div class="wz-grid">
                    <aside class="wz-col wz-col-left">
                        <?=$this->getMenu(1, $wzMenuTpl) ?>
                    </aside>
                    <div class="wz-col wz-col-main">
                        <nav class="wz-breadcrumb">
                            <span class="wz-breadcrumb-label"><?=$this->getTrans('missionpath') ?> //</span>
                            <?=$this->getHmenu() ?>
                        </nav>
                        <section class="wz-panel wz-panel--content">
                            <header class="wz-panel-head">
                                <span class="wz-panel-tab"></span>
                                <span class="wz-panel-title"><?=$this->getTrans('classified') ?></span>
                                <span class="wz-panel-id"><?=date('His') ?></span>
                            </header>
                            <div class="wz-panel-body wz-content">
                                <?=$this->getContent() ?>
                            </div>
                        </section>
                    </div>
                    <aside class="wz-col wz-col-right">
                        <?=$this->getMenu(2, $wzMenuTpl) ?>
                    </aside>
                </div>
            </div>
        </main>

        <footer class="wz-footer">
            <div class="wz-footer-stripe" aria-hidden="true"></div>
            <div class="wz-container wz-footer-inner">
                <div class="wz-footer-brand">
                    <span class="wz-brand-mark">//</span> <?=htmlspecialchars((string) $wzHeader, ENT_QUOTES) ?>
                    <small>&copy; <?=date('Y') ?> &middot; Powered by <a href="https://www.ilch.de/" rel="noopener">Ilch 2</a></small>
                </div>
                <ul class="wz-footer-nav">
                    <li><a href="<?=$this->getUrl() ?>"><?=$this->getTrans('home') ?></a></li>
                    <li><a href="<?=$this->getUrl(['module' => 'contact', 'controller' => 'index', 'action' => 'index']) ?>"><?=$this->getTrans('contact') ?></a></li>
                    <li><a href="<?=$this->getUrl(['module' => 'imprint', 'controller' => 'index', 'action' => 'index']) ?>"><?=$this->getTrans('imprint') ?></a></li>
                    <li><a href="<?=$this->getUrl(['module' => 'privacy', 'controller' => 'index', 'action' => 'index']) ?>"><?=$this->getTrans('privacy') ?></a></li>
                </ul>
            </div>
        </footer>

        <?=$this->getFooter() ?>
        <?php /* Nur das Bootstrap-JS-Bundle (kein Bootstrap-CSS) für interaktive Modul-Elemente wie Modals/Dropdowns. */ ?>
        <script src="<?=$this->getVendorUrl('twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?=$this->getLayoutUrl('js/theme.js') ?>"></script>
    </body>
</html>

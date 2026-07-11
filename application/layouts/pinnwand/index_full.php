<?php

/** @var $this \Ilch\Layout\Frontend */

$noteTpl = '<section class="note">
    <span class="note-pin" aria-hidden="true"></span>
    <h2 class="note-title">%s</h2>
    <div class="note-body">%c</div>
</section>';
$noteOptions = ['menus' => ['li-class-active' => 'ist-aktiv']];
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?=$this->getHeader() ?>
        <link href="<?=$this->getVendorUrl('twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?=$this->getLayoutUrl('style.css') ?>" rel="stylesheet">
        <?=$this->getCustomCSS() ?>
        <script src="<?=$this->getVendorUrl('twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    </head>
    <body class="pinnwand">
        <a class="skip-link" href="#inhalt"><?=$this->getTrans('navigation') ?> &rarr; <?=$this->getTrans('home') ?></a>

        <header class="chalkboard-wrap">
            <div class="container">
                <div class="chalkboard">
                    <p class="site-name"><?=$this->getLayoutSetting('headertext') ?></p>
                    <p class="site-sub"><?=$this->getLayoutSetting('subheadertext') ?></p>
                    <button class="chalk-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#aushangNav" aria-controls="aushangNav" aria-expanded="false" aria-label="<?=$this->getTrans('togglenavigation') ?>">
                        &#9776; <?=$this->getTrans('navigation') ?>
                    </button>
                    <span class="chalk-piece" aria-hidden="true"></span>
                    <span class="chalk-sponge" aria-hidden="true"></span>
                </div>

                <nav class="collapse d-lg-none mobile-board" id="aushangNav" aria-label="<?=$this->getTrans('navigation') ?>">
                    <?=$this->getMenu(1, $noteTpl, $noteOptions) ?>
                </nav>
            </div>
        </header>

        <main class="board" id="inhalt">
            <div class="container">
                <div class="row g-4">
                    <aside class="col-lg-3 d-none d-lg-block board-col">
                        <?=$this->getMenu(1, $noteTpl, $noteOptions) ?>
                    </aside>

                    <div class="col-12 col-lg-9">
                        <?=$this->getHmenu() ?>
                        <div class="sheet">
                            <span class="sheet-clip" aria-hidden="true"></span>
                            <div class="sheet-inner">
                                <?=$this->getContent() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="ledge-footer">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6">
                        <span class="ledge-note"><?=$this->getTrans('poweredby') ?></span>
                        <a href="https://www.ilch.de/">Ilch 2</a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <ul class="ledge-links">
                            <li><a href="<?=$this->getUrl() ?>"><?=$this->getTrans('home') ?></a></li>
                            <li><a href="<?=$this->getUrl(['module' => 'contact', 'controller' => 'index', 'action' => 'index']) ?>"><?=$this->getTrans('contact') ?></a></li>
                            <li><a href="<?=$this->getUrl(['module' => 'imprint', 'controller' => 'index', 'action' => 'index']) ?>"><?=$this->getTrans('imprint') ?></a></li>
                            <li><a href="<?=$this->getUrl(['module' => 'privacy', 'controller' => 'index', 'action' => 'index']) ?>"><?=$this->getTrans('privacy') ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <?=$this->getFooter() ?>
    </body>
</html>

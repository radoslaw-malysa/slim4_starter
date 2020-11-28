<section class="header w-100">
    <div id="header1" class="w-100 header-shadow header-wrapper">
        <div class="header-nav flex justify-between items-center">
            <a href="/" class="nav-brand fw7 lh-title">horyzonty<br>przyszłości</a>
            <div class="dn-l tr pr3" style="padding-right: 165px;"><img src="/img/hamb.svg" class="menu-trigger dib"></div>
            <div id="site-menu" class="nav-menu dn flex-ns justify-end items-center fw7" <?php if ($edit_mode): ?>style="margin-right:0;"<?php endif ?>>
                <a href="/tematy" class="nav-link flex items-center">scenariusze</a>
                <a href="#" class="nav-link flex items-center">o projekcie</a>
                <?php if ($edit_mode): ?>
                <div class="drawer-trigger nav-link flex items-center pointer">+ scenariusz</div>
                <?php endif ?>
                <div class="db dn-l menu-x">
                    <svg class="menu-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.268 11.268">
                    <g fill="none" stroke="#fff">
                        <path d="M.354.354l10.56 10.56M10.914.354L.354 10.914"/>
                    </g>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="drawer-menu" class="mm-ocd mm-ocd--right menu-close">
    <div id="mobile-menu-content" class="mm-ocd__content"></div>
</div>
<?php if (!$edit_mode): ?>
<button class="drawer-trigger matter-button-contained big-rnd call-btn">+ scenariusz</button>
<?php endif ?>
<div id="drawer-right" class="mm-ocd mm-ocd--right drawer-close">
    <div class="mm-ocd__content">
    <div class="w-drawer">
        <div class="w-100 flex justify-end mb5">
            <div class="drawer-x"><img src="http://www.solarcloud.pl/img/hex_orange.svg" alt="close icon" title="Zamknij" class="close-bg"> <img src="http://www.solarcloud.pl/img/close.svg" alt="close icon" title="Zamknij" class="drawer-close dib pointer"></div>
        </div>
        <h3 class="ma0 lh-solid">dodaj scenariusz</h3>
        <form method="post" action="" class="pv5">
            <div class="w-100 mv3 mv4-l">
                <label class="matter-textfield-filled w-100 validate-container"><input type="text" placeholder=" " id="new-title" required> <span>Temat, problem</span></label>
                <div class="validate-helper"></div>
            </div>
            <div class="w-100 mv3 mv4-l">
                <label class="matter-textfield-filled w-100 validate-container"><input type="text" placeholder=" " id="new-time-horizon" required> <span>Horyzont czasowy (np. 5 lat)</span></label>
                <div class="validate-helper"></div>
            </div>
            <div class="w-100 mv3 mv4-l">
                <div class="select w-100 validate-container">
                <select class="select-text" required id="new-topic-area">
                    <option value="" selected="selected"></option>
                    <option value="1">Społeczeństwo</option>
                    <option value="2">Technologia</option>
                    <option value="3">Gospodarka</option>
                    <option value="4">Środowisko</option>
                    <option value="5">Polityka</option>
                    <option value="6">Inne</option>
                </select>
                <span class="select-highlight"></span> <span class="select-bar"></span> <label class="select-label">Obszar, dziedzina</label>
                </div>
                <div class="validate-helper"></div>
            </div>
            <div class="w-100 mv4 mt5-l"><button id="new-submit" class="matter-button-contained w-100 big-rnd big-btn">dodaj scenariusz</button></div>
            <input type="hidden" id="new-token" value="">
        </form>
        <div class="w-100 tc"><a href="#">Zaloguj się</a></div>
    </div>
    </div>
</div>
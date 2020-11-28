<section class="section-hero1">
    <header class="flex flex-column flex-row-ns justify-between items-center-l w-100">
    <h1 class="ma0 fw7 lh-solid mb3 mb0-l">jak myśleć<br>o odległej<br><span class="c-red">przyszłości</span></h1>
    <img class="image absolute" src="https://ogloszenia.cozadzien.pl/images/hero2.svg" alt="">
    </header>
    <div class="f5 f3-l lh-copy hero-action mb5 mt4 mt0-l">Przybliżamy technikę <strong>foresight</strong>, pozwalającą kreatywnie i wielowymiarowo podejść do problemu</div>
    <div class="flex flex-column flex-row-ns w-70 w-auto-l"><button class="drawer-trigger matter-button-contained big-rnd big-btn nowrap">dodaj scenariusz</button> <a href="/tematy" class="matter-button-contained big-rnd big-btn red nowrap ml3-ns mt2 mt0-ns">zobacz scenariusze</a></div>
</section>
<section>
    <div class="relative w-100 section-header">
    <h2 class="fw7 lh-solid f2">Scenariusze przyszłości</h2>
    <div class="section-subheader f4 f2-l lh-copy">Wizje przyszłych możliwości oraz dróg rozwoju. Spójrz z szerszej perspektywy na to, co przed nami. Zapraszamy do zapoznania się ze scenariuszami.</div>
    </div>
    <div class="w-100 relative">
    <div class="bg100"></div>
    <div class="w-100 w-80-ns max-w ph2 ph0-ns pv3 pv5-m pv7-l center">
        <div class="flex flex-wrap justify-center">
            <?php foreach ($topics as $item): ?>
            <a href="/tematy/<?php echo $item['id'] ?>" class="flex flex-column justify-between r30 card-shadow ph5 ph6-l pt5 pb6 w-100 w-48-m w-30-l mh-1 mv-1 big-card bg-white">
                <h4 class="mv3 f4 fw7"><?php echo $item['title'] ?></h4>
                <div class="f5 lh-copy">
                <div><?php echo $item['time_horizon'] ?></div>
                <div>Przemysł, technika</div>
                </div>
            </a>
            <?php endforeach ?>
        </div>
    </div>
    </div>
    <div class="section-action pa3 flex flex-column flex-row-l justify-between-l items-center">
    <div class="f4 f3-m f2-l lh-copy mb4 mb0-l">Jak trafne są nasze prognozy?<br>Sprawdź to.</div>
    <div><a href="/tematy" class="matter-button-contained big-rnd big-btn nowrap">zobacz wszystkie</a></div>
    </div>
</section>
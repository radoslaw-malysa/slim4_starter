<section class="section">
    <div class="section-inner max-w pv6 pv7-ns ph3 ph5-m center">
        <header>
            <h2 class="fw4 f3 f2-ns ma0 tc"><?php echo $title ?></h2>
            <p class="f5 f3-ns mt3 mt4-ns mb3 tc">Check some of our projects to know how we help businesses solve their challenges</p>
        </header>
        <div class="nl3 nr3 flex flex-wrap">
            <?php foreach ($gallery as $item): ?>
            <div class="w-100 w-50-m w-third-l ph3 mt4 mt5-ns">
                <div class="flex flex-column">
                    <div class="tc mb3 mb4-ns">
                        <img class="dib w-100" src="/img/add_photo.svg" alt="" />
                    </div>
                    <div class="f7 f6-ns">
                        2020-12-03
                    </div>
                    <div class="f4 f3-ns mb3 mb4-ns">
                        <?php echo $item['title'] ?>
                    </div>
                    <div class="f6 f5-ns">
                        <?php echo $item['subtitle'] ?>
                    </div>
                    <div class="f7 f6-ns mt3">
                        <a href="<?php echo $item['primary_url'] ?>"><?php echo $item['primary_text'] ?></a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <!--<div class="flex flex-wrap justify-center pt3">
            <a href="#" class="matter-button-unelevated matter-primary mh2 mt3 mt5-ns">Request a quote</a>
            <a href="#" class="matter-button-outlined matter-primary mh2 mt3 mt5-ns">Learn more</a>
        </div>-->
    </div>
</section>
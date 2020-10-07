<section class="section">
    <div class="section-inner max-w pv6 pv7-ns ph3 ph5-m center">
        <header>
            <h2 class="fw4 f3 f2-ns ma0 tc"><?php echo $title ?></h2>
            <p class="f5 f3-ns mt3 mt4-ns mb3 tc"><?php echo $subtitle ?></p>
        </header>
        <div class="nl3 nr3 flex flex-wrap justify-center-l">
            
            <?php foreach ($gallery as $item): ?>
            <div class="w-100 w-50-m w-third-l ph3 mt4 mt5-ns">
                <a href="#">
                    <div class="flex flex-column">
                        <div class="tc mb3 mb4-ns">
                            <img class="dib ico-feature" src="/<?php echo $upl.$item['image_url'] ?>" alt="" />
                        </div>
                        <div class="tc f4 f3-ns mb3 mb4-ns">
                            <?php echo $item['title'] ?>
                        </div>
                        <div class="tc f6 f5-ns">
                            <?php echo $item['subtitle'] ?>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach ?>
                
        </div>
        <div class="flex flex-wrap justify-center pt3">
            <a href="#" class="matter-button-unelevated matter-primary mh2 mt3 mt5-ns">Request a quote</a>
            <a href="#" class="matter-button-outlined matter-primary mh2 mt3 mt5-ns">Learn more</a>
        </div>
    </div>
</section>
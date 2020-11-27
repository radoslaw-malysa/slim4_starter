<section class="pt4 pt6-l">
    <div class="relative w-100 section-header">
    <h2 class="fw7 lh-solid f2">Scenariusze przyszłości</h2>
    <div class="section-subheaderr">
        <div class="w-100 w-70-l flex flex-wrap iteml-center justify-center center">
            <div class="mv3 mv4-l mh1-ns w-100 w-30-ns">
                <div class="select w-100">
                <select class="select-text" required id="ord">
                    <option value="created_new" selected="selected">Najnowsze</option>
                    <option value="1">Najstarsze</option>
                    <option value="2">Popularne</option>
                </select>
                <span class="select-highlight"></span> <span class="select-bar"></span> <label class="select-label">Kolejność</label>
                </div>
            </div>
            <div class="mv3 mv4-l mh1-ns w-100 w-30-ns">
                <div class="select w-100">
                <select class="select-text" required id="topic-area">
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
            </div>
            <div class="mv3 mv4-l mh1-ns w-100 w-30-ns">
                <label class="matter-textfield-filled w-100"><input type="text" placeholder=" " id="title" required> <span>Szukaj w temacie</span></label>
            </div>
        </div>
    </div>
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
</section>
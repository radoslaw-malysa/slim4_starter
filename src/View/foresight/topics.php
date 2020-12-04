<section class="pt4 pt6-l">
  <div class="relative w-100 section-header">
  <h2 class="fw7 lh-solid f2">Scenariusze przyszłości</h2>
  <div class="section-subheaderrr">
      <div class="w-100 w-80-l flex flex-wrap iteml-center justify-center center">
          <div class="mv3 mv4-l mh1-ns w-100 w-30-ns">
              <div class="select w-100">
              <select class="select-text" required id="scenarios-order">
                  <option value="created_desc" selected="selected">Najnowsze</option>
                  <option value="created_asc">Najstarsze</option>
              </select>
              <span class="select-highlight"></span> <span class="select-bar"></span> <label class="select-label">Kolejność</label>
              </div>
          </div>
          <div class="mv3 mv4-l mh1-ns w-100 w-30-ns">
              <div class="select w-100">
              <select class="select-text" required id="scenarios-topic">
                    <option value="" selected="selected"></option>
                    <?php foreach ($topics_areas as $item): ?>
                    <option value="<?php echo $item['id'] ?>"><?php echo $item['title'] ?></option>
                    <?php endforeach ?>
              </select>
              <span class="select-highlight"></span> <span class="select-bar"></span> <label class="select-label">Obszar, dziedzina</label>
              </div>
          </div>
          <div class="mv3 mv4-l mh1-ns w-100 w-30-ns">
              <label class="matter-textfield-filled w-100">
                <input type="text" placeholder=" " id="scenarios-title" required> <span>Szukaj w temacie</span>
              </label>
          </div>
      </div>
  </div>
  </div>
  <div class="w-100 relative">
  <div class="bg100 maxbg"></div>
  <div class="w-100 w-80-ns max-w min-h-topics ph2 ph0-ns pv3 pv5-m pv7-l center">
      <div id="scenarios-list" class="flex flex-wrap justify-center">
        <?php require(__DIR__ . '/topics_list.php') ?>
      </div>
  </div>
  </div>
</section>
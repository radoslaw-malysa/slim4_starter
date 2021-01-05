<?php if (count($topics) > 0): ?>
<?php foreach ($topics as $item): ?>
<a href="/tematy/<?php echo $item['id'] ?>" class="flex flex-column justify-between r30 card-shadow ph5 ph6-l pt5 pb6 w-100 w-48-m w-30-l mh-1 mv-1 big-card bg-white">
    <h4 class="mv3 f4 fw7 lh-title"><?php echo $item['title'] ?></h4>
    <div class="f5 lh-copy">
        <div><?php echo $time_horizons[$item['time_horizon']]['title'] ?></div>
        <div><?php echo $topics_areas[$item['topic_area']]['title'] ?></div>
    </div>
</a>
<?php endforeach ?>
<?php else: ?>
<div class="flex flex-column justify-center r30 card-shadow ph5 ph6-l pt5 pb6 w-100 w-50-ns mh-1 mv-1 big-card bg-white">
    <h4 class="mv3 f4 fw7">Nie znaleziono tematów.</h4>
    <div class="f5 lh-copy">Spróbuj zmienić kryteria wyszukiwania.</div>
</div>
<?php endif ?>

<?php if (isset($pagination)): ?>
<div class="mt5 f2 w-100 flex justify-center">
<?php echo $pagination ?>
</div>
<?php endif ?>
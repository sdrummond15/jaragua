<?php
defined('_JEXEC') or die('Restricted access');

$app = JFactory::getApplication();
$menu = $app->getMenu()->getActive();
?>
<div id="clubs">
    <h1><?= $this->get('document')->title; ?></h1>
    <?php if ($menu->query['text_intro']): ?>
        <div id="desc-clubs">
            <?= $menu->query['text_intro'] ?>
        </div>
    <?php endif; ?>
    <?php if ($this->clubs): //print_r($this->clubs);?>
        <div id="club">
            <?php foreach ($this->categories as $categories): ?>
                <h2 class="club-title"><?= $categories->categoria; ?></h2>
                <div class="club-partners">
                    <?php foreach (ClubsModelClubs::getClubs($categories->id) as $club): ?>

                        <div class="club-partner">
                            <?php if ($club->logo): ?>
                                <div class="club-logo">
                                    <img src="<?= $club->logo; ?>" alt="<?= $club->name; ?>">
                                </div>
                            <?php endif; ?>
                            <h3>
                                <?= $club->name; ?>
                            </h3>
                            <small>
                                <?= $club->discount; ?>
                            </small>
                            <div class="club-desc">
                                <?= $club->description; ?>
                            </div>

                            <p class="phone-club">
                                <?= $club->phone; ?>
                                <?php if ($club->whatsapp): ?>
                                    <a href="https://wa.me/55<?= ClubsModelClubs::getNumero($club->whatsapp); ?>"
                                       target="_blank" class="whatsapp-club">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                <?php endif; ?>
                            </p>
                            <?php if ($club->email): ?>
                                <p class="email-club">

                                </p>
                            <?php endif; ?>
                            <?php if ($club->email || $club->site || $club->facebook || $club->instagram): ?>
                                <p class="site-club">
                                    <?php if ($club->email): ?>
                                        <?php $emails = explode(';', $club->email);
                                        $separe = 0;
                                        foreach ($emails as $email):
                                            if ($separe > 0)
                                                echo ' - ';
                                            ?>
                                            <a href="mailto:<?= trim($email); ?>" target="_blank" class="email-club">
                                                <?= trim($email); ?>
                                            </a>
                                            <?php
                                            $separe++;
                                        endforeach;
                                        ?>
                                    <?php endif; ?>
                                    <?php if ($club->email && $club->site): ?>
                                        &nbsp;&nbsp;|&nbsp;&nbsp;
                                    <?php endif; ?>
                                    <?php if ($club->site): ?>
                                        <?php $sites = explode(';', $club->site);
                                        $separe = 0;
                                        foreach ($sites as $site):
                                            if ($separe > 0)
                                                echo ' - ';
                                            ?>
                                            <a href="<?= trim($site); ?>" target="_blank" class="site-club">
                                                <?= trim($site); ?>
                                            </a>
                                            <?php
                                            $separe++;
                                        endforeach;
                                        ?>
                                    <?php endif; ?>
                                    <?php if ($club->facebook): ?>
                                        <a href="<?= $club->facebook; ?>" target="_blank" class="facebook-club">
                                            <i class="fab fa-facebook-square"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($club->instagram): ?>
                                        <a href="<?= $club->instagram; ?>" target="_blank" class="instagram-club">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    <?php endif; ?>
                                </p>
                            <?php endif; ?>

                            <?php if ($club->address): ?>
                                <p class="address-club">
                                    <?= $club->address; ?>
                                </p>
                            <?php endif; ?>
                        </div>

                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

<script>
    jQuery(document).ready(function ($) {

        var icons = {
            header: "plusClub",    // custom icon class
            activeHeader: "minusClub" // custom icon class
        };

        $("#club").accordion({
            collapsible: true,
            active: false,
            heightStyle: "content",
            icons: icons
        });

    });
</script>
  
   

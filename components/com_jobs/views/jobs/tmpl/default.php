<?php
defined('_JEXEC') or die('Restricted access');

$app = JFactory::getApplication();
$menu = $app->getMenu()->getActive();
?>
<div id="jobs">
    <?php if ($menu->query['text_intro']): ?>
        <div id="desc-jobs">
            <?= $menu->query['text_intro'] ?>
        </div>
    <?php endif; ?>
    <?php if ($this->jobs): //print_r($this->clubs);?>
        <div id="job">
            <?php foreach ($this->categories as $categories): ?>
                <h2 class="job-title"><?= $categories->categoria; ?></h2>
                <div class="job-partners">
                    <?php foreach (JobsModelJobs::getJobs($categories->id) as $job): ?>

                        <div class="job-partner">
                            <h3>
                                <?= $job->name; ?>
                            </h3>
                            <div class="club-desc">
                                <?= $job->description; ?>
                            </div>

                            <p class="phone-club">
                                <?= $job->phone; ?>
                                <?php if ($job->whatsapp): ?>
                                    <a href="https://wa.me/55<?= JobsModelJobs::getNumero($job->whatsapp); ?>"
                                       target="_blank" class="whatsapp-job">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                <?php endif; ?>
                            </p>
                            <?php if ($job->email): ?>
                                <p class="email-job">

                                </p>
                            <?php endif; ?>
                            <?php if ($job->email): ?>
                                <p class="site-job">
                                    <?php if ($job->email): ?>
                                        <?php $emails = explode(';', $job->email);
                                        $separe = 0;
                                        foreach ($emails as $email):
                                            if ($separe > 0)
                                                echo ' - ';
                                            ?>
                                            <a href="mailto:<?= trim($email); ?>" target="_blank" class="email-job">
                                                <?= trim($email); ?>
                                            </a>
                                            <?php
                                            $separe++;
                                        endforeach;
                                        ?>
                                    <?php endif; ?>

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
            header: "plusJob",    // custom icon class
            activeHeader: "minusJob" // custom icon class
        };

        $("#job").accordion({
            collapsible: true,
            active: false,
            heightStyle: "content",
            icons: icons
        });

    });
</script>
  
   

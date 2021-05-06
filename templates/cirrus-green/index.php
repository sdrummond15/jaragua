<?php

/**

 * @subpackage    Cirrus Green v1.6 HM02J

 * @copyright    Copyright (C) 2010-2013 Hurricane Media - All rights reserved.

 * @license        GNU General Public License version 2 or later; see LICENSE.txt

 */



defined('_JEXEC') or die('Restricted access');

$LeftMenuOn = ($this->countModules('position-4') or $this->countModules('position-7'));

$RightMenuOn = ($this->countModules('position-6') or $this->countModules('position-3'));

$app = JFactory::getApplication();

$logopath = $this->baseurl . '/templates/' . $this->template . '/images/logo-demo-green.gif';

$logo = $this->params->get('logo', $logopath);

$logoimage = $this->params->get('logoimage');

$sitename = $app->getCfg('sitename');

$sitetitle = $this->params->get('sitetitle');

$sitedescription = $this->params->get('sitedescription');



$w = 3;

if ($LeftMenuOn AND $RightMenuOn):

    $w = 1;

elseif ($LeftMenuOn OR $RightMenuOn):

    $w = 2;

endif;



JHTML::_('behavior.modal');



?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>"

      lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

<head>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-32389197-1', 'auto'); 
	ga('send', 'pageview');

	</script>    
    <jdoc:include type="head"/>

    <meta name="viewport" content="width=device-width, user-scalable=no"/>
    <meta property="og:image" content="https://jaraguaclub.com.br/images/logo_jaragua_old.png" />
    <meta property="og:site_name" content="Jaragu&aacute; Country Club" />
    <meta property="og:url" content="https://www.jaraguaclub.com.br"/>
    <meta property="og:title" content="Jaragu&aacute; Country Club"/>

    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css"/>

    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css"/>

    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css"

          type="text/css"/>

    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/all.min.css"

          type="text/css"/>

    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/lity.min.css"

          type="text/css"/>

    <script type="text/javascript"

            src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/script.js"></script>

    <script type="text/javascript"

            src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/lity.min.js"></script>

<link rel="stylesheet" href="media/system/css/colorbox.css" type="text/css"/>
    
    <script src="<?php echo $this->baseurl ?>/media/system/js/modal.js" type="text/javascript"></script>

</head>

<body>
            
<div id="wrapper">



    <?php if ($this->countModules('position-5')): ?>

    <div class="club-label">

        <jdoc:include type="modules" name="position-5" style="xhtml"/>

    </div>

    <?php endif; ?>



    <div id="header_wrap">

        <div id="palmeiras">

            <img src="<?php echo $this->baseurl ?>/images/palmeiras_l.png"/>

            <img src="<?php echo $this->baseurl ?>/images/palmeiras_r.png"/>

        </div>

        <div id="header">



            <!-- Logo -->

            <div id="logo">



                <?php if ($logo && $logoimage == 1): ?>

                    <a href="<?php echo $this->baseurl ?>"><img src="<?php echo htmlspecialchars($logo); ?>"

                                                                alt="<?php echo $sitename; ?>"/></a>

                <?php endif; ?>

                <?php if (!$logo || $logoimage == 0): ?>



                    <?php if ($sitetitle): ?>

                        <a href="<?php echo $this->baseurl ?>"><?php echo htmlspecialchars($sitetitle); ?></a><br/>

                    <?php endif; ?>



                    <?php if ($sitedescription): ?>

                        <div class="sitedescription"><?php echo htmlspecialchars($sitedescription); ?></div>

                    <?php endif; ?>



                <?php endif; ?>



            </div>



            <!-- Search -->

            <div id="search">

                <jdoc:include type="modules" name="position-0"/>

            </div>

            <div class="gotomenu">

                <div id="gotomenu">

                    <i class="fa fa-bars smallmenu" aria-hidden="true"></i>

                </div>

            </div>

        </div>



        <div id="topmenu_wrap">

            <div id="topmenu">

                <jdoc:include type="modules" name="position-1"/>



                <div class="menuresp">

                    <jdoc:include type="modules" name="position-1"/>

                </div>



            </div>

        </div>

    </div>



    <!-- TopNav -->

    <?php if ($this->countModules('position-13')): ?>

        <div id="topnav_wrap">

            <div id="topnav">

                <jdoc:include type="modules" name="position-13" style="xhtml"/>

            </div>

        </div>

    <?php endif; ?>



    <!-- Breadcrumbs -->

    <?php if ($this->countModules('position-2')): ?>

        <div id="breadcrumbs">

            <jdoc:include type="modules" name="position-2"/>

        </div>

    <?php endif; ?>



    <!-- Content/Menu Wrap -->

    <div id="content-menu_wrap_bg">

        <div id="content-menu_wrap">



            <!-- Left Menu -->

            <?php if ($LeftMenuOn): ?>

                <div id="leftmenu">

                    <jdoc:include type="modules" name="position-7" style="xhtml"/>

                    <jdoc:include type="modules" name="position-4" style="xhtml"/>

                </div>

            <?php endif; ?>



            <!-- COMPONENT-->

            <div id="content-w<?= $w ?>">

                <jdoc:include type="message"/>

                <jdoc:include type="component"/>

            </div>



            <!-- Right Menu -->

            <?php if ($RightMenuOn): ?>

                <div id="rightmenu">

                    <jdoc:include type="modules" name="position-6" style="xhtml"/>

                    <jdoc:include type="modules" name="position-3" style="xhtml"/>

                </div>

            <?php endif; ?>



        </div>

    </div>



    <?php if ($this->countModules('position-4')): ?>

        <div id="leftmenumobile">

            <jdoc:include type="modules" name="position-4" style="xhtml"/>

        </div>

    <?php endif; ?>



    <!-- Content Bottom ONE -->

    <?php if ($this->countModules('position-8')): ?>

        <div id="content-bottom-one-wrap">

            <div id="content-bottom-one">

                <jdoc:include type="modules" name="position-8" style="xhtml"/>

            </div>

        </div>

    <?php endif; ?>



    <!-- Content Bottom TWO -->

    <?php if ($this->countModules('position-9')): ?>

        <div id="content-bottom-two-wrap" class="home">

            <div id="content-bottom-two">

                <jdoc:include type="modules" name="position-9" style="xhtml"/>

            </div>

        </div>

    <?php endif; ?>



    <?php if ($this->countModules('position-12')): ?>

        <div id="content-top">

            <jdoc:include type="modules" name="position-12" style="xhtml"/>

        </div>

    <?php endif; ?>



    <!-- Banner/Links -->

    <div id="box_wrap">



        <div id="box_placeholder">

            <div id="box1">

                <jdoc:include type="modules" name="position-10" style="xhtml"/>

            </div>

            <div id="box2">

                <jdoc:include type="modules" name="position-11" style="xhtml"/>

            </div>

            <div id="box3">

                <jdoc:include type="modules" name="position-14" style="xhtml"/>

            </div>

            <div id="box4">

                <jdoc:include type="modules" name="position-15" style="xhtml"/>

            </div>

        </div>



        <!-- Page End -->

        <div id="copyright">

            <div class="copyrightint">

                <p>Copyright &copy; <?= $sitetitle . ' ' . $sitedescription . ' - ' . date('Y')?> | Todos os direitos reservados</p>

                <a class="sd" href="http://www.sdrummond.com.br" title="Sdrummond Tecnologia" target="_blank">

                    <img src="<?= $this->baseurl ?>/images/sd.png" alt="Sdrummond Tecnologia" title="Sdrummond Tecnologia">

                </a>

            </div>

        </div>



    </div>



</div>
<?php
$url = $_SERVER['REQUEST_URI'];

if (isset($_SESSION["count"])) {
    $accesses = $_SESSION["count"] + 1;
} else {
    $accesses = 1;
}

$_SESSION["count"] = $accesses;

$secao = $_SESSION["count"];
if (($secao == 1)):

?>

<script src="<?php echo $this->baseurl ?>/media/system/js/jquery.colorbox-min.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        setTimeout(function () {
            jQuery.fn.colorbox({
                href: "<?php echo $this->baseurl ?>/images/novaareadosocio.jpg",
                onComplete: function() {
                    $('.cboxPhoto').click(function() {
                        window.location.replace('https://secretariaweb.realclub.net.br/jaragua/login');
                    })
                },
		open: true,
	        maxWidth:'95%', 
	        maxHeight:'95%'
            });
        }, 1500);
    }); 
</script>
<?php endif; ?>
</body>

</html>
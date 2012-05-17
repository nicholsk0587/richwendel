<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>The Law Offices of Richard G. Wendel, II</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="www.signalus.com">
        <link rel="SHORTCUT ICON" href="/resources/images/favicon.ico" />

        
       <!-- CSS : implied media="all" -->
        <link rel="stylesheet" href="/resources/styles/html5.css">
        <link rel="stylesheet" href="/resources/styles/main.css">
        <link rel="stylesheet" href="/resources/styles/jq-ui/jquery-ui-1.8.20.custom.css">

        <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400italic,400' rel='stylesheet' type='text/css'>

        <script src="/resources/scripts/jquery-1.6.2.min.js" type="text/javascript"></script>
        <script src="/resources/scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
        <script src="/resources/scripts/jquery.robwalsh.randomImageOnload.js" type="text/javascript"></script>
        <script src="/resources/scripts/global.js" type="text/javascript"></script>
        <script src="/resources/scripts/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/resources/scripts/additional-methods.js" type="text/javascript"></script>
        <script src="/resources/scripts/form-validation.js" type="text/javascript"></script>
        
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <?php if (!empty($body_class)):?>
    <body class="<?=$body_class?>">
    <?php else:?>
    <body>
    <?php endif?>
        <header class="clearfix container">
        <a href="/"><h1 id="logo" class="ir">Law Offices of Richard G. Wendel, II</h1></a>
        <div id="call-info">
            <p>Licensed in Ohio & Kentucky</p>
            <p>Need help now? Call<br><span>513-632-5317</span></p>
            <p style="color: #a2a5a7;">THIS IS AN ADVERTISEMENT</p>
        </div>
        </header>
        <div class="container clearfix">
            <nav id="main">
                <ul>
                    <li class="nav-home"><a href="/">HOME</a></li>
                    <li class="nav-about"><a href="/about">ABOUT US</a></li>
                    <li class="nav-practice">PRACTICE AREAS
                        <ul>
                            <li><a href="/practice_areas/ohio">OHIO DUI/OVI</a></li>
                            <li><a href="/practice_areas/kentucky">KENTUCKY DUI/OVI</a></li>
                            <li><a href="/practice_areas/personal_injury">PERSONAL INJURY</a></li>
                            <li><a href="/practice_areas/criminal_law">CRIMINAL LAW</a></li>
                            <li><a href="/practice_areas/civil_litigation">CIVIL LITIGATION</a></li>
                        </ul>
                    </li>
                    <li class="nav-resources">RESOURCES
                        <ul>
                            <li><a href="/resource/news_and_blog">NEWS &amp; BLOG</a></li>
                            <li><a href="/resource/helpful_links">HELPFUL LINKS</a></li>
                            <li><a href="/resource/documents">DOCUMENTS</a></li>
                            <li><a href="/resource/videos_and_media">VIDEOS &amp; MEDIA</a></li>
                        </ul>
                    </li>
                    <li class="nav-contact"><a href="/contact_us">CONTACT US</a></li>
                </ul>
            </nav>
            
            <div class="main-col left">
            <?php echo $content?>
            </div><!-- /main-col -->
            
            <div class="side-col right">
            <?php if(!empty($sidebar)):?>
            <?php echo $sidebar?>
            <?php endif;?>
            </div><!-- /side-col -->
            
            <!-- If this is home page only, add in this lower content -->
            <?php if(!empty($lower)):?>
            <?php echo $lower?>
            <?php endif;?>
            
        </div><!-- /container -->
        <footer>
            <div class="container clearfix">
                <div id="disclaimer">
                    <p>THIS IS AN ADVERTISEMENT</p><br>
                    <p>Information presented on this website is a service for our clients and other visitors.  We welcome your inquiries, but please understand that the use of this site or form for any communication does not establish an attorney-client relationship.  Time-sensitive information should not be sent through this form, and confidential information should not be provided until a formal relationship is established.</p>
                    <ul>
                        <li><a href="/">HOME</a> </li>
                        <li><a href="/about">ABOUT US</a></li>
                        <li><a href="/practice_areas">PRACTICE AREAS</a></li>
                        <li><a href="/education">EDUCATION</a></li>
                        <li><a href="/resource">RESOURCES</a></li>
                        <li><a href="/contact_us">CONTACT US</a></li>
                    </ul>
                </div>
                <div id="address">
                    <p><span>Our Office is Located At:</span><br>
                        3573 Columbia Parkway<br>
                        Cincinnati, OH 45226<br>
                        <span>Phone:</span> 513-632-5317<br>
                        	<span>Fax:</span> 513-241-3332</p>
                
                </div>
            </div>
        </footer>
    </body>
</html>
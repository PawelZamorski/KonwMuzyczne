<?php
    session_start();
    $lang = $_SESSION['lang']; // Get language
?>

<!DOCTYPE html>
<html>
<head lang="<?php echo $lang ?>">
    <?php 
        $title = 'Nauczyciele edycja | Panel administracyjny';
        require(__DIR__ . '/../../templates/head-admin.php');
    ?>
</head>
<body>
    <?php require(__DIR__ . '/../../templates/menu-admin.php'); ?>

    <section id="o-szkole" class="introduction scrollto">
        <!-- Info -->
        <?php include(__DIR__ . '/info.php'); ?>
        <!-- End of Info -->
        <hr><hr>

        <!-- Counter stats -->
        <?php include(__DIR__ . '/counter.php'); ?>
        <!-- End of Counter stats -->
        <hr><hr>

        <!-- Progress stats -->
        <?php include(__DIR__ . '/progress.php'); ?>
        <!-- End of Progress stats -->
        <hr><hr>

        <!--Main Youtube Movie-->
        <div class="secondary-color text-center clearfix" style="margin-bottom: 20px;">
            <div class="row clearfix">
                <div class="col-1">
                    <div class="padding-150 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="iframe-container">
                            <iframe src="https://www.youtube.com/embed/r6ThuFthhsE?&rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Main Youtube Movie-->
        <hr><hr>

        <!-- Facts -->
            <?php include(__DIR__ . '/facts.php'); ?>
        <!-- End of Facts -->
    </section>



<!-- textarea function -->
<script>
    const tx = document.getElementsByTagName('textarea');
    for (let i = 0; i < tx.length; i++) {
        tx[i].setAttribute('style', 'height:' + (tx[i].scrollHeight) + 'px;overflow-y:hidden;');        
        tx[i].addEventListener("input", OnInput, false);
    }

    function OnInput() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    }

</script>

<!-- Include JavaScript resources -->
<script src="/js/jquery.1.8.3.min.js"></script>
<script src="/js/wow.min.js"></script>
<script src="/js/featherlight.min.js"></script>
<script src="/js/featherlight.gallery.min.js"></script>
<script src="/js/jquery.enllax.min.js"></script>
<script src="/js/jquery.scrollUp.min.js"></script>
<script src="/js/jquery.easing.min.js"></script>
<script src="/js/jquery.stickyNavbar.min.js"></script>
<script src="/js/jquery.waypoints.min.js"></script>
<script src="/js/images-loaded.min.js"></script>
<script src="/js/lightbox.min.js"></script>
<script src="/js/site.js"></script>
<script src="/js/contact.js"></script>
<script src="/js/stats.js"></script>
<script src="/js/youtube-modal.js"></script>
<script src="/js/newsletter-modal.js"></script>

</body>
</html>

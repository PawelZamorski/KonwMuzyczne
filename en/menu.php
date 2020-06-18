<div id="header" class="nav-collapse">
    <div class="row clearfix">
        <div class="col-1">
            <div id="logo">
                <a href="index.html"><img src="/images/logo.jpg" id="banner-logo" alt="Landing Page" /></a>
                <a href="index.html"><img src="/images/logo.jpg" id="navigation-logo" alt="Landing Page" /></a>
            </div>
            <aside>
                <!--Social Icons in Header-->
                <ul class="social-icons">
                    <li>
                        <a title="For Vietnamese Students" href="/vi/">
                            <img src="/images/flags/vietnam.png" />
                        </a>
                    </li>
                    <li>
                        <a title="For Chinese Students" href="/ch/">
                            <img src="/images/flags/china.png" />
                        </a>
                    </li>
                    <li>
                        <a title="Dla Polskich Studentów" href="/index.html">
                            <img src="/images/flags/poland.png" />
                        </a>
                    </li>
                    <li>
                        <a id="fb-icon" target="_blank" title="facebook" href="https://www.facebook.com/konwersatoriummuzyczne/">
                            <img src="/images/flags/fb-art.png" />
                        </a>
                    </li>
                    <li>
                        <a target="_blank" title="youtube" href="https://www.youtube.com/channel/UCpISipwaVRA4S16_j3ntGWA">
                            <img src="/images/flags/yt-art.png" />
                        </a>
                    </li>
                </ul>
                <!--End of Social Icons in Header-->
            </aside>
            <!--Main Navigation-->

            <?php

                // for the JavaScript menu scroll to work
                $a = '';

                if ($_SERVER['PHP_SELF'] != '/en/index.php') {
                    $a = '/en/index.html';
                }

            ?>

            <nav id="nav-main">
                <ul>
                    <li>
                        <a href="<?= $a ?>#banner">Home</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#o-szkole">School</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#oferta">Programmes</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#galeria">Gallery</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#nauczyciele">Teachers</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#referencje">References</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#kontakt">Contact us</a>
                    </li>
                    <li class="mobile-links">
                        <a href="/vi/"><img src="/images/flags/vietnam.png">For Vietnamese Students</a>
                    </li>
                    <li class="mobile-links">
                        <a href="/chinese.html"><img src="/images/flags/china.png">For Chinese Students</a>
                    </li>
                    <li class="mobile-links">
                        <a href="/index.html"><img src="/images/flags/poland.png">Dla Polskich Studentów</a>
                    </li>
                    <li class="mobile-links">
                        <a href="https://www.facebook.com/konwersatoriummuzyczne/"><img src="/images/flags/fb-art.png" />Visit us on Facebook</a>
                    </li>
                    <li class="mobile-links">
                        <a href="https://www.youtube.com/channel/UCpISipwaVRA4S16_j3ntGWA" target="_blank"><img src="/images/flags/yt-art.png" />Subscribe to our YouTube channel</a>
                    </li>
                </ul>
            </nav>
            <!--End of Main Navigation-->
            <div id="nav-trigger">
                <span></span>
            </div>
            <nav id="nav-mobile">
            </nav>
        </div>
    </div>
</div>
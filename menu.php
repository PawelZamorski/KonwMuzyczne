<div id="header" class="nav-collapse">
    <div class="row clearfix">
        <div class="col-1">
            <div id="logo">
                <a href="index.html"><img src="/images/logo-mini.png" id="banner-logo" alt="Landing Page" /></a>
                <a href="index.html"><img src="/images/logo-mini.png" id="navigation-logo" alt="Landing Page" /></a>
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
                        <a title="For English Students" href="/en/">
                            <img src="/images/flags/england.png"  />
                        </a>
                    </li>
                    <li>
                        <a title="For Chinese Students" href="/ch/">
                            <img src="/images/flags/china.png" />
                        </a>
                    </li>
                    <li>
                        <a id="fb-icon" target="_blank" title="facebook" href="https://www.facebook.com/konwersatoriummuzyczne/">
                            <img src="/images/flags/fb-art.png" />
                        </a>
                    </li>
                    <li>
                        <a target="_blank" title="instagram" href="https://www.instagram.com/konwersatoriummuzyczne/">
                            <img src="/images/flags/ig-art.png" />
                        </a>
                    </li>
                    <li>
                        <a target="_blank" title="YouTube" href="https://www.youtube.com/channel/UCpISipwaVRA4S16_j3ntGWA">
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

                if ($_SERVER['PHP_SELF'] != '/index.php') {
                    $a = '/index.html';
                }

            ?>
            
            <nav id="nav-main">
                <ul>
                    <li>
                        <a href="<?= $a ?>#banner">Strona główna</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#o-szkole">O szkole</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#oferta">Oferta</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#oferta-sezonowa"><b>kursy letnie</b></a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#galeria">Galeria</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#nauczyciele">Nauczyciele</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#referencje">Referencje</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#kontakt">Kontakt</a>
                    </li>
                    <li class="mobile-links">
                        <a href="/vi/"><img src="/images/flags/vietnam.png">For Vietnamese Students</a>
                    </li>
                    <li class="mobile-links">
                        <a href="/en/"><img src="/images/flags/england.png">For English Students</a>
                    </li>
                    <li class="mobile-links">
                        <a href="/chinese.html"><img src="/images/flags/china.png">For Chinese Students</a>
                    </li>
                    <li class="mobile-links">
                        <a href="https://www.facebook.com/konwersatoriummuzyczne/"><img src="/images/flags/fb-art.png">Dołącz do nas na Facebooku</a>
                    </li>
                    <li class="mobile-links">
                        <a href="https://www.instagram.com/konwersatoriummuzyczne/"><img src="/images/flags/fb-art.png">Dołącz do nas na Instagram</a>
                    </li>
                    <li class="mobile-links">
                        <a href="https://www.youtube.com/channel/UCpISipwaVRA4S16_j3ntGWA" target="_blank"><img src="/images/flags/yt-art.png">Sprawdź nasz kanał YouTube</a>
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
<!--End of Header-->
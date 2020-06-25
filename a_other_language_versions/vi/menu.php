<div id="header" class="nav-collapse">
    <div class="row clearfix">
        <div class="col-1">
            <div id="logo">
                <a href="index.html"><img src="/images/logo.jpg" id="banner-logo" alt="Landing Page" /></a>
                <a href="index.html"><img src="/images/logo.jpg" id="navigation-logo" alt="Landing Page" /></a>
            </div>
            <aside>
                <ul class="social-icons">
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
                        <a title="Dla Polskich Studentów" href="/">
                            <img src="/images/flags/poland.png"  />
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
            </aside>

            <?php

                // for the JavaScript menu scroll to work
                $a = '';

                if ($_SERVER['PHP_SELF'] != '/vi/index.php') {
                    $a = '/vi/';
                }

            ?>

            <nav id="nav-main">
                <ul>
                    <li>
                        <a href="<?= $a ?>#banner">Trang chủ</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#o-szkole">Về trường học</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#oferta">Gói hàng giới thiệu</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#galeria">Trưng bày</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#nauczyciele">Giáo viên</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#referencje">Lời khen giới thiệu</a>
                    </li>
                    <li>
                        <a href="<?= $a ?>#kontakt">Liên lạc</a>
                    </li>
                    <li class="mobile-links">
                        <a href="/en/"><img src="/images/flags/england.png">For English Students</a>
                    </li>
                    <li class="mobile-links">
                        <a href="/chinese.html"><img src="/images/flags/china.png" />For Chinese Students</a>
                    </li>
                    <li class="mobile-links">
                        <a href="/"><img src="/images/flags/poland.png" />Dla Polskich Studentów</a>
                    </li>
                    <li class="mobile-links">
                        <a href="https://www.facebook.com/konwersatoriummuzyczne/"><img src="/images/flags/fb-art.png" />Visit us on Facebook</a>
                    </li>
                    <li class="mobile-links">
                        <a href="https://www.youtube.com/channel/UCpISipwaVRA4S16_j3ntGWA"><img src="/images/flags/yt-art.png" />Check our YouTube channel</a>
                    </li>
                </ul>
            </nav>
            <div id="nav-trigger">
                <span></span>
            </div>
            <nav id="nav-mobile">
            </nav>
        </div>
    </div>
</div>
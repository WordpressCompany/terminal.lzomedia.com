<?php
$protocols = array('https://', 'http://');
$domain = str_replace($protocols, '', get_bloginfo('wpurl'));
?>
<footer class="container">
    <hr>
    <div class="row center-xs">
        <div class="col-lg-12" style="padding-bottom: 2vh">
            <a href="https://twitter.com/cornatul" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-twitter"></i></a>
            <a href="https://www.linkedin.com/in/cornatul/" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-linkedin"></i></a>
            <a href="https://github.com/cornatul" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-github"></i></a>
            <a href="https://www.instagram.com/cornatul/" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-instagram"></i></a>
            <a href="https://www.facebook.com/cornatul" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-facebook"></i></a>
            <a href="https://www.youtube.com/channel/UCATvoW-E8jPB2jIkUhfXygw" target="_blank"
               rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
            <a href="https://www.pinterest.com/cornatul/" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-pinterest"></i></a>
            <a href="https://www.flickr.com/photos/cornatul/" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-flickr"></i></a>
            <a href="https://www.reddit.com/user/cornatul" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-reddit"></i></a>
            <a href="https://www.tumblr.com/blog/cornatul" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-tumblr"></i></a>
        </div>
    </div>
    <div class="row center-xs">
        <div class="col-lg-12">
            <small>Design with <span class="heart">&hearts;</span> and open source in mind by <a
                        href="https://github.com/cornatul">Stefan aka @Cornatul </a></small>
        </div>
    </div>
    <hr>
</footer>


</main>

<!-- This is the area where is loaded the first time the page is loaded -->
<div id="editor" class="terminal shell" style="margin-top: 4em; width: 75vw">
    <code data-term-input>Connecting to <?php echo $domain; ?>...</code>
    <code data-term-input>Connected...</code>
    <code data-term-input>Page load complete</code>
</div>
<script src="https://kit.fontawesome.com/0ee24b0faa.js" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js" async></script>
<script src="<?php echo get_template_directory_uri(); ?>/dist/app.js"></script>

<!-- Google Lzo Media tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VSK9XHKSDH"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'G-VSK9XHKSDH');
</script>
<!-- Google Lzo Media tag (gtag.js) -->
</body>
</html>

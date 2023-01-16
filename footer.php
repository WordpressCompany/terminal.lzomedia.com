<?php
$protocols = array('https://');
$domain =  str_replace($protocols, '', get_bloginfo('wpurl'));
?>
<footer class="container">
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <small>Design with <span class="heart">&hearts;</span> and open source in mind by <a href="https://github.com/lzomedia">Stefan Izdrail</a></small>
        </div>
    </div>
</footer>


</main>

<!-- This is the area where is loaded the first time the page is loaded -->
<div id="editor" class="terminal shell" style="margin-top: 4em; width: 75vw">
    <code data-term-input>Connecting to <?php echo $domain;?>...</code>
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
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-VSK9XHKSDH');
</script>
</body>
</html>

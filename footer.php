<?php
$protocols = array('https://');
$domain =  str_replace($protocols, '', get_bloginfo('wpurl'));
?>
<footer class="container">
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <small>Design with <span class="heart">&hearts;</span> and open source in mind by Lzo Media</small>
        </div>
    </div>
</footer>


</main>

<!-- This is the area where is loaded the first time the page is loaded -->
<div id="editor" class="terminal shell" style="margin-top: 4em;">
    <code data-term-input>Connecting to <?php echo $domain;?>...</code>
    <code data-term-input>Connected...</code>
    <code data-term-input>Page load complete</code>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js" async defer></script>
<script src="https://buttons.github.io/buttons.js"  async defer></script>
<script src="<?php echo get_template_directory_uri(); ?>/dist/app.js"></script>
</body>
</html>

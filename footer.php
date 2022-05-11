
<footer class="container">
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <?php

            wp_nav_menu(
                    [
                        'container' => false,
                        'class' => 'some',
                        'items_wrap' => '%3$s',
                        'theme_location' => 'primary'
                    ]
            );
            ?>

            <p>Design with &hearts; and open source in mind</p>

        </div>
    </div>
</footer>


</main>


<div id="editor" class="terminal shell" style="margin-top: 4em;">
    <code data-term-input>Connecting to development.sh ...</code>
    <code data-term-input>Connected...</code>
    <code data-term-input>Page load complete</code>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js" async defer></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/dist/app.js"></script>
</body>
</html>

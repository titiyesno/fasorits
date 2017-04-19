<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title><?php if (isset($template['title'])) echo $template['title']; ?></title>

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-52768710-1', 'auto');
            ga('send', 'pageview');

        </script>
                    <?php if (isset($template['partials']['jsorcss'])) echo $template['partials']['jsorcss']; ?>
                    <?php $this->load->view('hf/include/head_fe'); ?>
    </head>
    <body>
        <div >

            <div class="">
                <section class="wrapper">
<?php if (isset($template['partials']['menu'])) echo $template['partials']['menu']; ?>
                </section>
                <section class="content-header">
                    <?php if (isset($template['partials']['header'])) echo $template['partials']['header']; ?>
                </section>
                <section class="wrapper">
<?php echo $template['body']; ?>  
                </section>

                <section class="footer">
<?php if (isset($template['partials']['footer'])) echo $template['partials']['footer']; ?>
<?php $this->load->view('hf/include/footer_fe') ?>
                </section>
            </div>
        </div>
    </body>
</html>

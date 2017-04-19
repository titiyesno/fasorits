<html>
    <head>
        <title><?php if (isset($template['title'])) echo $template['title']; ?></title>
        <title><?php if (isset($template['partials']['jsorcss'])) echo $template['partials']['jsorcss']; ?></title>
        <?php $this->load->view('hf/include/head'); ?>
    </head>
    <body style="background-image: url('<?php echo base_url() ?>static/img/header/header.jpg')">
        <div id="body" class="row" >
            <div class="large-12 columns shadowborder">
                <div class="large-12 columns"  style="min-height: 500px;">
                    <?php echo $template['body']; ?>    
                </div>
            </div>
        </div>
    </body>
</html>

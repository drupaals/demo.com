<div id="main-login">
            <?php if ($logo): ?>
                <img src="<?php print $logo ?>" alt="<?php print $site_name_and_slogan ?>" title="<?php print $site_name_and_slogan ?>" id="logo" />
            <?php endif; ?>
            
            <div id="login" class="animate form position">
                <div id="login-content">
                    <h4 class="header blue lighter bigger">
                        <i class="ace-icon fa fa-coffee green"></i>
                        Please Enter Your Information
                    </h4>
                    <?php print render(drupal_get_form('user_login_block')); ?>
                </div>
            </div>
        </div>
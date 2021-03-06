<div class="descMsg">
    Define the number of reuslts for each source group with these options.<br>
    The <strong>left</strong> values are for the ajax results, the <strong>right</strong> values are for non-ajax results (aka. results page/override).
</div>
<div class="item">
    <?php
    $o = new wpdreamsTextSmall("posts_limit", "Post type (post, page, product..) results limit", $sd['posts_limit']);
    $params[$o->getName()] = $o->getData();
    $o = new wpdreamsTextSmall("posts_limit_override", " on result page", $sd['posts_limit_override']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsTextSmall("taxonomies_limit", "Category/Tag/Term results limit", $sd['taxonomies_limit']);
    $params[$o->getName()] = $o->getData();
    $o = new wpdreamsTextSmall("taxonomies_limit_override", " on result page", $sd['taxonomies_limit_override']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsTextSmall("users_limit", "User results limit", $sd['users_limit']);
    $params[$o->getName()] = $o->getData();
    $o = new wpdreamsTextSmall("users_limit_override", " on result page", $sd['users_limit_override']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsTextSmall("blogs_limit", "Blog results limit", $sd['blogs_limit']);
    $params[$o->getName()] = $o->getData();
    $o = new wpdreamsTextSmall("blogs_limit_override", " on result page", $sd['blogs_limit_override']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsTextSmall("buddypress_limit", "Buddypress results limit", $sd['buddypress_limit']);
    $params[$o->getName()] = $o->getData();
    $o = new wpdreamsTextSmall("buddypress_limit_override", " on result page", $sd['buddypress_limit_override']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsTextSmall("comments_limit", "Comments results limit", $sd['comments_limit']);
    $params[$o->getName()] = $o->getData();
    $o = new wpdreamsTextSmall("comments_limit_override", " on result page", $sd['comments_limit_override']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsTextSmall("attachments_limit", "Attachments results limit", $sd['attachments_limit']);
    $params[$o->getName()] = $o->getData();
    $o = new wpdreamsTextSmall("attachments_limit_override", " on result page", $sd['attachments_limit_override']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
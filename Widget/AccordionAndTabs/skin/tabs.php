<dl class="_tabs-menu">
    <?php
    $first = true;
    foreach ($blocks as $key => $block):?>
        <dt><a  href="#panel<?php echo $block?>" <?=$first ? 'class="current"' : ''?>><?php echo ipIsManagementState() ? '<span class="ip"><span class="fa fa-times remove" data-key="'.$block.'" style="color: red">&nbsp</span></span>' : ''; ?><span class="title" data-key="<?php echo $block; ?>"><?php echo (isset($titles[$block]) && $titles[$block] ? $titles[$block] : 'Title'); ?></span></a></dt>
        <?php
        $first = false;
    endforeach;
    if(ipIsManagementState()):?>
        <dt><a href="" id="add" ><span class="ip"><span class="fa fa-plus"  style="color: green">&nbsp</span></span> Add</a></dt>
    <?php endif;?>
</dl>
<div class="_tabs">
    <?php
    $first = true;
    foreach ($blocks as $key => $block):?>
        <div class="_tab <?=$first ? 'current' : ''?>" id="panel<?php echo $block?>"> <?php echo ipBlock($block)->exampleContent('')->render($revisionId); ?></div>
        <?php
        $first = false;
    endforeach;
    if(ipIsManagementState()):?>
        <div class="_tab"></div>
    <?php endif;?>
</div>
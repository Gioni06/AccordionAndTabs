<div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs _tabs-menu"  role="tablist">
        <?php
        $first = true;
        foreach ($blocks as $key => $block):?>
            <li role="presentation" class="<?=$first ? 'active ' : ''?>"><a  href="#<?php echo $block?>" aria-controls="<?php echo $block?>" role="tab" data-toggle="tab" ><?php echo ipIsManagementState() ? '<span class="ip"><span class="fa fa-times remove" data-key="'.$block.'" style="color: red">&nbsp</span></span>' : ''; ?><span class="title" data-key="<?php echo $block; ?>"><?php echo (isset($titles[$block]) && $titles[$block] ? $titles[$block] : 'Title'); ?></span></a></li>
            <?php
            $first = false; ?>
        <?php endforeach; ?>
        <?php if(ipIsManagementState()):?>
            <li role="presentation" class=""><a id="add" href="#"><?php echo '<span class="ip"><span class="fa fa-plus"  style="color: green">&nbsp</span></span>'; ?><span class="title">Add</span></a></li>
        <?php endif;?>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <?php $first = true; ?>
        <?php foreach ($blocks as $key => $block):?>

            <div role="tabpanel" class="tab-pane _tab <?=$first ? 'active' : ''?>" id="<?php echo $block?>"> <?php echo ipBlock($block)->exampleContent('')->render($revisionId); ?></div>

            <?php $first = false; ?>
        <?php endforeach; ?>
        <?php if(ipIsManagementState()):?>
            <div class="_tab"></div>
        <?php endif;?>
    </div>

</div>
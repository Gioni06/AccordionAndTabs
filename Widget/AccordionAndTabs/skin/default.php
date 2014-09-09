<dl class="_accordion">
    <?php foreach ($blocks as $key => $block):?>
        <dt><a href="#panel<?php echo $block?>"><?php echo ipIsManagementState() ? '<span class="ip"><span class="fa fa-times remove" data-key="'.$block.'" style="color: red">&nbsp</span></span>' : ''; ?><span class="title" data-key="<?php echo $block; ?>"><?php echo (isset($titles[$block]) && $titles[$block] ? $titles[$block] : 'Title'); ?></span></a></dt>
        <dd><?php echo ipBlock($block)->exampleContent('')->render($revisionId); ?></dd>
    <?php endforeach;
    if(ipIsManagementState()):?>
        <dt><a href="" id="add" ><span class="ip"><span class="fa fa-plus"  style="color: green">&nbsp</span></span> Add</a></dt>
        <dd>&nbsp</dd>
    <?php endif;?>
</dl>
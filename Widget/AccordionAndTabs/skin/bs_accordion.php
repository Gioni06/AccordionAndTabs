<div class="panel-group" id="accordion<?php echo $block?>">
    <?php foreach ($blocks as $key => $block):?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="title" data-toggle="collapse" data-parent="#accordion<?php echo $block?>" href="#collapse<?php echo $block?>" data-key="<?php echo $block; ?>">
                        <?php echo ipIsManagementState() ? '<span class="ip"><span class="fa fa-times remove" data-key="'.$block.'" style="color: red">&nbsp</span></span>' : ''; ?>
                        <?php echo (isset($titles[$block]) && $titles[$block] ? $titles[$block] : 'Title'); ?>
                    </a>
                </h4>
            </div>
            <div id="collapse<?php echo $block?>" class="panel-collapse collapse <?php if($key == 0){echo 'in';}?>">
                <div class="panel-body">
                    <?php echo ipBlock($block)->exampleContent('')->render($revisionId); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php if(ipIsManagementState()):?>
        <dt><a href="" id="add" ><span class="ip"><span class="fa fa-plus"  style="color: green">&nbsp</span></span> Add</a></dt>
        <dd>&nbsp</dd>
    <?php endif;?>
</div>
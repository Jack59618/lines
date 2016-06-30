<div id="LinesAdminAdd">
    <?php echo $this->Form->create('Line', array('type' => 'file')); ?>
    <div class="Lines form">
        <?php
        echo $this->Form->input('Line.title', array(
            'label' => 'Title',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->hidden('Line.json');
        ?>
        <div id="map" style="width: 100%; height: 600px;"></div>
    </div>
    <?php
    echo $this->Form->end(__('Submit', true));
    ?>
</div>
<?php
$this->Html->script('c/lines/map_base', array('inline' => false));
$this->Html->script('c/lines/admin_add', array('inline' => false));
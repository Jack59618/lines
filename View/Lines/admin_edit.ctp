<div id="LinesAdminEdit">
    <?php echo $this->Form->create('Line', array('type' => 'file')); ?>
    <input type="submit" class="btn btn-primary pull-right" value="儲存" />
    <div class="Lines form">
        <?php
        echo $this->Form->input('Line.id');
        echo $this->Form->input('Line.title', array(
            'label' => 'Title',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
	echo $this->Form->input('Line.date_begin', array(
	    'label' => 'Date begin',
            'div' => 'form-group',
            'class' => 'form-control',
	));
	echo $this->Form->input('Line.date_end', array(
	    'label' => 'Date end',
            'div' => 'form-group',
            'class' => 'form-control',
	));
	echo $this->Form->input('Line.author', array(
	    'label' => 'Author',
            'div' => 'form-group',
            'class' => 'form-control',
            'text' => 'input',
	));
        echo $this->Form->hidden('Line.json');
        ?>
        <div id="map" style="width: 100%; height: 600px;"></div>
    </div>
    <?php
    echo $this->Form->end();
    ?>
</div>
<?php
$this->Html->script('c/lines/map_base', array('inline' => false));
$this->Html->script('c/lines/admin_edit', array('inline' => false));

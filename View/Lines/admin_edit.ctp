<div id="LinesAdminEdit">
    <?php echo $this->Form->create('Line', array('type' => 'file')); ?>
    <div class="Lines form">
        <fieldset>
            <legend><?php
                echo __('Edit Lines', true);
                ?></legend>
            <?php
            echo $this->Form->input('Line.id');
            echo $this->Form->input('Line.title', array(
                'label' => 'Title',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Line.json', array(
                'rows' => '5',
                'cols' => '10',
                'label' => 'Json',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Line.created', array(
                'label' => 'Created',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Line.modified', array(
                'label' => 'Modified',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            ?>
        </fieldset>
    </div>
    <?php
    echo $this->Form->end(__('Submit', true));
    ?>
</div>
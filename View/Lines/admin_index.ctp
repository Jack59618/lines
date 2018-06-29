<?php
if (!isset($url)) {
    $url = array();
}
?>
<div id="LinesAdminIndex">
    <h2><?php echo __('Lines', true); ?></h2>
    <div class="btn-group">
        <?php echo $this->Html->link(__('Add', true), array('action' => 'add'), array('class' => 'btn btn-default')); ?>
        <?php echo $this->Html->link(__('SearchTime', true), array('prefix'=>'admin','controller' => 'lines','action' => 'searchtime'), array('class' => 'btn btn-default')); ?>
    </div>
    <div><?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?></div>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="LinesAdminIndexTable">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('Line.title', 'Title', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Line.created', 'Created', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Line.modified', 'Modified', array('url' => $url)); ?></th>
                <th class="actions"><?php echo __('Action', true); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($items as $item) {
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>

                    <td><?php
                        echo $item['Line']['title'];
                        ?></td>
                    <td><?php
                        echo $item['Line']['created'];
                        ?></td>
                    <td><?php
                        echo $item['Line']['modified'];
                        ?></td>
                    <td>
                        <div class="btn-group">
                            <?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Line']['id']), array('class' => 'btn btn-default')); ?>
                            <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $item['Line']['id']), array('class' => 'btn btn-default')); ?>
                            <?php echo $this->Html->link(__('Json', true), array('action' => 'json', $item['Line']['id'], 'admin' => false), array('class' => 'btn btn-default', 'target' => '_blank')); ?>
                            <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $item['Line']['id']), array('class' => 'btn btn-default'), __('Delete the item, sure?', true)); ?>
                        </div>
                    </td>
                </tr>
            <?php } // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="LinesAdminIndexPanel"></div>
</div>

<div id="LinesIndex">
    <h2><?php echo __('Lines', true); ?></h2>
    <div class="btn-group">
    </div>
    <p>
        <?php
        $url = array();

        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?></p>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="LinesIndexTable">
        <thead>
            <tr>

                <th><?php echo $this->Paginator->sort('Line.title', 'Title', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Line.json', 'Json', array('url' => $url)); ?></th>
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
                        echo $item['Line']['json'];
                        ?></td>
                    <td><?php
                        echo $item['Line']['created'];
                        ?></td>
                    <td><?php
                        echo $item['Line']['modified'];
                        ?></td>
                    <td>
                        <div class="btn-group">
                            <?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Line']['id']), array('class' => 'btn btn-default LinesIndexControl')); ?>
                        </div>
                    </td>
                </tr>
            <?php }; // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="LinesIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            $('#LinesIndexTable th a, div.paging a, a.LinesIndexControl').click(function () {
                $('#LinesIndex').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>
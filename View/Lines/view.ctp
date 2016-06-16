<div id="LinesView">
    <h3><?php echo __('View Lines', true); ?></h3><hr />
    <div class="col-md-12">

        <div class="col-md-2">Title</div>
        <div class="col-md-9"><?php
            if ($this->data['Line']['title']) {

                echo $this->data['Line']['title'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-2">Json</div>
        <div class="col-md-9"><?php
            if ($this->data['Line']['json']) {

                echo $this->data['Line']['json'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-2">Created</div>
        <div class="col-md-9"><?php
            if ($this->data['Line']['created']) {

                echo $this->data['Line']['created'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-2">Modified</div>
        <div class="col-md-9"><?php
            if ($this->data['Line']['modified']) {

                echo $this->data['Line']['modified'];
            }
            ?>&nbsp;
        </div>
    </div>
    <div class="btn-group">
        <?php echo $this->Html->link(__('Lines List', true), array('action' => 'index'), array('class' => 'btn btn-default')); ?>
    </div>
    <div id="LinesViewPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            $('a.LinesViewControl').click(function () {
                $('#LinesViewPanel').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>
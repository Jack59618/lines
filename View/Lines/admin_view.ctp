<div id="LinesAdminView">
    <div class="col-md-2">Title</div>
    <div class="col-md-9">&nbsp;<?php
        echo $this->data['Line']['title'];
        ?>&nbsp;
    </div>
    <div class="col-md-2">Date Begin</div>
    <div class="col-md-9">&nbsp;<?php
        echo $this->data['Line']['date_begin'];
        ?>&nbsp;
    </div>
    <div class="col-md-2">Date End</div>
    <div class="col-md-9">&nbsp;<?php
        echo $this->data['Line']['date_end'];
        ?>&nbsp;
    </div>
    <div class="col-md-2">Created</div>
    <div class="col-md-9">&nbsp;<?php
        echo $this->data['Line']['created'];
        ?>&nbsp;
    </div>
    <div class="col-md-2">Modified</div>
    <div class="col-md-9">&nbsp;<?php
        echo $this->data['Line']['modified'];
        echo $this->Form->hidden('Line.json');
        ?>&nbsp;
    </div>
    <div id="map" style="width: 100%; height: 600px;"></div>
</div>
<?php
$this->Html->script('c/lines/admin_view', array('inline' => false));

<?php declare(strict_types=1);

class SubmitTools extends \Encore\Admin\Show\Tools
{
    public function render()
    {
        return <<<HTML
<div class="btn-group pull-right" style="margin-right: 5px">
    <a href="{'path'}" class="btn btn-sm btn-primary" title="{'edit'}">
        <i class="fa fa-edit"></i><span class="hidden-xs"> {'edit'}</span>
    </a>
</div>
HTML;
    }
}

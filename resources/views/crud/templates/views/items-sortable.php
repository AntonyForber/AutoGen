@php
/**
 * @var \App\Modules\<?= $moduleName ?>\Models\<?= $modelName ?>[] $models
 */
@endphp

@foreach ($models as $item)
    <li class="dd-item dd3-item" data-id="{{ $item->id }}">
        <div title="Drag" class="dd-handle dd3-handle">Drag</div>
        <div class="dd3-content">
            <table style="width: 100%;">
                <tr>
                    <td class="column-drag" width="1%"></td>
<?php foreach ($fields as $field) : ?>
                    <td valign="top" class="pagename-column">
                        <div class="clearFix">
                            <div class="pull-left">
                                <div class="overflow-20">
                                    {{ $item-><?= $field['path'] ?><?= $field['name'] ?> }}
                                </div>
                            </div>
                        </div>
                    </td>
<?php endforeach;?>
<?php if ($active) : ?>
                    <td width="30" valign="top" class="icon-column status-column">
                        {!! Widget::active($item, 'admin.<?= $routeName ?>.active') !!}
                    </td>
<?php endif;?>
                    <td class="nav-column icon-column" valign="top" width="100" align="right">
                        {!! \App\Components\Buttons::edit('admin.<?= $routeName ?>.edit', $item->id) !!}
                        {!! \App\Components\Buttons::delete('admin.<?= $routeName ?>.destroy', $item->id) !!}
                    </td>
                </tr>
            </table>
        </div>
        @if(!empty($item->children) && $item->children->count() > 0)
            <ol>
                @include('<?= strtolower($moduleName) ?>::admin.items', ['models' => $item->children])
            </ol>
        @endif
    </li>
@endforeach

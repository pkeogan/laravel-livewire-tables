@foreach($models as $model)
    <tr
        class="{{ $this->setTableRowClass($model) }} @if($loop->even){{ $this->setAlternateTableRowClass($model) }}@endif"
        id="{{ $this->setTableRowId($model) }}"
        @foreach ($this->setTableRowAttributes($model) as $key => $value)
        {{ $key }}="{{ $value }}"
        @endforeach
        @if ($this->getTableRowUrl($model))
            onclick="window.location='{{ $this->getTableRowUrl($model) }}';"
            style="cursor:pointer"
        @endif
    >
        
    @if($showHeaderSelectAllCheck)       
        <td class="hidden sm:table-cell">
        <div class="flex items-center h-5">
            <input id="no-{{ $model->id }}" name="" type="checkbox" class="w-4 h-4 ml-4 text-blue-800 border-blue-300 rounded opacity-75 focus:ring-blue-400 focus:ring-1">
        </div>
        </td>
    @endif
        @foreach($columns as $column)
            @if ($column->isVisible())
                <td
                    class="px-2 pl-4 lg:px-6 py-4 whitespace-nowrap {{ $column->getCellClass() }} {{ $this->setTableDataClass($column->getAttribute(), data_get($model, $column->getAttribute())) }} flex sm:table-cell"
                    id="{{ $this->setTableDataId($column->getAttribute(), data_get($model, $column->getAttribute())) }}"
                    @foreach ($this->setTableDataAttributes($column->getAttribute(), data_get($model, $column->getAttribute())) as $key => $value)
                    {{ $key }}="{{ $value }}"
                    @endforeach
                >
                    @if ($column->isFormatted())
                        @if ($column->isRaw())
                            {!! $column->formatted($model, $column) !!}
                        @else
                            {{ $column->formatted($model, $column) }}
                        @endif
                    @else
                        @if ($column->isRaw())
                            {!! data_get($model, $column->getAttribute()) !!}
                        @else
                            {{ data_get($model, $column->getAttribute()) }}
                        @endif
                    @endif
                </td>
            @endif
        @endforeach
    </tr>
@endforeach

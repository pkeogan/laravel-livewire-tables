
    @if ($showHeaderSelectAllCheck)
    <th class="hidden sm:table-cell">
        <div class="flex items-center h-5 ">
            <input id="offers" name="box" type="checkbox" class="hidden w-4 h-4 ml-4 text-blue-800 border-blue-300 rounded opacity-75 focus:ring-blue-400 focus:ring-1 sm:block">
          </div>    
    </th>
    @endif
    @foreach($columns as $column)
        @if ($column->isVisible())
            @if($column->isSortable())
                <th
                    scope="col"
                    class="px-2 lg:px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer {{ $this->setTableHeadClass($column->getAttribute()) }} @if(!$loop->first) hidden sm:table-cell @endif"
                    id="{{ $this->setTableHeadId($column->getAttribute()) }}"
                    @foreach ($this->setTableHeadAttributes($column->getAttribute()) as $key => $value)
                    {{ $key }}="{{ $value }}"
                    @endforeach
                    wire:click="sort('{{ $column->getAttribute() }}')"
                >
                    {{ $column->getText() }}

                    @if ($sortField !== $column->getAttribute())
                    <i class="pl-2 fas fa-sort"></i>
                    @elseif ($sortDirection === 'asc')
                    <i class="fas fa-sort-up"></i>
                    @else
                    <i class="fas fa-sort-down"></i>
                    @endif
                </th>
            @else
                <th
                    class="px-2 lg:px-6  py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase {{ $this->setTableHeadClass($column->getAttribute()) }} hidden sm:block"
                    id="{{ $this->setTableHeadId($column->getAttribute()) }}"
                    @foreach ($this->setTableHeadAttributes($column->getAttribute()) as $key => $value)
                        {{ $key }}="{{ $value }}"
                    @endforeach
                >
                    {{ $column->getText() }}
                </th>
            @endif
        @endif
    @endforeach


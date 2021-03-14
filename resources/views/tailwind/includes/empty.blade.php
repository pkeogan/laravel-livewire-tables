<tr>
    @if($showHeaderSelectAllCheck)
        <td colspan="{{ collect($columns)->count()+1 }}">
    @else
        <td colspan="{{ collect($columns)->count() }}">
    @endif
        <div class="border-gray-200 text-gray-400 rounded-md p-3 w-1/2 mx-auto m-1 text-center text-sm">
            <i class="far fa-frown text-base"></i><br>
            @lang('laravel-livewire-tables::strings.no_results')            
        </div>
    </td>
</tr>

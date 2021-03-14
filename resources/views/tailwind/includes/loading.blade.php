@if ($loadingIndicator)
    <tbody class="hidden bg-white divide-y divide-gray-200" x-max="1" wire:loading.class.remove="hidden">
        <tr class="content-center">
            <td colspan="{{ collect($columns)->count() }}">
                
           
               Loading <i class="fas fa-sync fa-spin"></i>
            
            </td>
        </tr>
  

    <tbody class="bg-white divide-y divide-gray-200" x-max="1" @if($collapseDataOnLoading) wire:loading.remove @endif>
@else
    <tbody class="bg-white divide-y divide-gray-200" x-max="1">
@endif

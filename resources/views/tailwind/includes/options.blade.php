@if ($paginationEnabled || $searchEnabled || $filterEnabled)
    <div class="flex flex-row justify-end mt-2 mb-4 space-x-4">
        @if ($paginationEnabled && count($perPageOptions))
        <label for="location" class="self-center hidden text-sm font-medium text-gray-500 sm:block">Per Page</label>
            <select wire:model="perPage" class="text-sm border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @foreach ($perPageOptions as $option)
                    <option>{{ $option }}</option>
                @endforeach
            </select>
        @endif

        @if ($searchEnabled)
        
        <div class="flex-1 max-w-lg min-w-lg">
            <label for="search" class="sr-only">Search</label>
            <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">                    
                    <svg class="w-5 h-5 text-gray-400" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input  
                @if (is_numeric($searchDebounce) && $searchUpdateMethod === 'debounce') wire:model.debounce.{{ $searchDebounce }}ms="search" @endif
                @if ($searchUpdateMethod === 'lazy') wire:model.lazy="search" @endif
                @if ($disableSearchOnLoading) wire:loading.attr="disabled" @endif
                type="search" name="search" id="search" class="block w-full pl-10 border-gray-300 rounded-md focus:ring-blue-300 focus:border-blue-300 sm:text-sm place-self-end"
                placeholder="{{ __('laravel-livewire-tables::strings.search') }}"/>

                        @if ($clearSearchButton)
                            <div class="input-group-append">
                                <button class="btn btn-outline-dark" type="button" wire:click="clearSearch">@lang('laravel-livewire-tables::strings.clear')</button>
                            </div>               
                            
                            @endif
            </div>
        </div>
        @endif

        @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.export')
        @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.filter')
    </div><!--row-->
@endif

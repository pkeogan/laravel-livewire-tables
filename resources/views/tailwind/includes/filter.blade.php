@if ($filterEnabled && count($filtersViews))
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative inline-block text-left" x-data="{open: false}">
    <div>
      <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="options-menu" aria-haspopup="true" aria-expanded="true" x-bind:aria-expanded="open" @click="open = !open" >
        <i class="mr-2 text-sm text-gray-500 fas fa-filter"></i><span class="hidden ml-2 text-sm text-gray-500 sm:block sm:ml-0">{{ count($filters) ? '(' . count($filters) . ')' : '' }}</span>
        @if(!count($filters))
        <span class="text-sm text-gray-500 sm:ml-4"></span>
        @endif
        <!-- Heroicon name: solid/chevron-down -->
        <svg class="w-5 h-5 ml-2 -mr-1 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>
  
    <!--
      Dropdown panel, show/hide based on dropdown state.
  
      Entering: "transition ease-out duration-100"
        From: "transform opacity-0 scale-95"
        To: "transform opacity-100 scale-100"
      Leaving: "transition ease-in duration-75"
        From: "transform opacity-100 scale-100"
        To: "transform opacity-0 scale-95"
    -->
    <div x-show="open" 
    x-transition:enter="transition ease-out duration-100" 
    x-transition:enter-start="transform opacity-0 scale-95" 
    x-transition:enter-end="transform opacity-100 scale-100" 
    x-transition:leave="transition ease-in duration-75" 
    x-transition:leave-start="transform opacity-100 scale-100" 
    x-transition:leave-end="transform opacity-0 scale-95" 
    class="absolute right-0 z-50 w-56 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5" 
    role="menu" 
    aria-orientation="vertical" 
    aria-labelledby="options-menu" @click.away="open = false">
    @foreach ($filtersViews as $view)
      @if($view->view == "single-filter")
          @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.filters.'.$view->view, ['view' => $view])
      @else
        <div class="px-4 py-2 text-xs font-semibold text-left text-gray-500 uppercase">
            {{ $view->getTitle() }}
        </div>
        <div class="mb-2">        
            @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.filters.'.$view->view, ['view' => $view])
        </div>
      @endif
    @endforeach
    @if ($clearFilterButton && count($filters) > 0)
    <div class="flex justify-end px-4 py-2 text-right bg-gray-100">
        <a href="#" wire:click="clearFilters" onclick="document.querySelector('#filter-form').reset()" class="text-sm text-gray-600 hover:text-gray-900">
            
            Clear filters <i class="ml-3 text-red-500 fas fa-minus-square"></i>
        </a>
    </div>
@endif
    </div>
  </div>
@endif

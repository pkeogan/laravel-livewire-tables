
    @foreach ($view->options() as $key => $label)
        <div class="flex items-center px-4 py-2 hover:bg-gray-50">
            <input id="{{ $view->id }}-{{ $key }}" name="filters.{{ $view->id }}.{{ $key }}" wire:model="filters.{{ $view->id }}.{{ $key }}" type="checkbox" class="w-4 h-4 text-blue-500 border-gray-300 rounded focus:ring-gray-300">
            <label for="{{ $view->id }}-{{ $key }}" class="block w-full ml-2 text-sm text-gray-900">
                {{ $label }}
            </label>
        </div> 
    @endforeach


<div class="flex flex-col">

    @include('includes.partials.messages')
    
    @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.offline')
    @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.options')

    <div class="-my-2 rounded-lg sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle rounded-lg sm:px-6 lg:px-8">
        <div class="border-b border-gray-200 shadow" 
        @if (is_numeric($refresh)) wire:poll.{{ $refresh }}.ms @elseif(is_string($refresh)) wire:poll="{{ $refresh }}" @endif>
        <table class="min-w-full text-sm divide-y divide-gray-200 table-auto">

            @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.thead')

            @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.loading')
                @if($models->isEmpty())
                    Empty
                    @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.empty')
                @else
                    @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.data')
                @endif
            </tbody>

            @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.tfoot')
        </table>


    @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.pagination')
            </div>
        </div>
    </div>
</div>

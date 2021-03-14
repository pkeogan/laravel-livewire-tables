@if ($offlineIndicator)
    <div wire:offline.class="hidden" wire:offline.class.remove="hidden" class="hidden alert alert-danger">
        @lang('laravel-livewire-tables::strings.offline')
    </div>
@endif

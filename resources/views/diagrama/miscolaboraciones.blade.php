<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Page header --}}
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <!-- Left: Actions -->
            <div class="mb-4 sm:mb-0">
    
                <!-- Title -->
            </div>
    
        </div>

        @livewire('diagrama.diagram-colaboradores');
    
        @push('js')
             
        @endpush
    
        
    
    </div>
    
</x-app-layout>
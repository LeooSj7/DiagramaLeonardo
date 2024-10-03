<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Page header --}}
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
    
            <!-- Left: Actions -->
            <div class="mb-4 sm:mb-0">
    
                <!-- Title -->
                <h1 class="text-2xl md:text-3xl text-black font-bold">Usuario: {{Auth::user()->name }}</h1>
    
    
            </div>
    
            <!-- Right: Actions EL BOTON PARA AÑADIR DIAGRAMAS -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
    

    

    
                <!-- Create events modal -->
                    @livewire('diagrama.diagram-create')
    
            </div>
    
        </div>

        @livewire('diagrama.mis-diagramas');
    
    
        @push('js')
             
            <script>
                Livewire.on('deleteDiagram', diagramId => {
                    Swal.fire({
                        title: 'Estas seguro?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#7066e0',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Eliminiar!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
    
                            Livewire.emitTo('diagrama.mis-diagramas', 'delete', diagramId);
                            Swal.fire(
                                'Eliminado!',
                                'El Diagrama ha sido eliminado.',
                                'success'
                            )
                        }
                    })
                })
            </script>
    
        @endpush
    
   
    
    </div>
    
</x-app-layout>
<x-authentication-layout>
    <div class="flex items-center justify-center min-h-screen">
        <!-- Contenedor del formulario con el cuadro plomo oscuro -->
        <div class="bg-gray-700 p-8  shadow-lg w-full max-w-md">
            <h1 class="text-3xl text-white  mb-6 text-center">{{ __('Iniciar Sesion') }}</h1>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif   

            <!-- Formulario -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="space-y-4">
                    <div>
                        <x-label for="email" value="{{ __('Correo Electrónico') }}" class="text-white"/>
                        <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />                
                    </div>
                    <div>
                        <x-label for="password" value="{{ __('Contraseña') }}" class="text-white"/>
                        <x-input id="password" type="password" name="password" required autocomplete="current-password" />                
                    </div>
                </div>

                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <!-- Aquí podrías agregar un link para recuperación de contraseña si lo deseas -->
                    @endif            
                </div>

                <!-- Botón de inicio de sesión -->
                <x-button class="m-3 w-full bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-none">
                    {{ __('Iniciar') }}
                </x-button>
            </form>

            <x-validation-errors class="mt-4" />   
        </div>
    </div>
</x-authentication-layout>

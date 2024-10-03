<x-authentication-layout>
    <div class="bg-gray-700 p-6 rounded-lg shadow-md max-w-lg mx-auto mt-10">
        <h1 class="text-3xl text-black font-bold mb-6">{{ __('Registrarse') }}</h1>
        <!-- Form -->
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4 mb-4">
                <div>
                    <x-label for="name" class="text-white">{{ __('Nombre y tu apellido') }} </x-label>
                    <x-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="text-black" />
                </div>

                <div>
                    <x-label for="email" class="text-white">{{ __('Correo') }} </x-label>
                    <x-input id="email" type="email" name="email" :value="old('email')" required class="text-black" />
                </div>

                <div>
                    <x-label for="password" class="text-white" value="{{ __('Contraseña') }}" />
                    <x-input id="password" type="password" name="password" required autocomplete="new-password" class="text-black" />
                </div>

                <div>
                    <x-label for="password_confirmation" class="text-white" value="{{ __('Confirma contraseña') }}" />
                    <x-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="text-black" />
                </div>
            </div>

            <x-button type="submit">
                {{ __('Confirmar') }}
            </x-button>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-6">
                    <label class="flex items-start">
                        <input type="checkbox" class="form-checkbox mt-1" name="terms" id="terms" />
                        <span class="text-sm ml-2 text-white">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="text-sm underline hover:no-underline">' . __('Terms of Service') . '</a>',
                                'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="text-sm underline hover:no-underline">' . __('Privacy Policy') . '</a>',
                            ]) !!}
                        </span>
                    </label>
                </div>
            @endif
        </form>
        <x-validation-errors class="mt-4" />
    </div>
    <!-- Footer -->
</x-authentication-layout>

@extends('app')

@section('content')
    <div class="h-[90vh] w-full">
        <div class="flex h-full items-center">
            <div class="md:w-1/2 w-full py-10 px-4 md:px-10 h-full flex w-full">
                <div class='bg-white md:w-1/2 w-full mx-auto'>

                    <p tabindex="0"
                       class="focus:outline-none text-2xl font-extrabold leading-6 text-gray-800">
                        Confirm your password
                    </p>

                    <p tabindex="0"
                       class="focus:outline-none text-sm mt-3 leading-none text-gray-400">
                        This is a secure area of the application. Please confirm your password before continuing.
                    </p>

                    <form action="{{ route('password.confirm') }}"
                          method="POST">
                        @csrf
                        <div class='mt-6'>
                            <x-form.label for="password">
                                Password
                            </x-form.label>

                            <x-form.input name="password"
                                          type="password"
                                          class="mt-1 w-full"
                                          autocomplete="confirm-password"
                                          error='password' />
                        </div>

                        <div class="mt-8">
                            <x-button type="submit"
                                      class="w-full justify-center">
                                Confirm Password
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
            <div class='hidden md:block md:w-1/2 h-full bg-cover bg-center bg-no-repeat'
                 style='background-image: url({{ asset('images/' . random_int(1, 3) . '.webp') }});'>
            </div>
        </div>
    </div>
@endsection

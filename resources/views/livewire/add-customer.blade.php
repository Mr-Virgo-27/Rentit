<div>
        <link rel="stylesheet" href="sweetalert2.min.css">
        <link rel="stylesheet" href="/css/admin.css">
        <script src="https://kit.fontawesome.com/9b62d0cfda.js" crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-6">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-blue-800 sm:border-2 sm:rounded-md sm:shadow-lg">

                <header id="olaf" class="font-semibold text-center text-gray-700 py-5 px-5 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ strtoupper('Add New Customer')  }}
                </header>

                <form class="w-3 px-6 space-y-6 sm:px-10 sm:space-y-8">

                    <div class="flex flex-wrap">
                        <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                            wire:model="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                        @error('name')
                        <span class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" wire:model="email"
                            value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">

                        @error('email')
                        <span class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <input id="password" type="password"
                            class="form-input w-full @error('password') border-red-500 @enderror" wire:model="password"
                            required autocomplete="new-password" placeholder="Password">

                        @error('password')
                        <span class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    {{-- <div class="flex flex-wrap">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Confirm Password') }}:
                        </label>

                        <input id="password-confirm" type="password" class="form-input w-full"
                            name="password_confirmation" required autocomplete="new-password">
                    </div> --}}

                <div class="flex flex-wrap">
                @if ($btn_nm == 'ADD')
                    <a style="cursor: pointer" wire:click="store()"
                    class="bg-blue-500 hover:bg-blue-700 text-white justify-center font-bold py-4 px-4 rounded ml-16 mt-5">{{ $btn_nm }}</a>
                    <button type="reset" class="bg-yellow-500 w-50 hover:bg-yellow-400 text-white font-bold py-3 px-3 rounded ml-16 mt-5">Cancel</button>
                @else
                    <a style="cursor: pointer" wire:click="modify()"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-4 rounded mt-5">{{ $btn_nm }}</a>
                    <button type="reset" class="bg-yellow-500 w-50 hover:bg-yellow-400 text-white font-bold py-3 px-3 rounded ml-16 mt-5">Cancel</button>
                @endif

                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                            {{-- {{ __('Already have an account?') }}
                            <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a> --}}...
                        </p>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
<section class="justify-center">
    <br><br>
    <div class="container">
        <table class="responsive-table">
          <caption id="nice">All Customers</caption>
          <hr id="approve">
          <hr>
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">E-mail Address</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($Users as $User)
              @if ($User->is_admin == 0)
              <tr>
                <th scope="row">{{ $User->name }}</th>
                <td id="" data-title="E-mail">{{ $User->email }}</td>
                <td data-title="Action" data-type="currency">
                    <a title="Modify" href="#olaf" class="blue-button" wire:click="edit({{ $User->id }})"><i class="fas fa-edit"></i></a>
                    <button title="Delete" wire:click="delete({{ $User->id }})" class="red-button"><i class="fas fa-times-circle"></i></button>
                </td>
              @endif
              @endforeach
          </tbody>
        </table>
        {{ $Users->links() }}
      </div>
</section>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    @if (session()->has('message'))
        <script>
            Swal.fire(
            'AWESOME!',
            'Your have added a customer succsessfully!',
            'success'
            )
        </script>
    @endif
    @if (session()->has('changed'))
        <script>
            Swal.fire(
            'NICE!',
            'You have updated customer info succsessfully!',
            'success'
            )
        </script>
    @endif
    @if (session()->has('deleted'))
        <script>
            Swal.fire(
            'OK!',
            'Customer deleted succsessfully!',
            'success'
            )
        </script>
    @endif
</div>

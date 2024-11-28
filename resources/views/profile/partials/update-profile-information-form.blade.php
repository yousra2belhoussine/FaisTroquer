<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informations de profile') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Mettez à jour les informations et l'adresse e-mail de votre compte.") }}
        </p>
    </header>



    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        @if (isset($user->profile_photo_path))
            <div>
                <x-input-label for="profile_photo_path" :value="__('Photo de profil')" />
                <img src="{{route('profile_pictures-file-path',$user->profile_photo_path)}}" name="profile_photo_path" alt="Photo de profil" class="rounded-full h-16 w-16 mb-2" />
                <input type="file" name="profile_photo_path">
            </div>
        @endif


        <div>
            <x-input-label for="last_name" :value="__('Nom')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)" required autofocus autocomplete="last_name" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <div>
            <x-input-label for="first_name" :value="__('Prénom')" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)" required autofocus autocomplete="first_name" />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="phone" :value="__('Téléphone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $user->userInfo->phone)" required autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="bio" :value="__('À propos de vous')" />
            <x-text-input id="bio" class="block mt-1 w-full" type="text" name="bio" :value="old('bio', $user->userInfo->bio)"  required  />
            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="nickname" :value="__('Pseudo')" />
            <x-text-input id="nickname" class="block mt-1 w-full" type="text" name="nickname" :value="old('pseudo', $user->userInfo->nickname)" required  />
            <x-input-error :messages="$errors->get('nickname')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Enregistrer les modifications') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<div class="text-base-content z-20">
    <div class="bg-base-100 shadow-lg flex flex-row-reverse items-center p-1 px-5">

        <!-- Navbar -->
        <div :class="{ 'w-4/5 lg:w-10/12 ': isOpen, 'w-10/12': !isOpen }"
            class="flex py-3 justify-between transition-all duration-500">
            <p class="font-bold">Kelola Daftar Kontak dengan Mudah:
                <span class="font-normal block">Markcomm Memudahkan Anda dalam
                    Mengelompokkan dan Mengelola Kontak untuk Pesan Broadcast</span>
            </p>

            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        @if (auth()->user()->profile)
                            <img alt="Tailwind CSS Navbar component"
                                src="{{ asset(auth()->user()->profile->photo_profile) }}" />
                        @else
                            <img alt="Tailwind CSS Navbar component"
                                src="{{ asset('../assets/images/users/user.png') }}" />
                        @endif
                    </div>
                </div>
                <ul tabindex="0"
                    class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                    {{-- <li>
                        <a href="{{ route('akun.edit') }}" class="justify-between">
                            Akun
                        </a>
                    </li> --}}
                    <li>
                        <a wire:navigate href="{{ route('profile.show', auth()->user()->id) }}" class="justify-between">
                            Profile
                        </a>
                    </li>
                    <li>
                        <!-- Logout Button -->
                        <form action="{{ route('logout') }}" method="POST" class="mr-4">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

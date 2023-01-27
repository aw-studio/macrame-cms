<header
    :class="{ '-translate-y-[90px] lg:-translate-y-[189px]': !showNavbar }"
    class="fixed z-40 top-0 transition-transform duration-200 left-0 w-screen h-[90px] lg:h-[189px] bg-secondary-100 text-primary"
>
    <div class="container flex items-center justify-between w-full h-full">
        <x-logo />
        <x-main-navigation class="hidden lg:flex" />
    </div>
</header>

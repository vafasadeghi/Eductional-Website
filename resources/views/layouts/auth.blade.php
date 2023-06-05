<!DOCTYPE html>
<html lang="fa">

<head>
    @include('livewire.home.layouts.head')
    <title>@yield('title')| وب لرن</title>


</head>

<body>
    
    {{ $slot }}

    @include('livewire.home.layouts.scripts')
</body>

</html>

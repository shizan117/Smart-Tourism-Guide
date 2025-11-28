<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Smart Tourism Guide</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/settings.css')}}">

</head>
<body>
<!-- Sidebar -->
@include('backend.layouts.sidebar')
<!-- Main Content -->

<!-- Main Content Wrapper -->
<div id="content">
    <!-- Header -->
@include('backend.layouts.header')

    @yield('content')
</div>


@yield('scripts')
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom Sidebar Toggle Script -->
<script>
    // Function to handle the opening/closing logic
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const body = document.body;

        if (window.innerWidth <= 768) {
            // Mobile: Toggle the active class to slide the menu in/out
            sidebar.classList.toggle('active');
            content.classList.toggle('active');
        } else {
            // Desktop: Toggle the sidebar-collapsed class on the body
            body.classList.toggle('sidebar-collapsed');

            // Ensure mobile classes are removed if toggling on desktop
            sidebar.classList.remove('active');
            content.classList.remove('active');
        }
    }

    // Main header toggle button (Hamburger icon)
    document.getElementById('sidebarToggle').addEventListener('click', toggleSidebar);

    // NEW: Internal sidebar close button (Arrow icon, mobile only)
    const sidebarCloseButton = document.getElementById('sidebarClose');
    if (sidebarCloseButton) {
        sidebarCloseButton.addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');

            // On mobile, explicitly remove the 'active' class to close
            if (window.innerWidth <= 768) {
                sidebar.classList.remove('active');
                content.classList.remove('active');
            }
        });
    }


    // Auto-manage sidebar state on initial load and resize
    function handleResize() {
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const body = document.body;

        if (window.innerWidth <= 768) {
            // On mobile: Sidebar must be initially hidden and content must be full width.
            sidebar.classList.remove('active');
            content.classList.remove('active');

            // Remove the desktop collapse class when on mobile
            body.classList.remove('sidebar-collapsed');
        } else {
            // On desktop: Default to expanded state if not already collapsed.
            if (body.classList.contains('sidebar-collapsed') === false) {
                body.classList.remove('sidebar-collapsed'); // Default to full view on desktop
            }

            // Ensure mobile classes are not applied on desktop
            sidebar.classList.remove('active');
            content.classList.remove('active');
        }
    }

    // Initial check
    handleResize();

    // Listen for resize events
    window.addEventListener('resize', handleResize);
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>

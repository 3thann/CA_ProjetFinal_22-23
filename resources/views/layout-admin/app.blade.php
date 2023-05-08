<!DOCTYPE html>
<html lang="fr">

    @include("layout-admin.head")

    <body id="page-top">
        <div id="wrapper">
            @include("layout-admin.sidebar")
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @include("layout-admin.topbar")
                    @yield('content')
                </div>
                @include("layout-admin.footer")
            </div>

        </div>
        @include("layout-admin.import")
        @include("layout-admin.logout")
    </body>
</html>

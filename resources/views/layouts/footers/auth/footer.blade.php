<footer class="footer pt-3  ">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>,
                    terms and condition
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link text-muted" target="_blank">{{ config('app.name') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sales.index') }}" class="nav-link text-muted" target="_blank">Sales</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contacts.index') }}" class="nav-link text-muted" target="_blank">Contacts</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}" class="nav-link text-muted" target="_blank">Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('suggestForm') }}" class="nav-link pe-0 text-muted"
                            target="_blank">Send Email</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

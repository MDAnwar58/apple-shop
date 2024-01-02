<nav class="navbar navbar-expand-lg nabvar-bg sticky-top">
    <div class="container">
        <a class="d-flex text-decoration-none" href="#">
            <!-- <i class="fa-brands fa-apple"></i> -->
            <i class="bi bi-apple fs-2 text-dark"></i>
            <div class="ps-1 text-muted d-flex align-items-center"><span class=" text-dark fs-4"
                    style="font-weight: 700;">Apple Shop</span></div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav text-uppercase mt-1">
                <li class="nav-item ms-2">
                    <a class="nav-link active line-height-3" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item dropdown ms-2">
                    <a class="nav-link dropdown-toggle text-secondary" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        product
                    </a>
                    <ul class="dropdown-menu" id="CategoryItem">

                    </ul>
                </li>
                <li class="nav-item ms-2">
                    <a class="nav-link  text-secondary" href="#">
                        <i class="bi bi-heart"></i> <span>Wish</span>
                    </a>
                </li>
                <li class="nav-item ms-2">
                    <a class="nav-link  text-secondary" href="#">
                        <i class="bi bi-search"></i> search
                    </a>
                </li>
                <li class="nav-item ms-2">
                    <a class="nav-link  text-secondary" href="#">
                        <i class="bi bi-bag"></i> cart
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    async function category() {
        const response = await axios.get("/CategoryList");
        $("#CategoryItem").empty();
        response.data['data'].forEach((item, i) => {
            let row = `<li><a class="dropdown-item" href="{{ url('/ByCategoryPage?id=${item.id}') }}">${item['categoryName']}</a></li>`;
            $("#CategoryItem").append(row);
        });
    }
</script>

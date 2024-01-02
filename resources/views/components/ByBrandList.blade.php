<nav class="bg-light"
    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <div class="container d-flex justify-content-between py-5">
        <h2>Brand - <span id="BrandName"></span></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">This Page</li>
        </ol>
    </div>
</nav>

<div class="mt-5">
    <div class="container my-5">
        <div class="row" id="byBrandList">

        </div>
    </div>
</div>


<script>
    async function ByBrands() {
        let byCategoryList = $("#byBrandList");
        let searchParams = new URLSearchParams(window.location.search);
        let id = searchParams.get('id');

        byCategoryList.empty();
        let response = await axios.get('/ListProductByBrand/' + id);
        console.log(response);
        response.data['data'].forEach((item, i) => {
            let row = `<div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <div class="card product-card">
                                    <img src="{{ url('upload/images/products/${item.image}') }}" class="img-fluid rounded"
                                        style="height: 45vh;" alt="...">
                                    <div class="product-image-hover rounded-top">
                                        <div>
                                            <button type="button" class="btn btn-sm btn-light">
                                                <i class="bi bi-cart-plus"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light ms-2">
                                                <i class="bi bi-search-heart"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light ms-2">
                                                <i class="bi bi-heart"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body featured-product-body">
                                        <a href="" class="text-muted text-decoration-none">${item['title']}</a>
                                        <h6 class="text-danger pt-2">${item['price']} Tk</h6>
                                        <div class="text-start">
                                            <span>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
            byCategoryList.append(row);

            $("#BrandName").text(response.data['data'][0]['brand']['brandName']);
        });
    }
    
</script>

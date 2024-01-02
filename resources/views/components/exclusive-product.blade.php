<div class="featured-product-bg pb-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-uppercase text-center text-muted">exclusive products</h2>
            </div>
            <div class="col-sm-12 pt-2">
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-uppercase" id="popular-tab" data-bs-toggle="tab"
                            data-bs-target="#popular-tab-pane" type="button" role="tab"
                            aria-controls="popular-tab-pane" aria-selected="true">Popular</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase" id="new-tab" data-bs-toggle="tab"
                            data-bs-target="#new-tab-pane" type="button" role="tab" aria-controls="new-tab-pane"
                            aria-selected="true">New</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase" id="top-tab" data-bs-toggle="tab"
                            data-bs-target="#top-tab-pane" type="button" role="tab" aria-controls="top-tab-pane"
                            aria-selected="true">Top</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase" id="special-tab" data-bs-toggle="tab"
                            data-bs-target="#special-tab-pane" type="button" role="tab"
                            aria-controls="special-tab-pane" aria-selected="false">Special</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase" id="cotrandingntact-tab" data-bs-toggle="tab"
                            data-bs-target="#tranding-tab-pane" type="button" role="tab"
                            aria-controls="tranding-tab-pane" aria-selected="false">Tranding</button>
                    </li>
                </ul>
                <div class="tab-content mt-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="popular-tab-pane" role="tabpanel"
                        aria-labelledby="popular-tab" tabindex="0">

                        <div class="row" id="PopularItem">

                        </div>

                    </div>
                    <div class="tab-pane fade" id="new-tab-pane" role="tabpanel" aria-labelledby="new-tab"
                        tabindex="0">

                        <div class="row" id="NewItem">
                            
                        </div>

                    </div>
                    <div class="tab-pane fade" id="top-tab-pane" role="tabpanel" aria-labelledby="top-tab"
                        tabindex="0">

                        <div class="row" id="TopItem">
                            
                        </div>

                    </div>
                    <div class="tab-pane fade" id="special-tab-pane" role="tabpanel" aria-labelledby="special-tab"
                        tabindex="0">

                        <div class="row" id="SpecialItem">
                            
                        </div>

                    </div>
                    <div class="tab-pane fade" id="tranding-tab-pane" role="tabpanel" aria-labelledby="tranding-tab"
                        tabindex="0">

                        <div class="row" id="TrandingItem">
                           
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    async function Popular() {
        let response = await axios.get("/ListProductByRemark/popular");
        $("#PopularItem").empty();
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
                                            <a href="/Details?id=${item['id']}" class="btn btn-sm btn-light ms-2">
                                                <i class="bi bi-search-heart"></i>
                                            </a>
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
            $("#PopularItem").append(row);
        });
    }
    
    async function New() {
        let response = await axios.get("/ListProductByRemark/new");
        $("#NewItem").empty();
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
            $("#NewItem").append(row);
        });
    }
    
    async function Top() {
        let response = await axios.get("/ListProductByRemark/top");
        $("#TopItem").empty();
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
            $("#TopItem").append(row);
        });
    }
    
    async function Special() {
        let response = await axios.get("/ListProductByRemark/special");
        $("#SpecialItem").empty();
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
            $("#SpecialItem").append(row);
        });
    }
    
    async function Tranding() {
        let response = await axios.get("/ListProductByRemark/trending");
        $("#TrandingItem").empty();
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
            $("#TrandingItem").append(row);
        });
    }
    
</script>

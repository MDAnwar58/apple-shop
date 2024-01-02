<nav class="bg-light"
    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <div class="container d-flex justify-content-between py-5">
        <h2 id="WishListTitle">dsdf</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">This Page</li>
        </ol>
    </div>
</nav>

<div class="mt-5">
    <div class="container my-5">
        <div class="row" id="WishListProduct">

        </div>
    </div>
</div>


<script>
    let WishListTitle = $("#WishListTitle");
    const DefautlLocation = window.location.href;
    const SplitLocation = DefautlLocation.split("/");
    const wishLocation = SplitLocation[SplitLocation.length - 1];
    const wishListLocation = wishLocation.split("-");
    const finalLocation = wishListLocation.join(" ");
    WishListTitle.text(finalLocation);
    
    async function WishList() {
        let WishListProduct = $("#WishListProduct");
        let searchParams = new URLSearchParams(window.location.search);
        let id = searchParams.get('id');

        let response = await axios.get('/ProductWishList');
        WishListProduct.empty();
        response.data['data'].forEach((item, i) => {
            let row = `<div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <div class="card product-card">
                                    <img src="{{ url('upload/images/products/${item.product.image}') }}" class="img-fluid rounded"
                                        style="height: 45vh;" alt="...">
                                    <div class="product-image-hover rounded-top">
                                        <div>
                                            <a href="/Details?id=${item['product']['id']}" class="btn btn-sm btn-light ms-2">
                                                <i class="bi bi-search-heart"></i>
                                            </a>
                                            <button type="button" onclick="RemoveWishList(${item['product']['id']})" class="btn btn-sm btn-danger ms-2">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body featured-product-body">
                                        <a href="" class="text-muted text-decoration-none">${item['product']['title']}</a>
                                        <h6 class="text-danger pt-2">${item['product']['price']} Tk</h6>
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
            WishListProduct.append(row);


            // $("#catName").text(response.data['data'][0]['category']['categoryName']);
        });
    }

    async function RemoveWishList(id) {
        if (confirm("Are you sure you want to remove this item?")) {
            loaderShow();
            let response = await axios.get('/RemoveWishList/' + id);
            loaderHide();
            if (response.status === 200) {
                await WishList();
            }else{
                alert("Request Fail!");
            }
        }
    }
</script>

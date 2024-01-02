<div class="mt-5">
    <div class="container my-5">
        <div class="row" id="byBrandList">
            <div class="col-md-6">
                <div class="card rounded-0">
                    <div class="card-body p-2" id="body">
                        <img src="/assets/images/banner1.jpg" id="mainImage" style="height: 60vh; width: 100%;" alt="">
                    </div>
                </div>
                <div class="d-flex pt-3">
                    <div class="card rounded-0 p-2">
                        <img src="/assets/images/banner2.jpg" id="image1" onclick="ImageShow('#image1')"
                            style="width: 100%; height: 100%;" alt="">
                    </div>
                    <div class="card rounded-0 p-2">
                        <img src="/assets/images/banner2.jpg" id="image2" onclick="ImageShow('#image2')"
                            style="width: 100%; height: 100%;" alt="">
                    </div>
                    <div class="card rounded-0 p-2">
                        <img src="/assets/images/banner3.jpg" id="image3" onclick="ImageShow('#image3')"
                            style="width: 100%; height: 100%;" alt="">
                    </div>
                    <div class="card rounded-0 p-2">
                        <img src="/assets/images/banner1.jpg" id="image4" onclick="ImageShow('#image4')"
                            style="width: 100%; height: 100%;" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 id="productTitle">TITLE</h3>
                <h4 class="text-danger"><span id="productPrice">00</span> tk</h4>
                <p id="productDes">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem odio commodi
                    consequatur dolorem
                    laborum, amet alias minus repellat voluptates! Fugit recusandae quibusdam corporis libero repellat
                    mollitia, aliquam veniam minus obcaecati cum! Ut sed, fuga tenetur molestiae ipsam vel beatae
                    possimus inventore, aliquid doloremque soluta minima ipsa, similique quas debitis? Eos.</p>
                <div>
                    <label for="">size</label>
                    <select name="" id="productSize" class=" form-control">

                    </select>
                </div>
                <div>
                    <label for="">Color</label>
                    <select name="" id="productColor" class=" form-control">
                    </select>
                </div>
                <hr>

                <div class=" d-flex">
                    <div class="d-flex align-items-center">
                        <button type="button" id="minus" onclick="minusOrPlus('minus')"
                            class=" btn btn-sm btn-light rounded-circle me-2" style="padding: 0 .3rem;">
                            <i class="bi bi-dash"></i>
                        </button>
                        <input type="text" id="qty" style="width: 60px;" class=" text-center text-muted" value="1">
                        <button type="button" id="plus" onclick="minusOrPlus('plus')"
                            class=" btn btn-sm btn-light rounded-circle ms-2" style="padding: 0 .3rem;">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                    <button type="button" onclick="addToCart()"
                        class="btn btn-danger text-uppercase fw-semibold ms-3 px-4 py-2" style="font-size: 13px;">
                        <i class="bi bi-cart-plus me-1"></i>
                        add to cart
                    </button>
                    <button type="button" onclick="addToWishList()" class=" bg-transparent border-0 fs-4 ms-3">
                        <i class="bi bi-heart"></i>
                    </button>
                </div>
                <hr>

            </div>
        </div>
    </div>
</div>

<script>

    let searchParams = new URLSearchParams(window.location.search);
    let id = searchParams.get('id');

    async function productDetails() {
        let response = await axios.get('/ProductDetailsById/' + id);
        // console.log(response.data['data'][0]['size']);
        document.getElementById('mainImage').src = 'upload/images/products/' + response.data['data'][0]['product']['image'];
        document.getElementById('image1').src = 'upload/images/products/' + response.data['data'][0]['img1'];
        document.getElementById('image2').src = 'upload/images/products/' + response.data['data'][0]['img2'];
        document.getElementById('image3').src = 'upload/images/products/' + response.data['data'][0]['img3'];
        document.getElementById('image4').src = 'upload/images/products/' + response.data['data'][0]['img4'];


        document.getElementById('productTitle').innerText = response.data['data'][0]['product']['title'];
        document.getElementById('productPrice').innerText = response.data['data'][0]['product']['price'];
        document.getElementById('productDes').innerText = response.data['data'][0]['product']['short_des'];

        let size = response.data['data'][0]['size'].split(',');
        let color = response.data['data'][0]['color'].split(',');

        let productSize = $("#productSize");
        productSize.append('<option value="">Choose Size</option>');
        size.forEach((item, i) => {
            let row = `<option value="${item}">${item}</option>`;
            productSize.append(row);
        });

        let productColor = $("#productColor");
        productColor.append('<option value="">Choose Color</option>');
        color.forEach((item, i) => {
            let row = `<option value="${item}">${item}</option>`;
            productColor.append(row);
        });
    }

    function minusOrPlus(option) {
        let qty = $("#qty");
        let currentValue = parseInt(qty.val());
        if (option === 'minus') {
            if (qty.val() > 1) {
                qty.val(currentValue - 1);
            }
        } else {
            qty.val(currentValue + 1);
        }
    }

    function ImageShow(img) {
        let mainImage = $("#mainImage");
        let image = $(img);
        clickImage = image.attr('src');
        mainImage.attr('src', clickImage);
    }


    async function addToCart() 
    {
        try {
            let productSize = document.getElementById("productSize").value;
            let productColor = document.getElementById("productColor").value;
            let qty = document.getElementById("qty").value;

            if (productSize === "") {
                alert("Product Size Required!");
            } else if (productColor === "") {
                alert("Product Color Required!");
            } else if (qty === 0) {
                alert("Product Quantity Required!");
            } else {
                loaderShow();
                let response = await axios.post("/CreateCartList", {
                    product_id: id,
                    size: productSize,
                    color: productColor,
                    qty: qty
                });
                loaderHide();
                console.log(response);
                if (response.data.msg === "success") {
                    alert("Request Successful");
                } else {
                    sessionStorage.setItem("last_location", window.location.href);
                    window.location.href = "/Login";
                }
            }
        } catch (error) {
            sessionStorage.setItem("last_location", window.location.href);
            window.location.href = "/Login";
        }
    }
    async function addToWishList() {
        try {
            // alert("")
            loaderShow();
            let response = await axios.get("/CreateWishList/" + id);
            loaderHide();
            console.log(response);
            if (response.data.msg === "success") {
                alert("Request Successful");
            }
        } catch (error) {
            sessionStorage.setItem("last_location", window.location.href);
            window.location.href = "/Login";
        }
    }

</script>
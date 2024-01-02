<div class="brand-bg pb-5">
    <div class="container">
        <div class="row justify-content-sm-start justify-content-center">

            <div class="col-md-12 pt-5 pb-3">
                <h2 class="text-uppercase text-center text-muted">Top brands</h2>
                <p class="text-secondary text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Necessitatibus, quidem?</p>
            </div>

            <div class="col-md-12">
                <div class="row" id="TopBrandItem">
                    

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    async function Brands() {
        const response = await axios.get("/BrandList");
        $("#TopBrandItem").empty();
        response.data['data'].forEach((item, i) => {
            let row = `<div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                        <a href="{{ url('/ByBrandPage?id=${item.id}') }}" class="card card-body featured-body text-center text-decoration-none">
                            <img src="{{ url('upload/images/brands/${item.brandImage}') }}" style="height: 20vh;" alt="">
                            <h6 class="featured-text pt-2">${item['brandName']}</h6>
                        </a>
                    </div>`;
            $("#TopBrandItem").append(row);
        });
    }
   
</script>
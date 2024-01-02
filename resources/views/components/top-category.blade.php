<div class="featured-bg pb-5">
    <div class="container">
        <div class="row justify-content-sm-start justify-content-center" id="">
            <div class="col-sm-12 text-center pt-5 pb-2">
                <h2 class="text-uppercase text-muted">top categories</h2>
                <p class="text-secondary">Get your desired product from featrued category</p>
            </div>

            <div class="col-md-12">
                <div class="row" id="TopCategoryItem">
                    

                </div>
            </div>

        </div>
    </div>
</div>


<script>
    async function Category() {
        const response = await axios.get("/CategoryList");
        $("#TopCategoryItem").empty();
        response.data['data'].forEach((item, i) => {
            let row = `<div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                        <a href="{{ url('/ByCategoryPage?id=${item.id}') }}" class="card card-body featured-body text-center text-decoration-none">
                            <img src="{{ url('upload/images/category/${item.categoryImage}') }}" style="height: 20vh;" alt="">
                            <h6 class="featured-text pt-2">${item['categoryName']}</h6>
                        </a>
                    </div>`;
            $("#TopCategoryItem").append(row);
        });
    }
</script>

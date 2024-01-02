<div class="your-class" id="heroBanner">

</div>

<script>
    async function Hero() {
        const response = await axios.get("/ListProductSlider");
        $("#heroBanner").empty();
        response.data['data'].forEach((item, i) => {
            let activeClass = '';
            if (activeClass === 0) {
                activeClass = 'active';
            }
            let row = `<div class="hero-banner ${activeClass}">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="banner-text-area">
                    <h4>${item['price']} TK</h4>
                    <h1>${item['title']}</h1>
                    <a href="" class="btn btn-danger rounded-0 text-uppercase fs-6">buy now</a>
                </div>
                <div class="banner-img-area rounded py-3 px-2">
                    <img src="{{ url('upload/images/products/${item.image}') }}" alt="">
                </div>
            </div>
        </div>
    </div>`;
            $("#heroBanner").append(row);
        });
        $(document).ready(function() {
            $('.your-class').slick({
                dots: false,
                infinite: true,
                autoplay: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                responsive: [{

                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        infinite: true
                    }

                }, {

                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        dots: true
                    }

                }, {

                    breakpoint: 300,
                    settings: "unslick"

                }]
            });
            $('.slick-prev').html(`<i class="bi bi-chevron-left"></i>`);
            $('.slick-prev').css('border', 'none');
            $('.slick-prev').css('color', 'gray');
            $('.slick-next').html(`<i class="bi bi-chevron-right"></i>`);
            $('.slick-next').css('border', 'none');
            $('.slick-next').css('color', 'gray');
        });
    }
    
</script>

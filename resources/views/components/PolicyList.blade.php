<nav class="bg-light"
    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <div class="container d-flex justify-content-between py-5">
        <h2 id="PolicyType"></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">This Page</li>
        </ol>
    </div>
</nav>

<div class="mt-5">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <p id="des"></p>
            </div>
        </div>
    </div>
</div>


<script>
    async function Policy() {
        let PolicyType = $("#PolicyType");
        let des = $("#des");
        let searchParams = new URLSearchParams(window.location.search);
        let type = searchParams.get('type');

        if (type === 'about') {
            $("#PolicyType").text("About Us");
        }
        if (type === 'how to buy') {
            $("#PolicyType").text("How To Buy");
        }
        if (type === 'contact') {
            $("#PolicyType").text("Contact");
        }
        if (type === 'complain') {
            $("#PolicyType").text("Complain");
        }
        if (type === 'refund') {
            $("#PolicyType").text("Refund Policy");
        }
        if (type === 'terms') {
            $("#PolicyType").text("Terms & Condition");
        }

        let response = await axios.get('/PolicyByType/' + type);
        des.html(response.data.des);
    }
    
</script>

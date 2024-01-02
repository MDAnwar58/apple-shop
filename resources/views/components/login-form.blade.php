<div class="d-flex justify-content-center mt-5">
    <span class="pt-5">
        <form method="POST" class="card p-4">
            <h4>Login</h4>
            <input type="text" id="email" class=" form-control" style="width: 70vh;" placeholder="Your Email">
            <button type="button" onclick="Login()" class=" btn btn-danger mt-2">Login</button>
        </form>
    </span>
</div>

<script>
    async function Login() {
        let email = document.getElementById('email').value;
        if (email.length === 0) {
            alert("Email Required!");
        } else {
            loaderShow();
            const response = await axios.get("/UserLogin/" + email);
            if (response.status === 200) {
                console.log(response);
                sessionStorage.setItem("email", email);
                window.location.href = "/Verify";
            } else {
                $(".preloader").delay(90).fadeOut(100).addClass('loaded');
                alert("Somethings went wrong!")
            }
        }
    }
</script>

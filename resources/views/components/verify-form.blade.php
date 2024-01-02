<div class="d-flex justify-content-center mt-5">
    <span class="pt-5">
        <form method="POST" class="card p-5">
            <h4>Verification</h4>
            <input type="text" id="code" class=" form-control mt-2" style="width: 70vh;"
                placeholder="Verification Code">
            <button type="button" onclick="Verify()" class=" btn btn-danger mt-3">Verify</button>
        </form>
    </span>
</div>

<script>
    async function Verify() {
        let code = document.getElementById('code').value;
        let email = sessionStorage.getItem("email");
        if (code.length === 0) {
            alert("Code Required!");
        } else {
            const response = await axios.get("/VerifyLogin/" + email + "/" + code);
            if (response.status === 200) {
                console.log(response);
                let last_location = sessionStorage.getItem("last_location");
                if (last_location) {
                    window.location.href = last_location;
                }else{
                    window.location.href = "/";
                }
            }
        }
    }
</script>

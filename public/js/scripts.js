document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("password");
    const togglePasswordButton = document.querySelector(".toggle-password");

    if (togglePasswordButton && passwordInput) {
        togglePasswordButton.addEventListener("click", function () {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);
            this.classList.toggle("fa-eye-slash");
        });
    }
});
function toggleReports(postId) {
    axios.post(`/report/${postId}/toggle`)
        .then(response => {
            console.log(response.data.message);
            console.log('Reports:', response.data.reports);
            // Cập nhật giao diện hoặc thực hiện các thao tác cần thiết
        })
        .catch(error => {
            console.error('Error:', error.response.data.message);
        });
}

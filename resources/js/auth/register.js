import axios from "axios"
import $ from 'jquery'

$(document).ready(function () {
    $('#formRegister').submit(async function (e) {
        e.preventDefault();
        const formData = new FormData(this)
        try {
            const response = await axios.post("v1/auth/register", formData)
            const responseData = response.data
            console.log(responseData)
            if (responseData.message == "Check your validation") {
                alert("Periksa kembali")
            } else {
                alert("Sukses login");
                window.location.href = "/login";
            }
        } catch (error) {
            console.log(error);
        };
    });
});

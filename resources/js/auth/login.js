import axios from "axios"
import $ from 'jquery'

$(document).ready(function () {
    $('#formLogin').submit(async function  (e) {
        e.preventDefault();
        const formData = new FormData(this)
        try {
            const response = await axios.post("v1/auth/login", formData)
            const responseData = response.data
            console.log(responseData)
            if (responseData.message == "Unauthorization") {
                alert("Failed login check your email and password")
            } else {
                alert("Sukses login");
                window.location.href = "/";
                localStorage.setItem('id_user', responseData.user.id)
            }
        } catch (error) {
            console.log(error);
        };
    });
});

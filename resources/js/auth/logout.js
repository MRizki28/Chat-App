import axios from 'axios';
import $ from 'jquery'

$(document).ready(function () {
    $("#logout").click(function (e) {
        e.preventDefault()
        logout()
    })
});

const logout = async () => {
    try {
        const confirmed = window.confirm("Yakin ingin logout ?");
        if (!confirmed) return;
        const response = await axios.post('/v1/auth/logout')
        console.log(response)
        if (response.data.message == "success") {
            alert("Sukses logout")
            window.location.href = '/login';
            localStorage.removeItem("id_user");
        } else {
            alert("failed")
        }

    } catch (error) {
        console.log(error);
    };
}
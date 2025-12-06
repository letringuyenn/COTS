import axios from "axios";
import { createToaster } from "@meforma/vue-toaster";

const toaster = createToaster({ position: "top-right" });

export default function (to, from, next) {
    axios
        .get("http://127.0.0.1:8000/api/khach-hang/check-token", {
            headers: {
                Authorization: "Bearer " + localStorage.getItem("token_client"),
            },
        })
        .then((res) => {
            if (res.data.status) {
                localStorage.setItem("user_name", res.data.name);
                localStorage.setItem("user_email", res.data.email);
                localStorage.setItem("system_role_id", res.data.system_role_id);
                localStorage.setItem("status_id", res.data.status_id);
                localStorage.setItem("check_kh", true);
                next();
            } else {
                toaster.error(res.data.message);
                next("/khach-hang/dang-nhap");
            }
        })
        .catch((error) => {
            console.error("Lỗi xác thực token:", error);
            toaster.error("Bạn chưa đăng nhập. Vui lòng đăng nhập!");
            next("/khach-hang/dang-nhap");
        });
}

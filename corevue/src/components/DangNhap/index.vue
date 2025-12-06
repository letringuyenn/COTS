<template>
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
        <div class="card shadow-lg border-0" style="width: 420px; border-radius: 14px;">
            <div class="card-body p-4">
                <h3 class="text-center mb-4 font-weight-bold">Đăng Nhập</h3>
                <label class="mb-1">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-white custom-icon-box">
                        <i class="fa-solid fa-envelope"></i>
                    </span>

                    <input v-model="user.email" type="email" class="form-control" placeholder="Nhập email của bạn"
                        :class="{ 'is-invalid': errors.email }">

                </div>
                <small v-if="errors.email" class="text-danger ml-1">
                    {{ errors.email }}
                </small>
                <br>
                <label class="mb-1">Mật khẩu</label>
                <div class="input-group">
                    <span class="input-group-text bg-white custom-icon-box">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input v-model="user.password" type="password" class="form-control" placeholder="Nhập mật khẩu"
                        :class="{ 'is-invalid': errors.password }">
                </div>
                <small v-if="errors.password" class="text-danger ml-1">
                    {{ errors.password }}
                </small>

                <div class="text-end mt-1">
                    <a class="text-primary small" href="#" style="text-decoration:none;">Quên mật khẩu?</a>
                </div>

                <button @click="Login" class="btn btn-primary w-100 mt-3 login-btn">
                    Đăng Nhập
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            user: {
                email: "",
                password: ""
            },
            errors: {
                email: "",
                password: ""
            }
        };
    },
    mounted() {
        this.kiemTraDangNhap();
    },
    methods: {
        Login() {
            this.errors.email = "";
            this.errors.password = "";

            if (!this.user.email) this.errors.email = "Vui lòng nhập email.";
            if (!this.user.password) this.errors.password = "Vui lòng nhập mật khẩu.";

            if (this.errors.email || this.errors.password) return;

            axios
                .post("http://127.0.0.1:8000/api/khach-hang/dang-nhap", this.user)
                .then((res) => {
                    if (res.data.status) {
                        localStorage.setItem("token_client", res.data.token);
                        localStorage.setItem("user_name", res.data.name);
                        localStorage.setItem("user_id", res.data.user_id);
                        this.$toast?.success(res.data.message);
                        this.$router.push("/").then(() => location.reload());
                    } else {
                        this.$toast?.error(res.data.message);
                    }
                })
                .catch((error) => {
                    console.log(error.response || error);
                    const list = Object.values(error.response?.data?.errors || { error: ['Đã xảy ra lỗi không xác định'] });
                    list.forEach((v) => this.$toast?.error(v[0]));
                });
        },

        kiemTraDangNhap() {
            const token = localStorage.getItem("token_client");
            if (!token) return;
            axios
                .get("http://127.0.0.1:8000/api/khach-hang/check-token", {
                    headers: {
                        Authorization: "Bearer " + token
                    }
                })
                .then((res) => {
                    if (res.data.status) {
                        localStorage.setItem("user_name", res.data.name);
                        localStorage.setItem("user_email", res.data.email);
                        localStorage.setItem("system_role_id", res.data.system_role_id);
                        localStorage.setItem("status_id", res.data.status_id);
                        this.$router.push("/");
                    } else {
                        this.$toast?.error(res.data.message);
                    }
                })
                .catch((err) => {
                    console.log(err.response || err);
                });
        }
    }
};
</script>

<style scoped></style>

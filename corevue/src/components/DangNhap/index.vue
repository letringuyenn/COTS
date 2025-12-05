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

                <button @click="fakeLogin" class="btn btn-primary w-100 mt-3 login-btn">
                    Đăng Nhập
                </button>

                <!-- OR -->
                <div class="text-center mt-4 mb-2">
                    <div class="d-flex align-items-center text-muted">
                        <hr class="flex-grow-1">
                        <span class="mx-2">Hoặc</span>
                        <hr class="flex-grow-1">
                    </div>
                </div>

                <button class="btn btn-outline-dark w-100 google-btn">
                    <i class="fa-brands fa-google"></i> &nbsp; Đăng Nhập Với Google
                </button>

            </div>
        </div>
    </div>
</template>

<script>
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
    methods: {
        fakeLogin() {
            this.errors.email = "";
            this.errors.password = "";

            if (!this.user.email) this.errors.email = "Vui lòng nhập email.";
            if (!this.user.password) this.errors.password = "Vui lòng nhập mật khẩu.";

            if (this.errors.email || this.errors.password) return;
            alert("Đăng nhập thành công (FE demo).");
        }
    }
};
</script>

<style scoped></style>
